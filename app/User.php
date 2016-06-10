<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table="users";
    protected $primaryKey="user_id";
    protected $guarded=['user_type'];



    public function session(){
        return $this->hasMany("App\Session","user_id","user_id");
    }

    public function cart(){
        return $this->hasMany("App\Cart");
    }

    public function cakeRequest(){
        return $this->hasMany("App\CakeRequest","user_id","user_id");
    }


}
