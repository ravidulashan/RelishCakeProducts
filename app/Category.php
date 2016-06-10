<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    protected $primaryKey="type";
    public $incrementing = false;

    public function cake(){
        return $this->hasMany("App\Cake","type","type");
    }
}
