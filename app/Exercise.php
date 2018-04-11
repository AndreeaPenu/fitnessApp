<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name', 'sets', 'weight', 'reps',
    ];

    public function workouts(){
        return $this->belongsToMany('App\Workout');
    }
}
