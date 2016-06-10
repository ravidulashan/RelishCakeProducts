<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCakedescTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cake_desc',function(Blueprint $table){
            $table->increments('cake_desc_id');
            $table->string('quantity');
            $table->string('served_amount');
            $table->double('price');
            $table->integer('cake_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('cake_desc',function($table){
            $table->foreign('cake_id')->references('cake_id')->on('cake');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('cake_desc');
    }
}
