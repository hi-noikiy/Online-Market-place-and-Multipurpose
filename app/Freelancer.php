<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    public function country(){
        return $this->belongsTo('App\Country','country_code');
    }
}