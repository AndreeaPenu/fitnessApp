<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use SoftDeletes;
    protected $table = 'exercises';
    protected $fillable = [
        'name', 'sets', 'weight', 'reps',
    ];
    protected $dates = ['deleted_at'];

    public function workouts(){
        return $this->belongsToMany('App\Workout');
    }
}
