<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    public $timestamps = false;

    public function scopegetScholarShip($query)
    {
        return $query->select('scholarships.id','scholarships.title','scholarships.institution','scholarships.budget','scholarships.type')
        ->addSelect('location.name as location_name', 'country.name as country_name','user.name as creator')
            ->join('locations as location', 'scholarships.location_id', '=', 'location.id')
            ->join('countries as country', 'scholarships.country_id', '=', 'country.id')
            ->join('users as user', 'scholarships.created_by', '=', 'user.id')
            ->whereDate('end_date', '>=', date('Y-m-d'))
            ->orderBy('scholarships.id', 'desc');
    }
}
