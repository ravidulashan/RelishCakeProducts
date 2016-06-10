<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('cart_id');
            $table->date('req_date');
            $table->double('sub_total');
            $table->date('ord_date');
            $table->string('sms_state');
            $table->integer('user_id')->unsigned();
            $table->integer('status')->nullable();
            $table->timestamps();
        });

        Schema::table('cart', function ($table) {
            $table->foreign('user_id')->references('user_id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
