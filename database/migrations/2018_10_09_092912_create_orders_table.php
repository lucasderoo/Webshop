<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->string('status');
            $table->string('payment_method');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('address_id');
            $table->foreign('address_id')->references('id')->on('addesses');
            $table->integer('billing_address_id');
            $table->foreign('billing_address_id')->references('id')->on('addesses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}