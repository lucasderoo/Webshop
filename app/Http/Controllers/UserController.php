<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Member;


class UserController extends Controller
{
    public function index(){

    	$users = User::All();

    	return view('users.index')->with(compact('users'));
    }

    public function create(){

    	return view('users.create');
    }

    public function store(request $request){
    	$request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'firstname' => 'required|string|max:50',
            'insertion' => 'string|max:20',
            'lastname' => 'required|string|max:50',
            'initials' => 'required|string|max:50',
            'phonenumber' => 'max:10',
            'user_account_type' => 'in:1,2,3|int',
        ]);

        $user = User::create([
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'user_account_type' => (int)$request['user_account_type'],
            'user_activated' => 1,
        ]);
        $user->save();

        $member = Member::create([
            'firstname' => $request['firstname'],
            'insertion' => $request['insertion'],
            'lastname' => $request['lastname'],
            'initials' => $request['initials'],
            'phonenumber' => $request['phonenumber'],
        ]);
        $member->save();

        $user->member()->save($member);

        return redirect()->route('admin/users');
    }

    public function edit($id){

    	$user = User::find($id);

    	return view('users.edit')->with(compact('user'));
    }

    public function update($id, request $request){
    	$request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'firstname' => 'required|string|max:50',
            'insertion' => 'string|max:20',
            'lastname' => 'required|string|max:50',
            'initials' => 'required|string|max:50',
            'phonenumber' => 'max:10',
            'user_account_type' => 'in:1,2,3|int',
            'user_activated' => 'in:1,2|int',
            Rule::unique('users')->ignore($id, 'id')
        ]);
    	$user = User::find($id);


    	$user->email = $request['email'];
    	$user->user_account_type = $request['user_account_type'];
    	$user->user_activated = $request['user_activated'];

    	$user->member->firstname = $request['firstname'];
    	$user->member->insertion = $request['insertion'];

    	$user->member->lastname = $request['lastname'];
    	$user->member->initials = $request['initials'];
    	$user->member->phonenumber = $request['phonenumber'];

    	$user->member->save();
        $user->save();

        return redirect()->route('admin/users');
    }

    public function edit_password($id){

    	return view('users.edit-password');
    }

    public function update_password($id, request $request){

    	$user = User::find($id);

    	$request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->password = bcrypt($request['password']);

        $user->save();

    	return redirect()->route('admin/users/edit', $id);
    }

    public function delete($id){

    	$user = User::find($id);

    	return view('users.delete')->with(compact('user'));
    }


    public function destroy($id){
    	$user = User::find($id);
    	$user->member->delete();
    	$user->delete();

    	return redirect()->route('admin/users');
    }


    public function read($id){
    	$user = User::find($id);

    	return view('users.read')->with(compact('user'));

    }
}
