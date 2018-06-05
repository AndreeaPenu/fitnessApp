<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id',
    ];

    public function workouts(){
        return $this->belongsToMany('App\Workout');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
