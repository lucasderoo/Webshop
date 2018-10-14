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
        $genres = MusicProduct::all()->pluck('genre')->unique();
        $artists = MusicProduct::all()->pluck('artist')->unique();
        $categories = Category::all();

        $genres_filter = $request->has('genres') ? $request->get('genres') : [];
        $artists_filter = $request->has('artists') ? $request->get('artists') : [];


        $query = MusicProduct::query();

        if(isset($genres_filter)){
            foreach($genres_filter as $key => $genre){
                $query = $query->where('genre', $genre);
            }
        }

        if(isset($artists_filter)){
            foreach($artists_filter as $key => $artist){
                $query = $query->where('artist', $artist);
            }
        }
        $musicProducts = $query->get();
        // $products = Product::orderBy($request['sort'], $request['order'])->get();
        $products = collect([]);
        foreach($musicProducts as $product){
            $products->push($product->productParent[0]);
        }
        return view('shop.list')->with(compact('products', 'categories', 'genres', 'artists', 'request'));
    }
}
