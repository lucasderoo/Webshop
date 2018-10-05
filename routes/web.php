<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* HOME ROUTE */
Route::get('/home', 'ShopController@index');
Route::get('/', 'ShopController@index');
Route::get('/p/{slug}', 'ShopController@show');
Route::get('/product','ShopController@test');