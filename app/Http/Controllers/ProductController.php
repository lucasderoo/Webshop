<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Carrier;
use App\Genre;

class ProductController extends Controller
{
    public function index(){
    	$products = Product::All();

    	return view('products.index')->with(compact('products'));
    }



    public function create()
    {
    	$categories = Category::all();
    	$genres = Genre::all();
    	$carriers = Carrier::all();
        return view('products.create')->with(compact('categories', 'genres', 'carriers'));
    }


    public function store(Request $request){



    	var_dump($request);
    	return;
    }
}
