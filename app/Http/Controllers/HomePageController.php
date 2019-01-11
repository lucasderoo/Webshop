<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\HomePageProduct;
use App\HomePage;

use Session;

class HomePageController extends Controller
{
    public function index(){

    	$pages = HomePage::All();


    	return view('homepage.index')->with(compact('pages'));
    }

    public function create(){

    	$products = Product::All();  

    	return view('homepage.create')->with(compact('products'));
    }

    public function store(request $request){
    	$request->validate([
            'title' => 'required|string|max:255|unique:home_pages',
            'displayed' => 'int|in:1,2',
        ]);

        if(count($request['products']) > 10){
        	Session::flash('feedback_error', 'Maximum of 10 products');
        	return redirect()->route('admin/homepage/create');
        }
        elseif(count($request['products']) < 3){
        	Session::flash('feedback_error', 'Minimum of 3 products');
        	return redirect()->route('admin/homepage/create');
        }

        $homePage = HomePage::create([
            'title' => $request['title'],
            'displayed' => $request->has('displayed') ? $request['displayed'] : 1
        ]);

        $homePage->save();

        foreach($request['products'] as $id){
        	$product = Product::find($id);

        	if(empty($product)){
        		Session::flash('feedback_error', 'unknown error, please try again');
        		return redirect()->route('admin/homepage/create');
        	}

        	$homePageProduct = HomePageProduct::create();
        	$homePageProduct->product()->associate($product);
        	$homePageProduct->home_page()->associate($homePage);
        	$homePageProduct->save();
        }

        Session::flash('feedback_success', 'Section saved');
        return redirect()->route('admin/homepage');
    }

    public function edit($id){

    	$homePage = HomePage::find($id);
    	$products = Product::All();  

    	return view('homepage.edit')->with(compact('homePage', 'products'));
    }

    public function update($id, request $request){
    	$request->validate([
            'title' => 'required|string|max:255|unique:home_pages,title,'.$id,
            'displayed' => 'int|in:1,2',
        ]);

        if(count($request['products']) > 10){
        	Session::flash('feedback_error', 'Maximum of 10 products');
        	return redirect()->route('admin/homepage/create');
        }
        elseif(count($request['products']) < 3){
        	Session::flash('feedback_error', 'Minimum of 3 products');
        	return redirect()->route('admin/homepage/create');
        }

        $homePage = HomePage::find($id);
        $homePage->title = $request['title'];
        $homePage->displayed = $request->has('displayed') ? $request['displayed'] : 1;
        $homePage->save();

        if(!empty($homePage->products)){
        	$homePage->products()->delete();
    	}

        foreach($request['products'] as $id){
        	$product = Product::find($id);

        	if(empty($product)){
        		Session::flash('feedback_error', 'unknown error, please try again');
        		return redirect()->route('admin/homepage/create');
        	}

        	$homePageProduct = HomePageProduct::create();
        	$homePageProduct->product()->associate($product);
        	$homePageProduct->home_page()->associate($homePage);
        	$homePageProduct->save();
        }

        Session::flash('feedback_success', 'Section saved');
        return redirect()->route('admin/homepage');
    }

    public function delete($id){
    	$homePage = HomePage::find($id);

    	return view('homepage.delete')->with(compact('homePage'));
    }


    public function destroy($id){
    	$homePage = HomePage::find($id);
    	$homePage->products()->delete();
    	$homePage->delete();

    	Session::flash('feedback_success', 'Section deleted');
    	return redirect()->route('admin/homepage');
    }

}
