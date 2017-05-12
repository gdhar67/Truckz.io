<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_truck extends Model
{
   public function users()
    {
        return $this->belongsTo('App\User');
    }
}
