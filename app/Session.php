<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{

    protected $table = 'session';
    protected $primaryKey = 'session_id';

    public function user()
    {
        return $this->belongsToMany('App\User', 'user_id', 'user_id');
    }
}
