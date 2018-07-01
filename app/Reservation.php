<?php

namespace App;

use App\Model\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function cars()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function PickupLocation()
    {
        return $this->belongsTo(Branch::class, 'pickupLocation', 'id');
    }
    public function ReturnLocation()
    {
        return $this->belongsTo(Branch::class, 'returnLocation', 'id');
    }
}
