<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Carrier;
use App\Genre;
use App\MusicProduct;
use App\Image;
use App\Stock;
use App\resources\views;
use App\Post_views;

use ConsoleTVs\Charts\Facades\Charts;

use Session;



use DB;
use Validator;

class StatisticsController extends Controller{


  public function index(){
//databaseValues
    $users = DB::table('users')->count();
    $customers = DB::table('users')->where('user_account_type', '=', 1)->count();
    $admins = DB::table('users')->where('user_account_type', '=', 3)->count();
    $managers = DB::table('users')->where('user_account_type', '=', 5)->count();
    $products = DB::table('products')->count();
    //the product prices alphabetized in an array
    $productsPrice = DB::table('products')
    ->orderBy('price', 'desc')
    ->pluck('price')
    ->take(5)
    ->toArray();

    $mostexpensive = DB::table('products')
    ->orderBy('price', 'desc')
    ->pluck('title')
    ->take(5)
    ->toArray();
    //all the products
    $productsArray = DB::table('products')
    ->orderBy('title')
    ->pluck('title')
    ->toArray();

    //the 5 products that take up the most capacity
    $productsArrayo = DB::table('products')->orderBy('title')->pluck('title')->toArray();
    $stock = DB::table('stocks')->sum('amount');

    $productsArrayo = DB::table('products')
    ->join('stocks', 'products.id', '=', 'stocks.product_id')
    ->orderBy('stocks.amount', 'desc')
    ->pluck('title')
    ->take(5)
    ->toArray();
    $productsStocks = DB::table('products')
		->join('stocks', 'products.id', '=', 'stocks.product_id')
		->orderBy('stocks.amount', 'desc')
    ->take(5)
		->pluck('stocks.amount')->toArray();
//    $test = array()

  /*   for($i = 0;$i < count($productsStocks);$i++){
      $productsStocks[$i] = '€ ' + $productsStocks[$i];
    } */


/*
$seats = "";
$num_cols = 2;
$num_rows = ''; // assume you don't validate the request, so this can receive empty string too
// $num_rows = 0; // will output the same as above
for($i = 1;$i<=($num_cols * $num_rows);$i++)
{
$seats = $seats."b";
}
var_dump($seats);
*/


    /*$productz = Product::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
      */  $chart = Charts::create('bar', 'highcharts')
			      ->title("Product Details")
			      ->elementLabel("Total Products")
            ->labels($productsArrayo)

            ->values($productsStocks)
			      ->dimensions(1000, 500)
			      ->responsive(true);
			      //->groupByMonth(date('Y'), true);


	/*	$pie_chart = Charts::create('pie', 'highcharts')
				->title('Pie Chart Demo')
				->labels(['All The Users', 'Customers', 'Admins','Managers'])
				->values([$users,$customers,$admins,$managers])
				->dimensions(1000,500)
				->responsive(true);*/

        $pie_chart = Charts::create('pie', 'highcharts')
            ->title('Pie Chart Demo')
            ->elementLabel("Total Products")
            ->labels($productsArrayo)
            ->values($productsStocks)
            ->dimensions(1000,500)
            ->responsive(true);



		$line_chart = Charts::create('line', 'highcharts')
			    ->title('The Stock')
			    ->elementLabel('left in stock')

          ->labels($productsArrayo)

			    ->values($productsStocks)
			    ->dimensions(1000,500)
			    ->responsive(true);

		$areaspline_chart = Charts::multi('areaspline', 'highcharts')
				    ->title('Areaspline Chart Demo')
				    ->colors(['#ff0000', '#ff5656'])
				    ->labels(['Jan', 'Feb', 'Mar', 'Apl', 'May','Jun'])
				    ->dataset('Product 1', [10, 15, 20, 25, 30, 35])
				    ->dataset('Product 2',  [14, 19, 26, 32, 40, 50]);


		$area_chart = Charts::create('area', 'highcharts')
			    ->title('Prices')

			    ->labels($mostexpensive)
			    ->values($productsPrice)
			    ->dimensions(1000,500)
			    ->responsive(true);

		$donut_chart = Charts::create('donut', 'highcharts')
			    ->title('Total Products')
          ->elementLabel('€')
          ->labels($mostexpensive)
			    ->values($productsPrice)
			    ->dimensions(1000,500)
			    ->responsive(true);


    /*
    $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
    */
    //$price = DB::table('orders')->max('price');
    return view('shop.statistics', compact('users','customers','admins','managers','products','stock',
    'pie_chart', 'line_chart', 'areaspline_chart', 'percentage_chart',
     'geo_chart', 'area_chart', 'donut_chart',
   'productsPrice','productsArray','productsStocks', 'chart'));
  }


}
