<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function workouts(){
        return $this->belongsToMany('App\Workout');
    }
}
