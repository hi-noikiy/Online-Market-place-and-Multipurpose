<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    public function job_category(){
        return $this->belongsTo('App\JobCategory', 'category_id');
    }
}
