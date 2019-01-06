<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Validation\Rule;

use App\Address;
use App\Order;

use Session;
class AccountController extends Controller
{
    
    public function index(){

    	$user = Auth::user();

    	return view('account.index')->with(compact('user'));
    }


    public function show_password(){
    	return view('account.edit-password');
    }

    public function update_password(request $request){

    	$user = Auth::user();

		if(!password_verify($request['current_password'], $user->password)){
			Session::flash('feedback_error', 'Current password not correct');
			return redirect()->route('account');
		}

    	$request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->password = bcrypt($request['password']);

        $user->save();

		Session::flash('feedback_success', 'Current password not correct');
    	return redirect()->route('account');
    }

    public function update(request $request){
    	$user = Auth::user();
    	$request->validate([
            'email' => 'required|string|email|max:255',
            'firstname' => 'required|string|max:50',
            'insertion' => 'string|max:20|nullable',
            'lastname' => 'required|string|max:50',
            'initials' => 'required|string|max:50',
            'phonenumber' => 'max:10',
            Rule::unique('users')->ignore($user->id, 'id')
        ]);

    	$user->email = $request['email'];

    	$user->member->firstname = $request['firstname'];
    	$user->member->insertion = $request['insertion'];
    	$user->member->lastname = $request['lastname'];
    	$user->member->initials = $request['initials'];
    	$user->member->phonenumber = $request['phonenumber'];

    	$user->member->save();
        $user->save();

        Session::flash('feedback_success', 'Account updated');
        return redirect()->route('account');
    }

    public function orders(){
    	$user = Auth::user();

    	return view('account.orders')->with(compact('user'));
    }

    public function show_order($id){
    	$user = Auth::user();
    	$order = Order::where('user_id', $user->id)->where('id', $id)->first();

    	return view('account.order')->with(compact('order', 'user'));
    }

    public function adresses(){
    	$user = Auth::user();

    	return view('account.addresses')->with(compact('user'));
    }

    public function addresses_create(){

    	return view('account.address-create');
    }

    public function addresses_delete($id){
    	$user = Auth::user();
    	$address = Address::where('user_id', $user->id)->where('id', $id)->first();

    	if(empty($address)){
    		Session::flash('feedback_error', 'Unkown error, please try again');
        	return redirect()->route('account/addresses');
    	}

    	return view('account.address-delete')->with(compact('address'));
    }

    public function addresses_edit($id){
    	$user = Auth::user();
    	$address = Address::where('user_id', $user->id)->where('id', $id)->first();

    	if(empty($address)){
    		Session::flash('feedback_error', 'Unkown error, please try again');
        	return redirect()->route('account/addresses');
    	}

    	return view('account.address-edit')->with(compact('address'));
    }

    public function addresses_store(request $request){
    	$user = Auth::user();
    	$request->validate([
            'street' => 'required|string|max:30',
            'house_number' => 'required|integer|min:1',
            'suffix' => 'string|nullable',
            'zipcode' => 'required|string|max:20',
            'city' => 'required|string|max:50',
            'country' => 'required|string|max:255',
        ]);

        $address = Address::create([
            'street' => $request['street'],
            'house_number' => $request['house_number'],
            'suffix' => $request['suffix'],
            'zipcode' => $request['zipcode'],
            'city' => $request['city'],
            'country' => $request['country'],
        ]);
        $address->save();

        $user->addresses()->save($address);

        Session::flash('feedback_success', 'Address saved');
        return redirect()->route('account/addresses');
    }

    public function addresses_update(request $request, $id){
    	$user = Auth::user();
    	$request->validate([
            'street' => 'required|string|max:30',
            'house_number' => 'required|integer|min:1',
            'suffix' => 'string|nullable',
            'zipcode' => 'required|string|max:20',
            'city' => 'required|string|max:50',
            'country' => 'required|string|max:255',
        ]);

        $address = Address::find($id);
        $address->street = $request['street'];
        $address->house_number = $request['house_number'];
        $address->suffix = $request['suffix'];
        $address->zipcode = $request['zipcode'];
        $address->city = $request['city'];
        $address->country = $request['country'];
        $address->save();

        $user->addresses()->save($address);

        Session::flash('feedback_success', 'Address updated');
        return redirect()->route('account/addresses');
    }

    public function addresses_destroy(request $request, $id){
    	$user = Auth::user();
    	$address = Address::where('user_id', $user->id)->where('id', $id)->first();

    	if(empty($address)){
    		Session::flash('feedback_error', 'Unkown error, please try again');
        	return redirect()->route('account/addresses');
    	}

        $address->delete();

        Session::flash('feedback_success', 'Address deleted');
        return redirect()->route('account/addresses');
    }
}
