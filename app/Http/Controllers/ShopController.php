<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Product;
use App\Category;
use Auth;
use App\MusicProduct;
use Input;

class ShopController extends Controller
{

    public function index(){

    	$products = Product::all();

    	return view('shop.home')->with(compact('products'));
    }

    public function show($slug){
    	$product = Product::where('slug', $slug)->first();

    	if(empty($product)){
    		return view('errors.404');
    	}
    	return view('shop.show')->with(compact('product'));
    }

    public function products(request $request){
        $pagination = 15;
        $paginationArray = [];

        $genres = MusicProduct::all()->pluck('genre')->unique()->values();
        $artists = MusicProduct::all()->pluck('artist')->unique()->values();
        $categories = Category::all();

        $genresFilter = $request->has('genres') ? $request->get('genres') : [];
        $artistsFilter = $request->has('artists') ? $request->get('artists') : [];


        $musicQuery = MusicProduct::query();

        $productQuery = Product::query();

        if(isset($genresFilter)){
            foreach($genresFilter as $key => $genre){
                $musicQuery = $key > 0 ? $musicQuery->orwhere('genre', $genre) : $musicQuery->where('genre', $genre);
            }
        }

        $musicProducts = $musicQuery->get(['id','artist']);

        if(!empty($artistsFilter)){
            foreach($musicProducts as $key => $musicProduct){
                if(!in_array($musicProduct->artist, $artistsFilter)){
                    unset($musicProducts[$key]);
                }
            }
        }

        // productQuery filters here
        $musicIds = $musicProducts->pluck('id')->toArray();

        $minPrice = $request->has('min-price') ? $request->get('min-price') : 0;
        $maxPrice = $request->has('max-price') ? $request->get('max-price') : (int)Product::max('price')+1;
        $productQuery = $productQuery->whereIn('productable_id', $musicIds)
                                     ->where('price', '>=', $minPrice)
                                     ->where('price', '<=', $maxPrice);

        $products = $productQuery->get();


        if(!empty($genresFilter) or !empty($artistsFilter)){
            foreach ($products as $key => $product) {
                if(!$musicProducts->contains($product->productable_id)){
                    unset($products[$key]);
                }
            }
        }

        $orderBy = $request->has('orderby') ? $request->get('orderby') : "sold";

        if($orderBy == "sold"){
            $orderby = "id"; // change in future
        }

        $sort = $request->has('sort') ? $request->get('sort') : "DESC";
        if($sort == "DESC"){
            $products->sortbydesc($orderBy);
        }
        else{
            $products->sortby($orderBy);
        }
        
        // keep this at the bottom
        $productsCount = count($products);
        if($productsCount > $pagination){
            $paginationArray['pages'] = $productsCount/$pagination+1;
            $paginationArray['pages'] = (int)$paginationArray['pages'];
            $paginationArray['currentpage'] = $request->has('page') ? $request->get('page') :  1;
            $products = $products->slice($paginationArray['currentpage']*$pagination-$pagination)->take($pagination);
        }

        return view('shop.list')->with(compact('products', 'categories', 'genres', 'artists', 'request', 'maxPrice', 'paginationArray'));
    }
}
