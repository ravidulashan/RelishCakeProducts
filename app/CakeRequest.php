<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakeRequest extends Model
{
    protected $table="cake_request";
    protected $primaryKey="cake_request_id";

    public function user(){
        return $this->belongsToMany("App\User","user_id","user_id");
    }

    public function requestQuantity(){
        return $this->belongsToMany("App\RequestQuantity","request_quantity_id","request_quantity_id");
    }
}
