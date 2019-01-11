<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use Auth;
use App\Address;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Basket;

use Mail;
class CheckoutController extends Controller
{

    public function checkout(){
        if(Auth::guest()){
        	if(!session('basket') OR empty(session('basket'))){
        		Session::flash('feedback_error', 'Cart is empty');
        		return redirect()->route('cart');
        	}
        	return view('shop.checkout.checkout');
        }
        else{
        	$user = Auth::User();
        	if(empty($user->basket->basketproducts)){
    			Session::flash('feedback_error', 'Cart is empty');
        		return redirect()->route('cart');
        	}
    		return view('shop.checkout.checkout')->with(compact("user"));
    	}
    }

    public function checkout_store(request $request){
        if(Auth::guest()){
        	$request->validate([
	            'email' => 'required|string|email|max:255|unique:users',
	            'firstname' => 'required|string|max:50|',
	            'lastname' => 'required|string|max:50',
	            'street' => 'required|string|max:30',
	            'house_number' => 'required|integer|min:1',
	            'suffix' => 'string|nullable',
	            'zipcode' => 'required|string|max:20',
	            'city' => 'required|string|max:50',
	            'country' => 'required|string|max:255',
        	]);


            $price = Basket::calculate_price();

        	$order = [
                'info' => [
                    "email" => $request['email'],
                    "firstname" => $request['firstname'],
                    "lastname" => $request['lastname'],
                    "price" => $price
                ],
                'delivery_address' => [
                	'street' => $request['street'],
		            'house_number' => $request['house_number'],
		            'suffix' => $request['suffix'],
		            'zipcode' => $request['zipcode'],
		            'city' => $request['city'],
		            'country' => $request['country'],
                ],
            ];

        	if($request['billing_address'] == "on"){
        		$order['billing_address'] = "same";
        	}
        	else{
        		$request->validate([
		            'street_billing' => 'required|string|max:30',
		            'house_number_billing' => 'required|integer|min:1',
		            'suffix_billing' => 'string|nullable',
		            'zipcode_billing' => 'required|string|max:20',
		            'city_billing' => 'required|string|max:50',
		            'country_billing' => 'required|string|max:255',
		        ]);

		        $order['billing_address'] = [
                	'street' => $request['street_billing'],
		            'house_number' => $request['house_number_billing'],
		            'suffix' => $request['suffix_billing'],
		            'zipcode' => $request['zipcode_billing'],
		            'city' => $request['city_billing'],
		            'country' => $request['country_billing'],
                ];
        	}

        	session()->put('order', $order);
        }
        else{
        	$user = Auth::user();
        	if(count($request['delivery_input']) != 1){
        		Session::flash('feedback_error', 'No delivery address selected');
        		return redirect()->route('checkout');
        	}

            $price = Basket::calculate_price();

        	$order = [
                'info' => [
                    "email" => $user->email,
                    "firstname" => $user->member->firstname,
                    "lastname" => $user->member->insertion.' '.$user->member->lastname,
                    "price" => $price
                ],
                'delivery_address' => $request['delivery_input'][0]
            ];

            if($request['billing_address'] == "on"){
        		$order['billing_address'] = $request['delivery_input'][0];
        	}
        	else{
        		if(count($request['billing_input']) != 1){
        			Session::flash('feedback_error', 'No billing address selected');
        			return redirect()->route('checkout');
        		}
        		$order['billing_address'] = $request['billing_input'][0];
        	}

        	session()->put('order', $order);
        }

        return redirect()->route('checkout/confirm');
    }


    public function confirm(){

        $user = Auth::user();
        if(!session('order')){
        	Session::flash('feedback_error', 'unknown error, please try again');
        	return redirect()->route('checkout');
        }

        $addresses = [];
        if(!Auth::guest()){
        	$addresses['delivery_address'] = Address::find(session('order')['delivery_address']);
        	$addresses['billing_address'] = Address::find(session('order')['billing_address']);
        }

        $guest = Auth::guest();
        $price = Basket::calculate_price();
        $products = $guest ? session('basket') : $user->basket->basketproducts;


        return view('shop.checkout.confirm')->with(compact("addresses", "products", "guest", "user", "price"));
    }

