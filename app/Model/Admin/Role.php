<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
  
  public function admins(){
       return $this->belongsToMany(Admin::class,'admin_roles','role_id','admin_id')->withTimestamps();
    }
}
