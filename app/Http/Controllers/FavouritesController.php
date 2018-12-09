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
    	$user = Auth::user();

    	$productsCount = 0;
    	$price = (float)0.00;
    	if(!empty($user->favourites)){
	    	foreach($user->favourites->favouritesproducts as $product){
	    		$productsCount = $productsCount + $product->quantity;
	    		$price = $price + floatval($product->product->price * $product->quantity);
	    	}
    	}
    	$price = number_format((float)$price, 2, '.', '');
    	return view('shop.favourites')->with(compact('user', 'price', 'productsCount'));
    }


    public function store($slug){

    	$product = Product::where('slug', $slug)->first();
     	$user = Auth::user();
      //
     	// if($product->stock->amount < 1){
     	// 	Session::flash('feedback_error', 'Product is out of stock!');
     	// 	return redirect()->back();
     	// }

     	if(empty($user->favourites)){
     		$favourites = Favourites::create();
     		$user->favourites()->save($favourites);
     		$user->favourites = $favourites;
     	}

     	$duplicate = false;

     	foreach($user->favourites->favouritesproducts as $favouritesProduct){
     		if($favouritesProduct->product_id == $product->id){
     			$duplicate = true;
     		}
     	}

     	if(!$duplicate){
     		$favouritesProduct = FavouritesProduct::create();
	     	$favouritesProduct->favourites()->associate($user->favourites);
	     	$favouritesProduct->product()->associate($product);
	     	$favouritesProduct->save();
     	}
     	else{
     		$favouritesProduct = FavouritesProduct::where('product_id', $product->id)->first();
     		$favouritesProduct->quantity = $favouritesProduct->quantity + 1;
     		$favouritesProduct->save();
     	}

     	Session::flash('feedback_success', 'Product added to favourites');
     	return redirect()->back();
    }

    public function update(Request $request, $id){
        $user = Auth::user();
        if(!$user->favourites->favouritesproducts->contains('id', $id)){
            Session::flash('feedback_error', 'unkown error, please try again');
            return redirect()->route('favourites');
        }
        elseif(!$request->has('quantity') OR $request['quantity'] < 1 ){
            Session::flash('feedback_error', 'quantity has to be at least 1');
            return redirect()->route('favourites');
        }

        $favouritesProduct = FavouritesProduct::find($id);
        $favouritesProduct->quantity = $request['quantity'];
        $favouritesProduct->save();

        Session::flash('feedback_success', 'Favourites updated');
        return redirect()->route('favourites');
    }

    public function destroy($id){
     	$user = Auth::user();
        if(!$user->favourites->favouritesproducts->contains('id', $id)){
            Session::flash('feedback_error', 'unkown error, please try again');
            return redirect()->route('favourites');
        }

        $favouritesProduct = FavouritesProduct::find($id);
        $favouritesProduct->delete();

        Session::flash('feedback_success', 'Favourites updated');
        return redirect()->route('favourites');

    }

}
