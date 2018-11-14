<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Address;

class CheckoutController extends Controller
{
    public function delivery_address_create(){
        $user = Auth::User();

        return view('shop/checkout/delivery_address')->with(compact("user"));
    }

    public function delivery_address_store(request $request){
        $user = Auth::User();     
        $address = Address::where('id', '=',(int)$request['deliveryaddress'])->where('user_id', '=', $user->id)->first();
        
        if(empty($address)){
            return redirect()->route('checkout/delivery_address');
        }

        }

    public function billing_address_create(){
        $user = Auth::User();

        return view('shop/checkout/billing_address')->with(compact("user"));
    }

    public function billing_address_store(){

    }



}
