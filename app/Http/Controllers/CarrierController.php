<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carrier;

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
    	
    	return redirect()->route('admin/carriers');
    }

    public function delete($id){

    	$carrier = Carrier::find($id);

    	return view('carriers.delete')->with(compact('carrier'));
    }


    public function destroy($id){
    	$carrier = Carrier::find($id);
    	$carrier->music_products()->delete();
    	$carrier->delete();

    	return redirect()->route('admin/carriers');
    }


    public function read($id){
    	$carrier = Carrier::find($id);

    	return view('carriers.read')->with(compact('carrier'));

    }
}
