<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password');
            $table->string('email');
            $table->smallInteger('user_active')->default('0');
            $table->smallInteger('user_account_type');
            $table->string('user_remember_me_token')->nullable()->change();
            $table->dateTime('user_last_login_timestamp')->nullable()->change();
            $table->smallInteger('user_failed_logins')->default('0');
            $table->dateTime('user_last_failed_login')->nullable()->change();
            $table->string('user_forgot_password_token')->nullable()->change();
            $table->dateTime('user_password_reset_timestamp')->nullable()->change();
            $table->smallInteger('user_activated')->default('0');
            $table->integer('member_id');
            $table->foreign('member_id')->references('id')->on('members');
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
        Schema::dropIfExists('users');
    }
}