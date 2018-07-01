<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function car_model()
    {
        return $this->belongsTo(CarModel::class, 'model_id', 'id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function fuals()
    {
        return $this->belongsTo(Fual::class, 'fual_id', 'id');
    }
    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
    public function branches()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function capacities()
    {
        return $this->belongsTo(Capacity::class, 'capacity_id', 'id');
    }
    //start coding for car feature
    public function car_feature()
    {
        return $this->hasOne(Feature::class, 'car_id', 'id');
    }

    //start coding for car feature
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'id', 'car_id');
    }

}
