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
        'title', 'description', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function exercises() {
        return $this->belongsToMany('App\Exercise');
    }
}
