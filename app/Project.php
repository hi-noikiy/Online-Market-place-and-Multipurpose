<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;

    public function scopegetJobs($query)
    {
        return $query->select('projects.*')
            ->addSelect('loc.name as location', 'country.name as country', 'users.name as user_name', 'cat.name as category')
            ->join('categories as cat', 'projects.category_id', '=', 'cat.id')
            ->leftJoin('locations as loc', 'projects.location', '=', 'loc.id')
            ->leftJoin('countries as country', 'projects.country', '=', 'country.id')
            ->join('users', 'projects.created_by', '=', 'users.id')
            ->where('projects.type', '=', 2);
    }

    public function scopejobDetails($query)
    {
        return $query->select('projects.*')
            ->addSelect('loc.name as location_name', 'country.name as country_name', 'users.name as user_name', 'cat.name as category_name')
            ->addSelect('info.country', 'info.rating', 'info.is_verified', 'info.country as company_country')
            ->join('categories as cat', 'projects.category_id', '=', 'cat.id')
            ->leftJoin('locations as loc', 'projects.location', '=', 'loc.id')
            ->leftJoin('countries as country', 'projects.country', '=', 'country.id')
            ->join('users', 'projects.created_by', '=', 'users.id')
            ->join('user_infos as info', 'users.id', '=', 'info.user_id');
    }

    public function scopegetMatchJobs($query, $data)
    {
        //Prepare json query
        $skill_ids = json_decode($data->skill_ids);
        $json_contains = 'JSON_CONTAINS(projects.skill_ids, "") ';
        if (!empty($skill_ids)) {
            foreach ($skill_ids as $val) {
                $json_contains .= 'OR JSON_CONTAINS(projects.skill_ids, "' . $val . '") ';
            }
        }

        if (!empty($skill_ids)) {
            return $query->select('projects.title', 'projects.budget', 'projects.job_type', 'projects.skill_ids')
                ->addSelect('location.name as location_name', 'country.name as country_name', 'user.name as company_name')
                ->join('locations as location', 'projects.location', '=', 'location.id')
                ->join('countries as country', 'projects.country', '=', 'country.id')
                ->join('users as user', 'projects.created_by', '=', 'user.id')
                ->whereRaw($json_contains)
                ->where('projects.type', '=', 2)
                ->where('projects.status', '=', 1)
                ->orderBy('projects.id', 'desc');
        }
    }
}
