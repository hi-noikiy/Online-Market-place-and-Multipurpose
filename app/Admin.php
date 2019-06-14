<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function super_admin(){
        return $this->hasOne('App\SuperAdmin', 'admin_id');
    }
    public function manager(){
        return $this->hasOne('App\Manager', 'admin_id');
    }
}
