<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{

    protected $table='login';
    protected $primaryKey='login_id';
    protected $guarded=array('confirmed','confirmation_code');
    protected $hidden=array('password');

    public function user(){
        return $this->belongsTo('App\User','user_id','user_id');
    }

}
