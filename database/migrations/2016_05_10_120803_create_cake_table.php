<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCakeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cake',function(Blueprint $table){
            $table->increments('cake_id');
            $table->string('name');
            $table->text('cake_desc');
            $table->string('type');
            $table->text('img_url');
            $table->timestamps();
        });

        Schema::table('cake',function($table){
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
        Schema::dropIfExists('cake');
    }
}
