<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Product;
use App\Category;
use Auth;
use App\MusicProduct;
use Input;

use Collection;
use Session;

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

        $minPrice = $request->has('min-price') ? $request->get('min-price') : 0;
        $maxPrice = $request->has('max-price') ? $request->get('max-price') : (int)Product::max('price')+1;

        $musicQuery = MusicProduct::query();

        if(!empty($genresFilter)){
            $musicQuery = $musicQuery->whereIn('genre', $genresFilter);
        }
        if(!empty($artistsFilter)){
            $musicQuery = $musicQuery->whereIn('artist', $artistsFilter);
        }

        $musicProducts = $musicQuery->get();
        $products = collect();

        foreach($musicProducts as $product){
            if($product->productable()->first()->price >= $minPrice AND $product->productable()->first()->price <= $maxPrice){
                $products->push($product->productable()->first());
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
