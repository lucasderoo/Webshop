<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Order;

class OrderController extends Controller
{
    public function index(){
    	$ordersQuery = Order::query();
    	$ordersQuery = $ordersQuery->orderby('created_at', 'DESC');
    	$orders = $ordersQuery->paginate(15);

    	return view('orders.index')->with(compact('orders'));
    }



    public function show($id){
    	$order = Order::find($id);

    	return view('orders.show')->with(compact('order'));
    }

    public function update($id , request $request){
    	$order = Order::find($id);

    	if($request['status'] != "paid" AND $request['status'] != "delivered" AND $request['status'] != "canceled"){
    		Session::flash('feedback_error', 'No valid status given');
    		return redirect()->back();
    	}

    	$order->status = $request['status'];
    	$order->save();

    	Session::flash('feedback_success', 'Status updated');
    	return redirect()->back();

    }




}
