<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