    public function confirm_store(){


        if(session('order')){

        	$order = Order::create([
	            'amount' => session('order')['info']['price'],
	            'status' => 'paid',
	            'payment_method' => 'IDEAL',
	            'email' => session('order')['info']['email'],
	            'firstname' => session('order')['info']['firstname'],
	            'lastname' => session('order')['info']['lastname'],
        	]);


        	if(Auth::guest()){
        		foreach(session('basket') as $key => $bproduct){
        			$orderProduct = OrderProduct::create([
        				'quantity' => $bproduct['quantity'],
        			]);
	    	     	$orderProduct->order()->associate($order);
	    	     	$product = Product::find($key);
	    	     	$orderProduct->product()->associate($product);
	    	     	$orderProduct->save();
        		}
        	}
        	else{
        		$user = Auth::user();
        		foreach($user->basket->basketproducts as $bproduct){
        			$orderProduct = OrderProduct::create([
        				'quantity' => $bproduct->quantity,
        			]);
	    	     	$orderProduct->order()->associate($order);
	    	     	$orderProduct->product()->associate($bproduct->product);
	    	     	$orderProduct->save();
        		}

        		$user->orders()->save($order);
        	}

        	if(is_array(session('order')['delivery_address'])){
        		$delivery_address = Address::create([
		            'street' => session('order')['delivery_address']['street'],
		            'house_number' => session('order')['delivery_address']['house_number'],
		            'suffix' => session('order')['delivery_address']['suffix'],
		            'zipcode' => session('order')['delivery_address']['zipcode'],
		            'city' => session('order')['delivery_address']['city'],
		            'country' => session('order')['delivery_address']['country'],
        		]);
        		$delivery_address->save();
        		$delivery_address->order_delivery()->save($order);
        	}
        	else{
        		$delivery_address = Address::find((int)session('order')['delivery_address']);
        		$delivery_address->order_delivery()->save($order);
        	}
        	if(is_array(session('order')['billing_address'])){
        		$billing_address = Address::create([
		            'street' => session('order')['billing_address']['street'],
		            'house_number' => session('order')['billing_address']['house_number'],
		            'suffix' => session('order')['billing_address']['suffix'],
		            'zipcode' => session('order')['billing_address']['zipcode'],
		            'city' => session('order')['billing_address']['city'],
		            'country' => session('order')['billing_address']['country'],
        		]);
        		$billing_address->save();
        		$billing_address->order_billing()->save($order);
        	}
        	elseif(session('order')['billing_address'] == "same"){
        		$order->address()->first()->order_billing()->save($order);
        	}
        	else{
        		$billing_address = Address::find((int)session('order')['billing_address']);
        		$billing_address->order_billing()->save($order);
        	}

        	$order->save();

            $guest = Auth::guest();

        	$orderId = $order->id;
        	$orderDetails = session('order');
        	$basketDetails = $guest ? session('basket') : Auth::user()->basket->basketproducts;

        	session()->forget('order');

        	$guest = Auth::guest();
        	if($guest){
        		session()->forget('basket');
        	}
        	else{
        		Auth::user()->basket()->delete();
        	}


        	if(!is_array($orderDetails['delivery_address'])){
        		$delivery_address = Address::find((int)$orderDetails['delivery_address']);
        		$orderDetails['delivery_address'] = [
        			'street' => $delivery_address->street,
		            'house_number' => $delivery_address->house_number,
		            'suffix' => $delivery_address->suffix,
		            'zipcode' => $delivery_address->zipcode,
		            'city' => $delivery_address->city,
		            'country' => $delivery_address->country,
        		];


        		if($orderDetails['billing_address'] == "same"){
        			$orderDetails['billing_address'] = [
        				'street' => $delivery_address->street,
		            	'house_number' => $delivery_address->house_number,
		            	'suffix' => $delivery_address->suffix,
		            	'zipcode' => $delivery_address->zipcode,
		            	'city' => $delivery_address->city,
		            	'country' => $delivery_address->country,
        			];
        		}
        		else{
        			$billing_address = Address::find((int)$orderDetails['billing_address']);
	        		$orderDetails['billing_address'] = [
	        			'street' => $billing_address->street,
			            'house_number' => $billing_address->house_number,
			            'suffix' => $billing_address->suffix,
			            'zipcode' => $billing_address->zipcode,
			            'city' => $billing_address->city,
			            'country' => $billing_address->country,
	        		];
        		}
        	}

        	if($orderDetails['billing_address'] == "same"){
        		$orderDetails['billing_address'] = $orderDetails['delivery_address'];
        	}

        	mail::send('mail.order-confirm', compact('orderDetails', 'basketDetails', 'guest', 'order'), function($message) use ($orderDetails, $orderId)
	        {
	            $message->to($orderDetails['info']['email'], 'Schoolwebshop')->subject('Order confirmation #'.$orderId);
	        });

        }
        else{
        	Session::flash('feedback_error', 'unknown error, please try again');
        	return redirect()->route('checkout');
        }
        return redirect()->route('checkout/thank_you', ['id'=> $order->id]);
    }

    public function thank_you($id){
        return view('shop.checkout.thank_you');
    }
		public function checkout_guest(){
			return view('shop.checkout.checkout_login');
		}

}
