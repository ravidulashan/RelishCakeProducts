<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_item',function(Blueprint $table){
            $table->increments('order_id');
            $table->integer('qty');
            $table->text('wording')->nullable();
            $table->double('price');
            $table->integer('cake_desc_id')->unsigned();
            $table->integer('cart_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('cart_item',function($table){
            $table->foreign('cake_desc_id')->references('cake_desc_id')->on('cake_desc');
            $table->foreign('cart_id')->references('cart_id')->on('cart');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_item');
    }
}
