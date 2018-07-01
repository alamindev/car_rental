<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserContact extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'user_contacts';
    protected $fillable = [
        'name', 'email', 'subject', 'message',
    ];
}
