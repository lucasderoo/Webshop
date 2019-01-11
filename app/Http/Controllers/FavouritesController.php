<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Favourites;
use App\FavouritesProduct;
use App\User;
use Auth;

use Session;

class FavouritesController extends Controller
{

    public function index(){
    	$favourites = Auth::user()->favourites;
    	return view('shop.favourites')->with(compact('favourites'));
    }

    public function store($slug){
    	$product = Product::where('slug', $slug)->first();

     	$user = Auth::user();

     	if(empty($user->favourites)){
     		$favourites = Favourites::create();
     		$user->favourites()->save($favourites);
     		$user->favourites = $favourites;
     	}

     	if(!$user->favourites->favouritesproducts->contains('product_id', $product->id)){
     		$favouritesProduct = FavouritesProduct::create();
	     	$favouritesProduct->favourites()->associate($user->favourites);
	     	$favouritesProduct->product_id = $product->id;
	     	$favouritesProduct->save();
            Session::flash('feedback_success_favo_add', 'Product added to favourites');
     	}
     	else{
     		$favouritesProduct = FavouritesProduct::where('product_id', $product->id)->first();
     		$favouritesProduct->delete();
            Session::flash('feedback_success_favo_add', 'Product removed from favourites');
     	}

     	return redirect()->back();
    }
}
