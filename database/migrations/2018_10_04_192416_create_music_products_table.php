<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('suffix');
            $table->string('barcode');
            $table->date('release_date');
            $table->string('description');
            $table->integer('artist_id');
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->integer('genre_id');
            $table->foreign('genre_id')->references('id')->on('genre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music_products');
    }
}
