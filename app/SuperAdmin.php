<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SuperAdmin extends Authenticatable
{
    public function admin()
    {
        return $this->belongsTo('App\Admin','admin_id');
    }
}



