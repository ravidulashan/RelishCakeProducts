<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table="cart_item";
    protected $primaryKey="order_id";

    public function cakeDesc(){
        return $this->belongsTo("App\CakeDesc","cake_desc_id","cake_desc_id");
    }

    public function cart(){
        return $this->belongsTo("App\Cart","cart_id","cart_id");
    }

}
