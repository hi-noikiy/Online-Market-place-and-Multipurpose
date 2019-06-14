<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProFreeOrder extends Model
{
   public function order_report(){
       return $this->hasMany('App\FreelancerOrderReport','order_id ');
   }
}
