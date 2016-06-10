<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCakerequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cake_request',function(Blueprint $table){
            $table->increments('request_id');
            $table->text('img_url')->nullable();
            $table->date('req_date');
            $table->date('request_date');
            $table->integer('state');
            $table->integer('user_id')->unsigned();
            $table->integer('request_quantity_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('cake_request',function($table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('request_quantity_id')->references('request_quantity_id')->on('request_quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cake_request');
    }
}
