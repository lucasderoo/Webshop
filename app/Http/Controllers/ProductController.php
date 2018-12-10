<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Carrier;
use App\Genre;
use App\MusicProduct;
use App\Image;
use App\Stock;

use Session;

use DB;
use Validator;
class ProductController extends Controller
{
    public function index(){
    	$products = Product::All();  

    	return view('products.index')->with(compact('products'));
    }

    public function create()
    {
    	$categories = Category::all();
    	$genres = Genre::all();
    	$carriers = Carrier::all();
        return view('products.create')->with(compact('categories', 'genres', 'carriers'));
    }

    public function store(request $request){
    	$request->validate([
            'title' => 'required|string|max:50',
            'price' => 'required|between:0,99.99|max:5',
            'release_date' => 'required|date',
            'category' => 'required|numeric',
            'artist' => 'required|string|max:100',
            'genre' => 'required|string|max:50',
            'carrier' => 'required|string|max:50',
            'amount' => 'required|numeric'
        ]);

    	$musicProduct = new MusicProduct();
    	$musicProduct->release_date = $request->input('release_date');
    	$musicProduct->description = $request->input('description');
    	$musicProduct->artist = $request->input('artist');
    	$musicProduct->genre = $request->input('genre');
    	$musicProduct->carrier_id = $request->input('carrier');

    	$musicProduct->save();

    	$product = new Product();
    	$product->title = $request->input('title');
    	$product->price = $request->input('price');
    	$product->category_id = $request->input('category');
    	$product->productable_id = $musicProduct->id;
    	$product->productable_type = "App\MusicProduct";
    	$product->updated_at;
    	$product->created_at;

    	$product->save();

        $stock = new Stock();
        $stock->amount = $request->input('amount');

        $product->stock()->save($stock);


    	$public_path = public_path();
    	$productsFolder = public_path() . '\images\uploads\products';

    	$productFolder = $productsFolder . "\product_" .$product->id;
    	if (!file_exists($productFolder)) {
            mkdir($productFolder);
        }

    	for ($i=1; $i <= 4; $i++) { 
    		if(!empty($request->input('product-image-' . $i))){
    			$data = $request->input('product-image-' . $i);

            	list($type, $data) = explode(';', $data);
            	list(, $data)      = explode(',', $data);

            	$imagePath = $productFolder . "/img_" . $i .".png";
            	$imageData = base64_decode($data);

            	file_put_contents($imagePath, $imageData);

            	if($request->input('main-image') == 'product-image-' . $i){
            		$product->main_image_url = $i;
            		$product->save();
            	}
            	
        		$image = new Image();
        		$image->image_url = "img_" . $i;
        		$image->product_id = $product->id;
        		$image->save();
    		}
    		else{
    			break;
    		}
    	}

        Session::flash('feedback_success', 'Product saved');
    	return redirect('admin/products');
    }



    public function edit($id)
    {
    	$product = Product::find($id);
    	$categories = Category::all();
    	$genres = Genre::all();
    	$carriers = Carrier::all();

        return view('products.edit')->with(compact('product', 'categories', 'genres', 'carriers'));
    }


    public function update(request $request, $id){
    	$request->validate([
            'title' => 'required|string|max:50',
            'price' => 'required|between:0,99.99|max:5',
            'release_date' => 'required|date',
            'category' => 'required|numeric',
            'artist' => 'required|string|max:100',
            'genre' => 'required|string|max:50',
            'carrier' => 'required|string|max:50',
            'amount' => 'required|numeric'
        ]);


     	$product = Product::find($id);

    	$musicProduct = MusicProduct::find($product->productable_id);
    	$musicProduct->release_date = $request->input('release_date');
    	$musicProduct->description = $request->input('description');
    	$musicProduct->artist = $request->input('artist');
    	$musicProduct->genre = $request->input('genre');
    	$musicProduct->carrier_id = $request->input('carrier');

    	$musicProduct->save();

    	$product->title = $request->input('title');
    	$product->price = $request->input('price');
    	$product->category_id = $request->input('category');
        $product->stock->amount = $request->input('amount');
    	$product->updated_at;

        $product->stock->save();
    	$product->save();

    	$public_path = public_path();
    	$productsFolder = public_path() . '\images\uploads\products';

    	$productFolder = $productsFolder . "\product_" .$product->id;
    	if (!file_exists($productFolder)) {
            mkdir($productFolder);
        }

    	for ($i=1; $i <= 4; $i++) { 

    		$imagePath = $productFolder . "/img_" . $i .".png";

    		if($request->input('product-image-' . $i) == "delete"){
    			if($i <= count($product->images)){


    				$image = Image::select()
    					->where('image_url', '=', "img_" .$i)
    					->where('product_id', '=', $product->id)
    					->firstOrFail();

    				$image->delete();
    				unlink($imagePath);
    			}
    		}
    		elseif($request->input('product-image-' . $i) == "added"){

    		}
    		else{
    			$data = $request->input('product-image-' . $i);
    			if($data != "delete" OR empty($data)){
    				list($type, $data) = explode(';', $data);
            		list(, $data)      = explode(',', $data);
            		$imageData = base64_decode($data);
            		file_put_contents($imagePath, $imageData);
    			}

    			if($i >= count($product->images)){
            		$image = new Image();
	        		$image->image_url = "img_" . $i;
	        		$image->product_id = $product->id;
	        		$image->save();
            	}
    		}

    		if($request->input('main-image') == 'product-image-' . $i){
            	$product->main_image_url = $i;
            	$product->save();
            }
    	}

        Session::flash('feedback_success', 'Product updated');
    	return redirect('admin/products');
    }


    public function delete(request $request, $id){
    	$product = Product::find($id);

    	return view('products.delete')->with(compact('product'));
    }


    public function destroy(request $request, $id){

    	$product = Product::find($id);

    	$product->productable()->delete();	

    	$public_path = public_path();
    	$productsFolder = public_path() . '\images\uploads\products';

    	foreach($product->images as $image){
    		$imagePath = $productsFolder . "\product_" . $product->id . "/" . $image->image_url . ".png";
    		unlink($imagePath);
    	}

    	$product->images()->delete();

    	$product->delete();

        Session::flash('feedback_success', 'Product deleted');
    	return redirect('admin/products');
    }

    public function read(request $request, $id){
    	return redirect('admin/products');
    }




    public function create_bulk(){
        return view('products.bulk_create')->with(compact('records'));

    }

    public function store_bulk(request $request){
        request()->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        $path = request()->file('file')->getRealPath();
        // $file = file($path);

        $fileHandle = fopen($path, "r");
 
        while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) {
            $musicProduct = MusicProduct::Create([
                'release_date' => $row[3],
                'description' => $row[4],
                'artist' => $row[5],
                'genre' => $row[6],
                'carrier_id' => $row[7]
            ]);
            $musicProduct->save();

            $product = new Product();
            $product->title = $row[0];
            $product->price = $row[1];
            $product->category_id = $row[2];
            $product->productable_id = $musicProduct->id;
            $product->productable_type = "App\MusicProduct";
            $product->updated_at;
            $product->created_at;

            $product->save();

            $stock = new Stock();
            $stock->amount = $row[8];

            $product->stock()->save($stock);
        }
        Session::flash('feedback_success', 'products added!');
        return redirect("admin/products");

    }
}
