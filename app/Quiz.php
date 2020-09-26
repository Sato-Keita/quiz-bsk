<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function categories(){
        return $this->hasMany('App\Category');
    }

    public function selects(){
        return $this->hasMany('App\Select');
    }
}
