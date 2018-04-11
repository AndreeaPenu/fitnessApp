<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = [
        'name', 
    ];

    public function plans() {
        return $this->belongsToMany('App\Plan');
    }

    public function exercises() {
        return $this->belongsToMany('App\Exercise');
    }
}
