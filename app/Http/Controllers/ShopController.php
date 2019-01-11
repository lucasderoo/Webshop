<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Product;
use App\Category;
use Auth;
use App\MusicProduct;
use App\HomePage;
use Input;

use Collection;
use Session;

class ShopController extends Controller
{

    public function index(){

    	$sections = HomePage::all();

    	return view('shop.home')->with(compact('sections'));
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
        $favourites = collect();

        if(!Auth::guest() && !empty(Auth::user()->favourites)){
            $favourites = Auth::user()->favourites->favouritesproducts;
        }

        $genres = MusicProduct::all()->sortBy('genre')->pluck('genre')->unique()->values();
        $artists = MusicProduct::all()->sortBy('artist')->pluck('artist')->unique()->values();

        $categories = Category::all();

        $genresFilter = $request->has('genres') ? $request->get('genres') : [];
        $artistsFilter = $request->has('artists') ? $request->get('artists') : [];

        $minPrice = $request->has('min-price') ? $request->get('min-price') : 0;
        $maxPrice = $request->has('max-price') ? $request->get('max-price') : (int)Product::max('price')+1;

        $minDate = $request->has('min-date') ? $request->get('min-date') : MusicProduct::min('release_date');
        $maxDate = $request->has('max-date') ? $request->get('max-date') : MusicProduct::max('release_date');



        $productsQuery = Product::query();

        $productsQuery = $productsQuery->leftJoin('music_products', 'products.productable_id', '=', 'music_products.id');

        if(!empty($genresFilter)){
            $productsQuery = $productsQuery->whereIn('music_products.genre', $genresFilter);
        }
        if(!empty($artistsFilter)){
            $productsQuery = $productsQuery->whereIn('music_products.artist', $artistsFilter);
        }
        $productsQuery = $productsQuery->where('music_products.release_date', '>=', $minDate);
        $productsQuery = $productsQuery->where('music_products.release_date', '<=', $maxDate);

        $orderBy_ = "id";
        $orderBy = $request->has('orderby') ? $request->get('orderby') : "sold";
        $sort = $request->has('sort') ? $request->get('sort') : "DESC";

        if($orderBy == "price-high-low"){
            $orderBy_ = "products.price";
            $sort = "DESC";
        }
        elseif($orderBy == "price-low-high"){
            $orderBy_ = "products.price";
            $sort = "ASC";
        }
        elseif($orderBy == "date-new-old"){
            $orderBy_ = "products.created_at"; 
            $sort = "DESC";
        }
        elseif($orderBy == "date-old-new"){
            $orderBy_ = "products.created_at";
            $sort = "ASC";
        }
        else{
            $orderBy_ = "products.id";
            $sort = "ASC";
        }

        $productsQuery = $productsQuery->orderby($orderBy_, $sort);

        $products = $productsQuery->paginate(15);

        return view('shop.list')->with(compact('products', 'categories', 'genres', 'artists', 'request', 'maxPrice', 'minDate', 'maxDate', 'orderBy', 'favourites'));
    }

    public function search(request $request){

        if(empty($request['s']) OR strlen($request['s']) < 3){
            Session::flash('feedback_error', 'Minimum of 3 characters');
            return redirect()->back();
        }
        $products = Product::search($request['s'])->get();

        $musicProducts = MusicProduct::search($request['s'])->get();

        $musicProductsResult = collect();

        foreach($musicProducts as $product){
            $musicProductsResult->push($product->productable()->first());
        }

        $products = $products->merge($musicProductsResult);

        $products = $products->unique();

        $s = $request['s'];

        return view('shop.search')->with(compact('products', 's'));
    }



    public function faq() {
      return view ('shop.faq');
    }
    public function privacy() {
      return view ('shop.privacy');
    }
    public function service() {
      return view ('shop.customerservice');
    }
    public function about(){
      return view ('shop.about');
    }
    public function jobs(){
      return view('shop.joboffers');
    }
    public function news(){
      return view('shop.news');
    }
}
