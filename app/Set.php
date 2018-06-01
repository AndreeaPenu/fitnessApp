<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Set extends Model
{
    //
    use SoftDeletes;
    protected $table = 'sets';
    protected $fillable = [
        'reps', 'weight',
    ];
    protected $dates = ['deleted_at'];

    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }

}
