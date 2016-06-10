<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestquantityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_quantity',function(Blueprint $table){
            $table->increments('request_quantity_id');
            $table->string('quantity');
            $table->string('served_amount');
            $table->string('type');
            $table->timestamps();
        });

        Schema::table('request_quantity',function($table){
            $table->foreign('type')->references('type')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_quantity');
    }
}
