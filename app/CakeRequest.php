<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakeRequest extends Model
{
    protected $table="cake_request";
    protected $primaryKey="request_id";

    public function user(){
        return $this->belongsTo("App\User","user_id","id");
    }

    public function requestQuantity(){
        return $this->belongsTo("App\RequestQuantity","request_quantity_id","request_quantity_id");
    }
}
