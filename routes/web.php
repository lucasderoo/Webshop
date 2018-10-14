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
Route::get('/', 'ShopController@index');
Route::get('/home', 'ShopController@index');

Route::get('/product/{slug}', 'ShopController@show');
Route::get('/products/{category}', 'ShopController@products');

Route::group([
	'prefix' => '/admin/products',
	'middleware' => 'Manager'
], function(){
	Route::get('', 'ProductController@index')->name('Admin/products');;
	Route::get('/create', 'ProductController@create');
	Route::post('/create', 'ProductController@store');
	Route::get('/edit/{id}', 'ProductController@edit');
	Route::post('/edit/{id}', 'ProductController@update');
	Route::get('/delete/{id}', 'ProductController@delete');
	Route::post('/delete/{id}', 'ProductController@destroy');
	Route::get('/read/{id}', 'ProductController@read');
});

Route::group([
	'prefix' => '/admin/categories',
	'middleware' => 'Manager'
], function(){
	Route::get('', 'CategoryController@index');
	Route::get('/create', 'CategoryController@create');
	Route::post('/create', 'CategoryController@store');
	Route::get('/edit/{id}', 'CategoryController@edit');
	Route::post('/edit/{id}', 'CategoryController@update');
	Route::get('/delete/{id}', 'CategoryController@delete');
	Route::post('/delete/{id}', 'CategoryController@destroy');
	Route::get('/read/{id}', 'CategoryController@read');
});

Route::group([
	'prefix' => '/admin/users',
	'middleware' => 'Admin'
], function(){
	Route::get('', 'UserController@index');
	Route::get('/create', 'UserController@create');
	Route::post('/create', 'UserController@store');
	Route::get('/edit/{id}', 'UserController@edit');
	Route::post('/edit/{id}', 'UserController@update');
	Route::get('/delete/{id}', 'UserController@delete');
	Route::post('/delete/{id}', 'UserController@destroy');
	Route::get('/read/{id}', 'UserController@read');
});

Auth::routes();

Route::get('/unauthorized', 'HomeController@unauthorized');
Route::get('/productlist','ShopController@list');

