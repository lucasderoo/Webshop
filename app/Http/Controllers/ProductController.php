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
use App\HomePage;
use App\HomePageProduct;

use Session;

use DB;
use Validator;
class ProductController extends Controller
{
    public function index(){
    	$products = Product::paginate(15);

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
            'price' => 'required|numeric|between:0.00,99.99',
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
            'price' => 'required|numeric|between:0.00,99.99',
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


        HomePageProduct::where('product_id',$id)->delete();

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

        $fileHandle = fopen($path, "r");


        $rowCount = 1;
        while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) {

            if(count($row) != 9){
                Session::flash('feedback_error', 'csv must have 8 comma\'s on a row');
                return redirect("admin/products/create_bulk");
            }

            if(count(explode('/', $row[3])) == 3 OR count(explode('-', $row[3])) == 3){
                if(count(explode('/', $row[3])) == 3){
                    $check_date = explode('/', $row[3]);
                }
                else{
                    $check_date = explode('-', $row[3]);
                }
            }
            else{
                Session::flash('feedback_error', 'date input error on row '.$rowCount);
                return redirect("admin/products/create_bulk");
            }

            if(!checkdate((int)$check_date[1], (int)$check_date[2], (int)$check_date[0])){
                Session::flash('feedback_error', 'date not valid on row '.$rowCount);
                return redirect("admin/products/create_bulk");
            }

            if(empty($row[4]) OR empty($row[5]) OR empty($row[6]) OR empty($row[0]) OR strlen($row[0]) > 50 OR strlen($row[0]) > 50 OR strlen($row[5]) > 75 OR strlen($row[5]) > 75){
                Session::flash('feedback_error', 'empty or too long title, description, artist or genre on row '.$rowCount);
                return redirect("admin/products/create_bulk");
            }

            if(empty(Carrier::find($row[7])) OR empty(Category::find($row[2]))){
                Session::flash('feedback_error', 'invalid carrier_id or category_id on'.$rowCount);
                return redirect("admin/products/create_bulk");
            }


            if(is_float($row[1]) OR strlen(explode('.',$row[1])[1]) != 2){
                Session::flash('feedback_error', 'invalid price on row '.$rowCount);
                return redirect("admin/products/create_bulk");
            }

            if(!is_numeric($row[8])){
                Session::flash('feedback_error', 'invalid stock on row '.$rowCount);
                return redirect("admin/products/create_bulk");
            }
            $rowCount++;
        }

        $fileHandle = fopen($path, "r");

        while (($roww = fgetcsv($fileHandle, 0, ",")) !== FALSE) {
            $musicProduct = MusicProduct::Create([
                'release_date' => $roww[3],
                'description' => $roww[4],
                'artist' => $roww[5],
                'genre' => $roww[6],
                'carrier_id' => $roww[7]
            ]);
            $musicProduct->save();
            $product = new Product();
            $product->title = $roww[0];
            $product->price = $roww[1];
            $product->category_id = $roww[2];
            $product->productable_id = $musicProduct->id;
            $product->productable_type = "App\MusicProduct";
            $product->updated_at;
            $product->created_at;

            $product->save();

            $stock = new Stock();
            $stock->amount = $roww[8];

            $product->stock()->save($stock);
        }


        Session::flash('feedback_success', 'products added!');
        return redirect("admin/products");

    }
}
