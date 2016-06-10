<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestQuantity extends Model
{

    protected $table='request_quantity';
    protected $primaryKey='request_quantity_id';

    public function cakeRequest(){
        return $this->hasMany('App\CakeRequest','cake_request_id','cake_request_id');
    }
}
