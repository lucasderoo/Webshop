<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Validation\Rule;

use App\Address;
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
			// error message
			return "current password not correct";
		}

    	$request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->password = bcrypt($request['password']);

        $user->save();

    	return redirect()->route('account');
    }

    public function update(request $request){
    	$user = Auth::user();
    	$request->validate([
            'email' => 'required|string|email|max:255',
            'firstname' => 'required|string|max:50',
            'insertion' => 'string|max:20',
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

        return redirect()->route('account');
    }

    public function orders(){
    	$user = Auth::user();

    	return view('account.orders')->with(compact('user'));
    }

    public function adresses(){
    	$user = Auth::user();

    	return view('account.addresses')->with(compact('user'));
    }

    public function addresses_create(){

    	return view('account.address-create');
    }

    public function addresses_store(request $request){
    	$user = Auth::user();
    	$request->validate([
            'street' => 'required|string|max:30',
            'house_number' => 'required|integer',
            'suffix' => 'string|nullable',
            'zipcode' => 'required|string|max:20',
            'city' => 'required|string|max:50',
        ]);

        $address = Address::create([
            'street' => $request['street'],
            'house_number' => $request['house_number'],
            'suffix' => $request['suffix'],
            'zipcode' => $request['zipcode'],
            'city' => $request['city'],
        ]);
        $address->save();

        $user->addresses()->save($address);

        return redirect()->route('account/addresses');
    	
    }
}
