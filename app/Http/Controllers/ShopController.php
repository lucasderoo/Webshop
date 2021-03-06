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

        $genres = MusicProduct::all()->pluck('genre')->unique()->values();
        $artists = MusicProduct::all()->pluck('artist')->unique()->values();
        $categories = Category::all();

        $genresFilter = $request->has('genres') ? $request->get('genres') : [];
        $artistsFilter = $request->has('artists') ? $request->get('artists') : [];

        $minPrice = $request->has('min-price') ? $request->get('min-price') : 0;
        $maxPrice = $request->has('max-price') ? $request->get('max-price') : (int)Product::max('price')+1;

        $minDate = $request->has('min-date') ? $request->get('min-date') : MusicProduct::min('release_date');
        $maxDate = $request->has('max-date') ? $request->get('max-date') : MusicProduct::max('release_date');


        $musicQuery = MusicProduct::query();

        if(!empty($genresFilter)){
            $musicQuery = $musicQuery->whereIn('genre', $genresFilter);
        }
        if(!empty($artistsFilter)){
            $musicQuery = $musicQuery->whereIn('artist', $artistsFilter);
        }
        $musicQuery = $musicQuery->where('release_date', '>=', $minDate);
        $musicQuery = $musicQuery->where('release_date', '<=', $maxDate);

        $musicProducts = $musicQuery->get();

        $products = collect();

        foreach($musicProducts as $product){
            if($product->productable()->first()->price >= $minPrice AND $product->productable()->first()->price <= $maxPrice){
                $products->push($product->productable()->first());
            }
        }

        $orderBy_ = "";
        $orderBy = $request->has('orderby') ? $request->get('orderby') : "sold";
        $sort = $request->has('sort') ? $request->get('sort') : "DESC";

        if($orderBy == "price-high-low"){
            $orderBy_ = "price";
            $sort = "DESC";
        }
        elseif($orderBy == "price-low-high"){
            $orderBy_ = "price";
            $sort = "ASC";
        }
        elseif($orderBy == "date-new-old"){
            $orderBy_ = "created_at"; 
            $sort = "DESC";
        }
        elseif($orderBy == "date-old-new"){
            $orderBy_ = "created_at";
            $sort = "ASC";
        }
        else{
            $orderBy_ = "id";
            $sort = "ASC";
        }

        if($sort == "DESC"){
            $products = $products->sortbydesc($orderBy_);
        }
        else{
            $products = $products->sortby($orderBy_);
        }

        // keep this at the bottom
        $productsCount = count($products);
        if($productsCount > $pagination){
            $paginationArray['pages'] = $productsCount/$pagination+1;
            $paginationArray['pages'] = (int)$paginationArray['pages'];
            $paginationArray['currentpage'] = $request->has('page') ? $request->get('page') :  1;
            $products = $products->slice($paginationArray['currentpage']*$pagination-$pagination)->take($pagination);
        }

        return view('shop.list')->with(compact('products', 'categories', 'genres', 'artists', 'request', 'maxPrice', 'paginationArray', 'minDate', 'maxDate', 'orderBy'));
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
