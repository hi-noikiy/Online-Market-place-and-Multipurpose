<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function CvProjects(){
        return  $this->hasMany('App\CvProject','cv_id');
    }
}
