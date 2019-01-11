<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carrier;
use Session;

class CarrierController extends Controller
{
    public function index(){

    	$carriers = Carrier::All();

    	return view('carriers.index')->with(compact('carriers'));
    }

    public function create(){

    	return view('carriers.create');
    }

    public function store(request $request){

    	$request->validate([
            'name' => 'required|string|max:50|unique:carriers',
        ]);

    	$carrier = Carrier::create([
            'name' => $request['name'],
        ]);
        $carrier->save();

        Session::flash('feedback_success', 'Carrier saved');
        return redirect()->route('admin/carriers');
    }

    public function edit(request $request, $id){

    	$carrier = Carrier::find($id);

    	return view('carriers.edit')->with(compact('carrier'));
    }

    public function update($id, request $request){
    	$request->validate([
            'name' => 'required|string|max:255|unique:carriers',
        ]);

    	$carrier = Carrier::find($id);
    	$carrier->name = $request['name'];
    	$carrier->save();

    	Session::flash('feedback_success', 'Carrier updated');
    	return redirect()->route('admin/carriers');
    }

    public function delete($id){

    	$carrier = Carrier::find($id);

    	return view('carriers.delete')->with(compact('carrier'));
    }


    public function destroy($id){
    	$carrier = Carrier::find($id);

        if(!empty($carrier->music_products)){
            foreach($carrier->music_products as $product){
                $product->productable->delete();
                HomePageProduct::where('product_id', $product->productable->id)->delete();
            }

        }


    	$carrier->music_products()->delete();
    	$carrier->delete();

    	Session::flash('feedback_success', 'Carrier deleted');
    	return redirect()->route('admin/carriers');
    }


    public function read($id){
    	$carrier = Carrier::find($id);

    	return view('carriers.read')->with(compact('carrier'));

    }
}
