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
    //

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
        $genres = MusicProduct::all()->pluck('genre')->unique()->values();
        $artists = MusicProduct::all()->pluck('artist')->unique()->values();
        $categories = Category::all();

        $genres_filter = $request->has('genres') ? $request->get('genres') : [];
        $artists_filter = $request->has('artists') ? $request->get('artists') : [];


        $musicQuery = MusicProduct::query();

        $productQuery = Product::query();

        if(isset($genres_filter)){
            foreach($genres_filter as $key => $genre){
                $musicQuery = $key > 0 ? $musicQuery->orwhere('genre', $genre) : $musicQuery->where('genre', $genre);
            }
        }

        if(isset($artists_filter)){
            foreach($artists_filter as $key => $artist){
                $musicQuery = $key > 0 ? $musicQuery->orwhere('artist', $artist) : $musicQuery->where('artist', $artist);
            }
        }

        $musicProducts = $musicQuery->pluck('id');

        // productQuery filters here


        $minPrice = $request->has('min-price') ? $request->get('min-price') : 0;
        $maxPrice = $request->has('max-price') ? $request->get('max-price') : (int)Product::max('price');


        $productQuery = $productQuery->where('price', '>=', $minPrice)
                                     ->where('price', '<=', $maxPrice);



        $products = $productQuery->get();
        foreach ($products as $key => $product) {
            if(!$musicProducts->contains($product->productable_id)){
                unset($products[$key]);
            }
        }
        $products->values();

        return view('shop.list')->with(compact('products', 'categories', 'genres', 'artists', 'request', 'maxPrice'));
    }
}
