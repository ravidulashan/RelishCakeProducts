<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CakeDesc extends Model
{

    protected $table="cake_desc";
    protected $primaryKey="cake_desc_id";

    public function cartItem(){
        return $this->hasMany("App\CartItem","cake_desc_id","cake_desc_id");
    }

    public function cake(){
        return $this->belongsTo("App\Cake","cake_id","cake_id");
    }
}
