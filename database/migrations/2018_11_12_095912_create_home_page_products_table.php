<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomePageProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->default('0');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('home_page_id')->default('0');
            $table->foreign('home_page_id')->references('id')->on('home_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_page_products');
    }
}
