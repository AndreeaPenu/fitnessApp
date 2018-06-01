<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workout extends Model
{

    use SoftDeletes;
    protected $table = 'workouts';
    protected $dates = ['deleted_at'];

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
