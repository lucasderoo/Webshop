<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;
use Session;
class Basket extends Model
{
	public $timestamps = false;

    public function basketproducts()
    {
        return $this->hasMany('App\BasketProduct');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public static function calculate_items(){
    	$cartItems = 0;
    	if(Auth::guest()){
    		$cartItems = count(session('basket'));
    	}
    	else{
    		if(Auth::user()->basket){
    			$cartItems = count(Auth::user()->basket->basketproducts);
    		}
    	}
    	return $cartItems;
    }	


    public static function calculate_price(){
		
		$price = (float)0.00;
		if(Auth::guest()){
            foreach(session('basket') as $product){
                $price = $price + floatval($product['price'] * $product['quantity']);
            }
        }
        else{
        	foreach($user->basket->basketproducts as $product){
		    	$price = $price + floatval($product->product->price * $product->quantity);
			}
        }

        return $price;
    }
}
