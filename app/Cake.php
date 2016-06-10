<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{

    protected $table="cake";
    protected $primaryKey="cake_id";

    public function cakeDesc(){
        return $this->hasMany("App\CakeDesc","cake_id","cake_id");
    }

    public function category(){
        return $this->belongsToMany("App\Category","type","type");
    }
}
