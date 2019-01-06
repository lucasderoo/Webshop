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
use App\Order;


use ConsoleTVs\Charts\Facades\Charts;


use Carbon\Carbon;

use Session;
use Countable;


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

  //  $productsArrayo = DB::table('products')->orderBy('title')->pluck('title')->toArray();
    $stock = DB::table('stocks')->sum('amount');

    $productsArrayo = DB::table('products')
    ->join('stocks', 'products.id', '=', 'stocks.product_id')
    ->orderBy('stocks.amount', 'desc')
    ->pluck('title')
  //  ->take(5)
    ->toArray();
    $productsStocks = DB::table('products')
		->join('stocks', 'products.id', '=', 'stocks.product_id')
		->orderBy('stocks.amount', 'desc')
  //  ->take(5)
		->pluck('stocks.amount')->toArray();

    $Genre = DB::table('products')
    ->join('categories', 'products.category_id', '=' ,'categories.id')
    ->select(DB::raw('products.category_id, count(products.category_id) as amount'))
    ->groupBy('products.category_id')
    ->orderBy('amount', 'desc')
//    ->take(5)
    ->pluck('amount')->toArray();

    $GenreName = DB::table('products')
    ->join('categories', 'products.category_id', '=' ,'categories.id')
    ->select(DB::raw('products.category_id, count(products.category_id) as amount ,categories.name'))
    ->groupBy('products.category_id', 'categories.name')
    ->orderBy('amount', 'desc')
//    ->take(5)
    ->pluck('categories.name')->toArray();


    //mostSold
    $Sold = DB::table('order_products')
    ->join('products', 'order_products.product_id', '=' ,'products.id')
    //DB::raw('SUM(price) as total_sales'))
    ->select('order_products.product_id', DB::raw('SUM(order_products.quantity) as total'))
    ->groupBy('order_products.product_id')
    ->orderBy('total', 'desc')
    ->take(5)
    ->pluck('total')->toArray();

    $SoldName = DB::table('order_products')
    ->join('products', 'order_products.product_id', '=' ,'products.id')
    ->select('order_products.product_id' ,'products.title',DB::raw('SUM(order_products.quantity) as total'))
    ->groupBy('order_products.product_id', 'products.title')
    ->orderBy('total', 'desc')
    ->take(5)
    ->pluck('products.title')->toArray();


//


  //  ->Count('products.category_id');

    $GenName = DB::table('products')
    ->select('name')
    ->orderBy('category_id');

    $GenId = DB::table('products')
    ->select('category_id')
    ->orderBy('category_id');



    $EarningsPerMonthAndYear = DB::table('orders')
    ->select(DB::raw('SUM(amount) as total_expense'), DB::raw("CONCAT_WS('-',MONTH(created_at),YEAR(created_at)) as monthyear"))
    ->groupBy(DB::raw('YEAR(created_at) ASC, MONTH(created_at) ASC, monthyear'))
    ->where( 'created_at', '>=', DB::raw( 'LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 YEAR',
      'AND', 'created_at',  '<', ' LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY'))
  //  ->orderByRaw('')
    ->pluck('monthyear')
   ->toArray();

    $EarningsResult= DB::table('orders')
    ->select(DB::raw('SUM(amount) as total_expense, MONTH(created_at) as month, YEAR(created_at) as year'))
    ->groupBy(DB::raw('YEAR(created_at) ASC, MONTH(created_at) ASC'))
    ->where( 'created_at', '>=', DB::raw( 'LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 YEAR',
      'AND', 'created_at',  '<', ' LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY'))
    ->pluck('total_expense','month')
    ->toArray();


    $EarningsPerDay = DB::table('orders')
    ->select(DB::raw('SUM(amount) as total_expense'), DB::raw("CONCAT_WS('-',DAY(created_at),MONTH(created_at),YEAR(created_at)) as daymonthyear"))
    ->groupBy(DB::raw('YEAR(created_at) ASC, MONTH(created_at) ASC,DAY(created_at) ASC, daymonthyear'))
    ->where( 'created_at', '>=', DB::raw( 'LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH',
      'AND', 'created_at',  '<', ' LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY'))
      ->pluck('daymonthyear')
    ->toArray();



    $EarningsPerDayResult = DB::table('orders')
    ->select(DB::raw('SUM(amount) as total_expense, MONTH(created_at) as month, YEAR(created_at) as year,DAY(created_at) as day'))
    ->groupBy(DB::raw('YEAR(created_at) ASC, MONTH(created_at) ASC,DAY(created_at) ASC'))
    ->where( 'created_at', '>=', DB::raw( 'LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH',
      'AND', 'created_at',  '<', ' LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY'))
    ->pluck('total_expense', 'day')
    ->toArray();




    $Lessthan50Name = DB::table('stocks')
    ->join('products', 'stocks.product_id', '=' ,'products.id')
    ->select('stocks.amount' ,'products.title')
    ->where('stocks.amount' , '<=', '50')
    ->groupBy('stocks.amount', 'products.title')
    ->orderBy('products.title', 'asc')
    ->pluck('products.title')->toArray();

    $Lessthan50 = DB::table('stocks')
    ->join('products', 'stocks.product_id', '=' ,'products.id')
    ->select('stocks.amount' ,'products.title')
    ->where('stocks.amount' , '<=', '50')
    ->groupBy('stocks.amount', 'products.title')
    ->orderBy('products.title', 'asc')
    ->pluck('stocks.amount')->toArray();


    $CategoryPerMonthDate =DB::table('products')
    ->join('categories', 'products.category_id', '=' ,'categories.id')
    ->join('order_products', 'products.id', '=', 'order_products.product_id')
    ->select(DB::raw('SUM(order_products.quantity) as total'), 'categories.name')
    ->groupBy('categories.name')
    ->pluck('total')
   ->toArray();

    $CategoryPerMonthName= DB::table('products')
    ->join('categories', 'products.category_id', '=' ,'categories.id')
    ->join('order_products', 'products.id', '=', 'order_products.product_id')
    ->select(DB::raw('SUM(order_products.quantity) as total'), 'categories.name')
    ->groupBy('categories.name')
    ->pluck('categories.name')
    ->toArray();
