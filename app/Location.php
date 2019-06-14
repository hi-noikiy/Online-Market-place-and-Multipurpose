<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;

    public function scopegetLocations($query,$country_id)
    {
        return $query->select('*')
            ->where('country_id', '=', $country_id)
            ->where('status', '=', 1);
    }
}
