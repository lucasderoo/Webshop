<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Basket;
use App\BasketProduct;
use App\User;
use Auth;

use Session;

class CartController extends Controller
{
 
    public function index(){
    	$user = Auth::user();
    	
    	$productsCount = 0;
    	$price = (float)0.00;
    	foreach($user->basket->basketproducts as $product){
    		$productsCount = $productsCount + $product->quantity;
    		$price = $price + floatval($product->product->price * $product->quantity);
    	}
    	$
    	$price = number_format((float)$price, 2, '.', '');
    	return view('shop.cart')->with(compact('user', 'price', 'productsCount'));
    }


    public function store($slug){

    	$product = Product::where('slug', $slug)->first();
     	$user = Auth::user();

     	if($product->stock->amount < 1){
     		Session::flash('feedback_error', 'Product is out of stock!');
     		return redirect()->back();
     	}

     	if(empty($user->basket)){
     		$basket = Basket::create();
     		$user->basket()->save($basket);
     		$user->save();
     	}

     	$duplicate = false;

     	foreach($user->basket->basketproducts as $basketProduct){
     		if($basketProduct->product_id == $product->id){
     			$duplicate = true;
     		}
     	}

     	if(!$duplicate){
     		$cartProduct = BasketProduct::create();
	     	$cartProduct->basket()->associate($user->basket);
	     	$cartProduct->product()->associate($product);
	     	$cartProduct->save();
     	}
     	else{
     		$cartProduct = BasketProduct::where('product_id', $product->id)->first();
     		$cartProduct->quantity = $cartProduct->quantity + 1;
     		$cartProduct->save();
     	}

     	Session::flash('feedback_success', 'Product added to cart');
     	return redirect()->back();
    }

    public function update(Request $request, $slug){
     	
    	


    }

    public function destroy($slug){
     	
    		


    }
        
}
