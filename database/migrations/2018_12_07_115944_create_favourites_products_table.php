<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavouritesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourites_products', function (Blueprint $table) {
          $table->increments('id');
          $table->smallinteger('quantity')->default('1');
          $table->integer('product_id')->default('0');
          $table->foreign('product_id')->references('id')->on('products');
          $table->integer('favourites_id')->default('0');
          $table->foreign('favourites_id')->references('id')->on('favourites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favourites_products');
    }
}
