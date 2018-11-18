<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Address;
use App\Order;
use App\OrderProduct;

class CheckoutController extends Controller
{
    public function delivery_address_create(){
        $user = Auth::User();

        return view('shop/checkout/delivery_address')->with(compact("user"));
    }

    public function delivery_address_store(request $request){
        // return var_dump($request->all());
        
        $user = Auth::User();     
        $deliveryaddress = Address::where('id', '=',(int)$request['delivery_input'])->where('user_id', '=', $user->id)->first();
        $billingaddress = Address::where('id', '=',(int)$request['billing_input'])->where('user_id', '=', $user->id)->first();
        
        $productsCount = 0;
        $price = (float)0.00;

    	foreach($user->basket->basketproducts as $product){
    		$productsCount = $productsCount + $product->quantity;
    		$price = $price + floatval($product->product->price * $product->quantity);
    	}

        if(empty($deliveryaddress) or empty($billingaddress)){
            return redirect()->route('checkout/delivery_address');
        }
        
        $order = Order::create([
            'amount' => $price,
            'status' => 'paid',
            'payment_method' => 'IDEAL'
        ]);
        $deliveryaddress->order_delivery()->save($order);
        $billingaddress->order_billing()->save($order);
        $user->orders()->save($order);
        $user->save();

        

        foreach($user->basket->basketproducts as $product){

            $orderProduct = OrderProduct::Create();
            $orderProduct->order()->associate($order);
            $orderProduct->product()->associate($product);
            $orderProduct->quantity = $product->quantity;
            $orderProduct->save();
        }

        foreach($user->basket->basketproducts as $product){
    		$product->delete();
    	}


        return redirect()->route('checkout/confirmation')->with(compact("order"));
        }
    

    public function billing_address_create(){
        $user = Auth::User();

        return view('shop/checkout/billing_address')->with(compact("user"));
    }

    public function thank_you_create(){
        $user = Auth::User();

        return view('shop/checkout/thank_you')->with(compact("user"));
    }

    public function confirmation_create(){
        $user = Auth::User();
        $productsCount = 0;
    	$price = (float)0.00;
    	foreach($user->basket->basketproducts as $product){
    		$productsCount = $productsCount + $product->quantity;
    		$price = $price + floatval($product->product->price * $product->quantity);
    	}
        

        
        $price = number_format((float)$price, 2, '.', '');
        
        return view('shop/checkout/confirmation')->with(compact('user','price', 'productsCount'));
    }


}