//    Payement::groupBy(DB::raw('MONTH(created_at)'))->get();
    /*
Setup to get the charts.
1. in your cmd composer require Consoletvs/charts:5.0
2. Check if this is in your config/app.php
 'providers' => [
    	....
    	....
        ConsoleTVs\Charts\ChartsServiceProvider::class,
],

'aliases' => [
    	....
    	....
        'Charts' => ConsoleTVs\Charts\Facades\Charts::class,
],

3. if it still doesn't work then enter in your cmd php artisan vendor:publish
and publish the provider ConsoleTVs\Charts\ChartsServiceProvider and also publish the charts_config




    /* $users = DB::table('users')
                     ->select(DB::raw('count(*) as user_count, status'))
                     ->where('status', '<>', 1)
                     ->groupBy('status')
                     ->get();*/

  //  $GenreToArray = pluck($Genre)->toArray();


  //  ->count('products.category_id');
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

        $chart = Charts::create('bar', 'highcharts')
			      ->title("Product Details")
			      ->elementLabel("Total Products")
            ->labels($productsArrayo)

            ->values($productsStocks)
			      ->dimensions(1000, 500)
			      ->responsive(true);
			      //->groupByMonth(date('Y'), true);*/


	/*	$pie_chart = Charts::create('pie', 'highcharts')
				->title('Pie Chart Demo')
				->labels(['All The Users', 'Customers', 'Admins','Managers'])
				->values([$users,$customers,$admins,$managers])
				->dimensions(1000,500)
				->responsive(true);*/


//the stock categorized by category in a pie chart
        $pie_chart = Charts::create('pie', 'highcharts')
            ->title('The stock')
            ->labels($GenreName)
            ->values($Genre)
            ->dimensions(600,500)
            ->responsive(false);


//the top 5 sold products
      /*  $pie_chart2 = Charts::create('pie', 'highcharts')
            ->title('The top 5 sold products')
            ->labels( $SoldName)
            ->values($Sold)
            ->dimensions(600,500)
            ->responsive(false);*/


            $pie_chart2 = Charts::create('pie', 'highcharts')
                ->title('The sold products categorized by category')
                ->labels($CategoryPerMonthName)
                ->values($CategoryPerMonthDate)
                ->dimensions(600,500)
                ->responsive(false);
            //




//Orders  in the last 7 days
		$line_chart = Charts::database(order::all(),'bar', 'highcharts')
			    ->title('Orders in the last 30 days')
			    ->elementLabel('Orders')

      //    ->labels($productsArrayo)

			  //  ->values($productsStocks)
			    ->dimensions(1000,500)
			    ->responsive(true)
          ->lastByDay(30);

          //$Ads=$Ads->where('created_at','>',Carbon::now()->subDays(30));
//$activeAdsIds=$Ads->pluck('id');


//groupBy(required string $column, optional string $relationColumn, optional array $labelsMapping)

//Omzet per maand in de huidige jaar
    $line_chart2 = Charts::create('line', 'highcharts')
          ->title('Overall turnover per month')
          ->elementLabel('Overall turnover € ')
          ->labels($EarningsPerMonthAndYear)
          ->colors(['#FF6633', '#FF2699', '#FF33FF', '#FFFF99', '#00B3E6',
		  '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
		  '#80B300', '#809900'])
          ->values($EarningsResult)

      //    ->labels($productsArrayo)

        //  ->values($productsStocks)
          ->dimensions(1000,500)
          ->responsive(true);

//omzet per dag in de huidige maand
          $line_chart3 = Charts::create('line', 'highcharts')
                ->title('Turnover per day')
                ->elementLabel('Overall turnover € ')
                ->labels($EarningsPerDay)
                ->colors(['#809900'])
                ->values($EarningsPerDayResult)

            //    ->labels($productsArrayo)

              //  ->values($productsStocks)
                ->dimensions(1000,500)
                ->responsive(true);

/*	$areaspline_chart = Charts::multi('areaspline', 'highcharts')
				    ->title('Areaspline Chart Demo')
				    ->colors(['#ff0000', '#ff5656'])
				    ->labels(['Jan', 'Feb', 'Mar', 'Apl', 'May','Jun'])
				    ->dataset('Product 1', [10, 15, 20, 25, 30, 35])
				    ->dataset('Product 2',  [14, 19, 26, 32, 40, 50]);
*/

	/*	$area_chart = Charts::create('area', 'highcharts')
			    ->title('Prices')

			    ->labels($mostexpensive)
			    ->values($productsPrice)
			    ->dimensions(1000,500)
			    ->responsive(true);*/

	/*	$donut_chart = Charts::create('donut', 'highcharts')
			    ->title('Total Products')
          ->elementLabel('€')
          ->labels($GenreName)
			    ->values($Genre)
			    ->dimensions(1000,500)
			    ->responsive(true);*/


    /*
    $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
    */
    //$price = DB::table('orders')->max('price');
    return view('shop.statistics', compact('users','customers','admins','managers','products','stock',
    'pie_chart', 'line_chart', 'percentage_chart',
     'geo_chart', 'donut_chart',
     'line_chart2',    'line_chart3',
     'Lessthan50','Lessthan50Name',
   'productsPrice','productsArray','productsStocks', 'chart',
    'pie_chart2'));
  }


}
