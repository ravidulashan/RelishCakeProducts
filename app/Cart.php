<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table="cart";
    protected $primaryKey="cart_id";
    protected $guarded=['*'];

    public function cartItem(){
        return $this->hasMany("App\CartItem","cart_id","cart_id");
    }

    public function user(){
        return $this->belongsTo("App\User","user_id","id");
    }
}
