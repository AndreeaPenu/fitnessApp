<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public function workouts(){
        return $this->belongsToMany('App\Workout');
    }
}
