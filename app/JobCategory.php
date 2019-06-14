<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    public function gig(){
        return $this->hasOne('App\Gig', 'category_id');
    }
}
