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

        $products = [];
        $productsCount = 0;
        $price = (float)0.00;
        $guest = Auth::guest();
        if(Auth::guest()){
            $products = session('basket');
            if(!empty(session('basket'))){
                foreach(session('basket') as $product){
                    $productsCount = $productsCount + $product['quantity'];
                    $price = $price + floatval($product['price'] * $product['quantity']);
                }
            }
        }
        else{
            $user = Auth::user();
            if(!empty($user->basket)){
                $products = $user->basket->basketproducts;
                foreach($user->basket->basketproducts as $product){
                    $productsCount = $productsCount + $product->quantity;
                    $price = $price + floatval($product->product->price * $product->quantity);
                }
            }
        }
    	$price = number_format((float)$price, 2, '.', '');
    	return view('shop.cart')->with(compact('price', 'productsCount','products','guest'));
    }


    public function store($slug){

    	$product = Product::where('slug', $slug)->first();
     	$user = Auth::user();

     	if($product->stock->amount < 1){
     		Session::flash('feedback_error', 'Product is out of stock!');
     		return redirect()->back();
     	}

        if(Auth::guest()){
            $basket = session()->get('basket');
            if(!$basket) {
                $basket = [
                    $product->id => [
                        "slug" => $product->slug,
                        "title" => $product->title,
                        "main_image_url" => $product->main_image_url,
                        "quantity" => 1,
                        "price" => $product->price
                    ]
                ];

                session()->put('basket', $basket);
 
                session::flash('feedback_success', 'Product added to cart');
                return redirect()->back();
            }

            // if cart not empty then check if this product exist then increment quantity
            if(isset($basket[$product->id])) {
                
                $basket[$product->id]['quantity']++;
     
                session()->put('basket', $basket);
     
                session::flash('feedback_success', 'Product added to cart');
                return redirect()->back();
            }
 
            // if item not exist in cart then add to cart with quantity = 1
            $basket[$product->id] = [
                "slug" => $product->slug,
                "title" => $product->title,
                "main_image_url" => $product->main_image_url,
                "quantity" => 1,
                "price" => $product->price
            ];
     
            session()->put('basket', $basket);
     
            session::flash('feedback_success', 'Product added to cart');
            return redirect()->back();
        }
        else{
         	if(empty($user->basket)){
         		$basket = Basket::create();
         		$user->basket()->save($basket);
         		$user->basket = $basket;
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
        }
        session::flash('feedback_success', 'Product added to cart');
        return redirect()->back();
    }

    public function update(Request $request, $id){
        $product = Product::find($id);

        if(Auth::guest()){
            $basket = session()->get('basket');

            if(!$request->has('quantity') OR $request['quantity'] < 1 ){
                Session::flash('feedback_error', 'quantity has to be at least 1');
                return redirect()->route('cart');
            }
            $basket[$id]['quantity'] = $request['quantity'];

            session()->put('basket', $basket);
        }
        else{
            $user = Auth::user();
            if(!$user->basket->basketproducts->contains('product_id', (int)$id)){
                Session::flash('feedback_error', 'unkown error, please try again');
                return redirect()->route('cart');
            }
            elseif(!$request->has('quantity') OR $request['quantity'] < 1 ){
                Session::flash('feedback_error', 'quantity has to be at least 1');
                return redirect()->route('cart');
            }

            $cartProduct = BasketProduct::where('product_id', $id)->where('basket_id', $user->basket->id)->first();
            $cartProduct->quantity = $request['quantity'];
            $cartProduct->save();
        }

        Session::flash('feedback_success', 'Cart updated');
        return redirect()->route('cart');
    }

    public function destroy($id){
        $product = Product::find($id);

        if(Auth::guest()){
            $basket = session()->get('basket');

            unset($basket[$id]);

            session()->put('basket', $basket);
        }
        else{
         	$user = Auth::user();
            if(!$user->basket->basketproducts->contains('product_id', (int)$id)){
                Session::flash('feedback_error', 'unkown error, please try again');
                return redirect()->route('cart');
            }
        		
            $cartProduct = BasketProduct::where('product_id', $id)->where('basket_id', $user->basket->id)->first();
            $cartProduct->delete();
        }

        Session::flash('feedback_success', 'Cart updated');
        return redirect()->route('cart');

    }
        
}
