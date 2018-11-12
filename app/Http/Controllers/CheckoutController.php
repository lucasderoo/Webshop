<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
    public function addresses(){
        return view('shop/checkout/addresses');
    }
}
