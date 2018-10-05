<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Product;
use App\Category;

class ShopController extends Controller
{
    //

    public function index(){


    	$product = Product::find(1);

    	var_dump($product);

    }

    public function show($slug){


    	$product = Product::find(1);

    	var_dump($product);

    }

    public function test(){

        return View('welcome'); 
    }
}
