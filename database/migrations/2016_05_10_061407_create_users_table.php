<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{



    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 100);
            $table->string('email', 80);
            $table->string('password');
            $table->integer('confirmed');
            $table->string('confirmation_code');
            $table->rememberToken()->nullable();
            $table->integer('gender');
            $table->date('birthday')->nullable();
            $table->string('tel_no', 10);
            $table->integer('user_type');
            $table->text('delivery_address')->nullable();
            $table->text('billing_address')->nullable();
            $table->date('reg_date');
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

        Schema::dropIfexists('session');
        Schema::dropIfExists('users');
    }
}
