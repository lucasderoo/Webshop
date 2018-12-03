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
Route::get('/home', 'ShopController@index')->name('home');
Route::get('/search', 'ShopController@search')->name('search');

Route::get('/product/{slug}', 'ShopController@show')->name('show');
Route::get('/products', 'ShopController@products')->name('products');
//Route::get('/products/{name}','ShopController@list');

Route::group([
	'prefix' => '/info',
	'middleware' => 'Customer'
],	function(){
	Route::get('/faq', 'ShopController@faq')->name('faq');
	Route::get('/privacy', 'ShopController@privacy')->name('privacy');
	Route::get('/customer_service', 'ShopController@service')->name('customer_service');
	Route::get('/about', 'ShopController@about')->name('about');
	Route::get('/job_offers', 'ShopController@jobs')->name('job_offers');
	Route::get('/latest_news', 'ShopController@news')->name('latest_news');
});

Route::get('/unauthorized', 'HomeController@unauthorized');

Route::group([
	'prefix' => '/cart',
], function(){
	Route::get('', 'CartController@index')->name('cart');
	Route::post('/add/{slug}', 'CartController@store')->name('cart/create');
	Route::post('/update/{id}', 'CartController@update')->name('cart/update');
	Route::post('/delete/{id}', 'CartController@destroy')->name('cart/delete');
	Route::post('/saveforlater/{slug}', 'CartController@save_for_later')->name('cart/saveForLater');
});

Route::group([
	'prefix' => '/checkout',
], function(){
	Route::get('', 'CheckoutController@checkout')->name('checkout');
	Route::post('', 'CheckoutController@checkout_store');
	Route::get('/confirm', 'CheckoutController@confirm')->name('checkout/confirm');;
	Route::post('/confirm', 'CheckoutController@confirm_store');
	route::get('/thank_you/{id}', 'CheckoutController@thank_you')->name('checkout/thank_you');
});

Route::group([
	'prefix' => '/account',
	'middleware' => 'Customer'
], function(){
	Route::get('', 'AccountController@index')->name('account');
	Route::post('', 'AccountController@update');
	Route::get('/password', 'AccountController@show_password')->name('account/password');
	Route::post('/password', 'AccountController@update_password');
	Route::get('/orders', 'AccountController@orders')->name('account/orders');
	Route::get('/order/{id}', 'AccountController@show_order')->name('account/order/show');
	Route::get('/addresses', 'AccountController@adresses')->name('account/addresses');
	Route::get('/addresses/create', 'AccountController@addresses_create')->name('account/addresses/create');
	Route::post('/addresses/create', 'AccountController@addresses_store');
	Route::get('/addresses/edit/{id}', 'AccountController@addresses_edit')->name('account/addresses/edit');
	Route::post('/addresses/edit/{id}', 'AccountController@addresses_update');
	Route::post('/addresses/delete/{id}', 'AccountController@addresses_destroy')->name('account/addresses/delete');
});

// manager & admin routes //
Route::get('/admin', 'AdminController@index')->middleware('Admin')->name('admin');
Route::group([
	'prefix' => '/admin/products',
	'middleware' => 'Manager'
], function(){
	Route::get('', 'ProductController@index')->name('admin/products');
	Route::get('/create', 'ProductController@create')->name('admin/products/create');
	Route::post('/create', 'ProductController@store');
	Route::get('/edit/{id}', 'ProductController@edit')->name('admin/products/edit');
	Route::post('/edit/{id}', 'ProductController@update');
	Route::get('/delete/{id}', 'ProductController@delete')->name('admin/products/delete');
	Route::post('/delete/{id}', 'ProductController@destroy');
	Route::get('/read/{id}', 'ProductController@read')->name('admin/products/read');
});

Route::group([
	'prefix' => '/admin/categories',
	'middleware' => 'Manager'
], function(){
	Route::get('', 'CategoryController@index')->name('admin/categories');
	Route::get('/create', 'CategoryController@create')->name('admin/categories/create');
	Route::post('/create', 'CategoryController@store');
	Route::get('/edit/{id}', 'CategoryController@edit')->name('admin/categories/edit');
	Route::post('/edit/{id}', 'CategoryController@update');
	Route::get('/delete/{id}', 'CategoryController@delete')->name('admin/categories/delete');
	Route::post('/delete/{id}', 'CategoryController@destroy');
	Route::get('/read/{id}', 'CategoryController@read')->name('admin/categories/read');
});

Route::group([
	'prefix' => '/admin/carriers',
	'middleware' => 'Manager'
], function(){
	Route::get('', 'CarrierController@index')->name('admin/carriers');
	Route::get('/create', 'CarrierController@create')->name('admin/carriers/create');
	Route::post('/create', 'CarrierController@store');
	Route::get('/edit/{id}', 'CarrierController@edit')->name('admin/carriers/edit');
	Route::post('/edit/{id}', 'CarrierController@update');
	Route::get('/delete/{id}', 'CarrierController@delete')->name('admin/carriers/delete');
	Route::post('/delete/{id}', 'CarrierController@destroy');
	Route::get('/read/{id}', 'CarrierController@read')->name('admin/carriers/read');
});

Route::group([
	'prefix' => '/admin/users',
	'middleware' => 'Admin'
], function(){
	Route::get('', 'UserController@index')->name('admin/users');
	Route::get('/create', 'UserController@create')->name('admin/users/create');
	Route::post('/create', 'UserController@store');
	Route::get('/edit/{id}', 'UserController@edit')->name('admin/users/edit');
	Route::post('/edit/{id}', 'UserController@update');
	Route::get('/edit/{id}/password', 'UserController@edit_password')->name('admin/users/edit/password');
	Route::post('/edit/{id}/password', 'UserController@update_password');
	Route::get('/delete/{id}', 'UserController@delete')->name('admin/users/delete');
	Route::post('/delete/{id}', 'UserController@destroy');
	Route::get('/read/{id}', 'UserController@read')->name('admin/users/read');
	Route::get('/statistics', 'StatisticsController@index')->name('Stats');
});

Route::group([
	'prefix' => '/admin/homepage',
	'middleware' => 'Admin'
], function(){
	Route::get('', 'HomePageController@index')->name('admin/homepage');
	Route::get('/create', 'HomePageController@create')->name('admin/homepage/create');
	Route::post('/create', 'HomePageController@store');
	Route::get('/edit/{id}', 'HomePageController@edit')->name('admin/homepage/edit');
	Route::post('/edit/{id}', 'HomePageController@update');
	Route::get('/delete/{id}', 'HomePageController@delete')->name('admin/homepage/delete');
	Route::post('/delete/{id}', 'HomePageController@destroy');
	Route::get('/read/{id}', 'HomePageController@read')->name('admin/homepage/read');
});

Route::group([
	'prefix' => '/admin/statistics',
	'middleware' => 'Admin'
], function(){
	Route::get('/statistics', 'StatisticsController@index')->name('admin/stats');
});


Auth::routes();
