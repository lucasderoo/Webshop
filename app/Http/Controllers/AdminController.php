<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;

class AdminController extends Controller
{
    public function index(){
    	return view('admin.index');
    }
}
