<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function cars()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
