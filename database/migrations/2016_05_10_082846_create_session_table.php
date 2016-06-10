<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session',function(Blueprint $table){
            $table->increments('session_id');
            $table->dateTime('in_time');
            $table->dateTime('out_time')->nullable();
            $table->string('ipaddress');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

        });

        Schema::table('session',function($table){
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
        //
    }
}
