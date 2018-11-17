<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Address;
use App\Order;

class CheckoutController extends Controller
{
    public function delivery_address_create(){
        $user = Auth::User();

        return view('shop/checkout/delivery_address')->with(compact("user"));
    }

    public function delivery_address_store(request $request){
        $user = Auth::User();     
        $deliveryaddress = Address::where('id', '=',(int)$request['deliveryaddress'])->where('user_id', '=', $user->id)->first();
        
        if(empty($deliveryaddress)){
            return redirect()->route('checkout/delivery_address');
        }
        
        $order = Order::create([
            'amount' => 15.00,
            'status' => 'paid',
            'payment_method' => 'IDEAL'
        ]);
        $deliveryaddress->order_delivery()->save($order);
        $user->orders()->save($order);
        $user->save();

        return redirect()->route('checkout/billing_address')->with(compact("order"));
        }
    

    public function billing_address_create(){
        $user = Auth::User();

        return view('shop/checkout/billing_address')->with(compact("user"));
    }

    public function billing_address_store(request $request){
        $user = Auth::User();
        $billingaddress = Address::where('id', '=',(int)$request['billingaddress'])->where('user_id', '=', $user->id)->first();
        
        $billingaddress->order_delivery()->save($order);
        $user->orders()->save($order);
        $user->save();

        return redirect()->route('show');
    }


// && !empty($billingaddress)
}
