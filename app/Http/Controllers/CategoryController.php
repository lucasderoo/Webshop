<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Session;

class CategoryController extends Controller
{
    public function index(){

    	$categories = Category::All();

    	return view('categories.index')->with(compact('categories'));
    }

    public function create(){

    	return view('categories.create');
    }

    public function store(request $request){

    	$request->validate([
            'name' => 'required|string|max:50|unique:categories',
        ]);

    	$category = Category::create([
            'name' => $request['name'],
        ]);
        $category->save();

        Session::flash('feedback_success_category', 'Category added');
        return redirect()->route('admin/categories');
    }
    public function edit(request $request, $id){

    	$category = Category::find($id);

    	return view('categories.edit')->with(compact('category'));
    }

    public function update($id, request $request){
    	$request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

    	$category = Category::find($id);
    	$category->name = $request['name'];
    	$category->save();

        Session::flash('feedback_success_category', 'Category updated');
    	return redirect()->route('admin/categories');
    }

    public function delete($id){

    	$category = Category::find($id);

    	return view('categories.delete')->with(compact('category'));
    }


    public function destroy($id){
    	$category = Category::find($id);
    	$category->Musicproducts()->delete();
    	$category->delete();

    	Session::flash('feedback_error', 'Category deleted');
    	return redirect()->route('admin/categories');
    }


    public function read($id){
    	$category = Category::find($id);

    	return view('categories.read')->with(compact('category'));

    }
}
