<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Product;
use App\Category;
use Auth;

class ShopController extends Controller
{
    //

    public function index(){

    	$products = Product::all();

    	var_dump($products);
    	return;
    }




    public function show($slug){
    	$product = Product::where('slug', $slug)->first();

    	if(empty($product)){
    		return "product niet gevonden";
    	}

    	return view('shop.show')->with(compact('product'));
    }
}
