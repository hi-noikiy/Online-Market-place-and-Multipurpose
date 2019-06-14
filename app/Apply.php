<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Apply extends Model
{
    public $timestamps = false;

    public function scopegetActiveJobs($query)
    {
        return $query->select('applies.status as applied_status', 'pro.title', 'pro.budget', 'pro.job_type')
            ->addSelect('location.name as location_name', 'country.name as country_name', 'user.name as company_name')
            ->join('projects as pro', 'applies.project_id', '=', 'pro.id')
            ->join('locations as location', 'pro.location', '=', 'location.id')
            ->join('countries as country', 'pro.country', '=', 'country.id')
            ->join('users as user', 'pro.created_by', '=', 'user.id')
            ->where('applies.status', '=', 2)
            ->where('applies.user_id', '=', Auth::guard('admin')->id())
            ->orderBy('applies.id', 'desc');
    }

    public function scopegetPendingJobs($query)
    {
        return $query->select('applies.status as applied_status', 'pro.title', 'pro.budget', 'pro.job_type')
            ->addSelect('location.name as location_name', 'country.name as country_name', 'user.name as company_name')
            ->join('projects as pro', 'applies.project_id', '=', 'pro.id')
            ->join('locations as location', 'pro.location', '=', 'location.id')
            ->join('countries as country', 'pro.country', '=', 'country.id')
            ->join('users as user', 'pro.created_by', '=', 'user.id')
            ->where('applies.status', '=', 1)
            ->where('applies.user_id', '=', Auth::id())
            ->orderBy('applies.id', 'desc');
    }

    public function scopegetCompleteJobs($query)
    {
        return $query->select('applies.status as applied_status', 'pro.title', 'pro.budget', 'pro.job_type')
            ->addSelect('location.name as location_name', 'country.name as country_name', 'user.name as company_name')
            ->join('projects as pro', 'applies.project_id', '=', 'pro.id')
            ->join('locations as location', 'pro.location', '=', 'location.id')
            ->join('countries as country', 'pro.country', '=', 'country.id')
            ->join('users as user', 'pro.created_by', '=', 'user.id')
            ->where('applies.status', '=', 3)
            ->where('applies.user_id', '=', Auth::id())
            ->orderBy('applies.id', 'desc');
    }

    public function scopegetCancelJobs($query)
    {
        return $query->select('applies.status as applied_status', 'pro.title', 'pro.budget', 'pro.job_type')
            ->addSelect('location.name as location_name', 'country.name as country_name', 'user.name as company_name')
            ->join('projects as pro', 'applies.project_id', '=', 'pro.id')
            ->join('locations as location', 'pro.location', '=', 'location.id')
            ->join('countries as country', 'pro.country', '=', 'country.id')
            ->join('users as user', 'pro.created_by', '=', 'user.id')
            ->where('applies.status', '=', 4)
            ->where('applies.user_id', '=', Auth::id())
            ->orderBy('applies.id', 'desc');
    }

    public function scopegetRevisionJobs($query)
    {
        return $query->select('applies.status as applied_status', 'pro.title', 'pro.budget', 'pro.job_type')
            ->addSelect('location.name as location_name', 'country.name as country_name', 'user.name as company_name')
            ->join('projects as pro', 'applies.project_id', '=', 'pro.id')
            ->join('locations as location', 'pro.location', '=', 'location.id')
            ->join('countries as country', 'pro.country', '=', 'country.id')
            ->join('users as user', 'pro.created_by', '=', 'user.id')
            ->where('applies.status', '=', 5)
            ->where('applies.user_id', '=', Auth::id())
            ->orderBy('applies.id', 'desc');
    }

    public function scopegetDisputeJobs($query)
    {
        return $query->select('applies.status as applied_status', 'pro.title', 'pro.budget', 'pro.job_type')
            ->addSelect('location.name as location_name', 'country.name as country_name', 'user.name as company_name')
            ->join('projects as pro', 'applies.project_id', '=', 'pro.id')
            ->join('locations as location', 'pro.location', '=', 'location.id')
            ->join('countries as country', 'pro.country', '=', 'country.id')
            ->join('users as user', 'pro.created_by', '=', 'user.id')
            ->where('applies.status', '=', 6)
            ->where('applies.user_id', '=', Auth::id())
            ->orderBy('applies.id', 'desc');
    }

    public function scopegetAppliedJobs($query)
    {
        return $query->select('applies.status as applied_status', 'pro.title', 'pro.budget', 'pro.job_type')
            ->addSelect('location.name as location_name', 'country.name as country_name', 'user.name as company_name')
            ->join('projects as pro', 'applies.project_id', '=', 'pro.id')
            ->join('locations as location', 'pro.location', '=', 'location.id')
            ->join('countries as country', 'pro.country', '=', 'country.id')
            ->join('users as user', 'pro.created_by', '=', 'user.id')
            ->where('applies.status', '=', 1)
            ->where('applies.user_id', '=', Auth::id())
            ->orderBy('applies.id', 'desc');
    }

    public function scopegetInvitationJobs($query)
    {
        return $query->select('applies.status as applied_status', 'pro.title', 'pro.budget', 'pro.job_type')
            ->addSelect('location.name as location_name', 'country.name as country_name', 'user.name as company_name')
            ->join('projects as pro', 'applies.project_id', '=', 'pro.id')
            ->join('locations as location', 'pro.location', '=', 'location.id')
            ->join('countries as country', 'pro.country', '=', 'country.id')
            ->join('users as user', 'pro.created_by', '=', 'user.id')
            ->where('applies.status', '=', 7)
            ->where('applies.user_id', '=', Auth::id())
            ->orderBy('applies.id', 'desc');
    }

    public function scopegetCompanyAppliedJobList($query)
    {
        return $query->select('pro.title','pro.budget','pro.end_date as project_end_date','pro.status','pro.job_type')
            ->addSelect('user.name as jobSeeker_name')
            ->join('projects as pro', 'applies.project_id', '=', 'pro.id')
            ->join('users as user', 'applies.user_id', '=', 'user.id')
            ->where('pro.type', '=', 2)
            ->where('pro.created_by', '=', Auth::id())
            ->orderBy('applies.id', 'desc');
    }

    public function scopegetCompanyInvitationJobs($query)
    {
        return $query->select('applies.status as applied_status', 'pro.title', 'pro.budget', 'pro.job_type')
            ->addSelect('location.name as location_name', 'country.name as country_name', 'user.name as company_name')
            ->addSelect('user_info.name as job_seeker_name')
            ->join('projects as pro', 'applies.project_id', '=', 'pro.id')
            ->join('locations as location', 'pro.location', '=', 'location.id')
            ->join('countries as country', 'pro.country', '=', 'country.id')
            ->join('users as user_info', 'applies.user_id', '=', 'user_info.id')
            ->join('users as user', 'pro.created_by', '=', 'user.id')
            ->where('applies.status', '=', 7)
            ->where('pro.created_by', '=', Auth::id())
            ->orderBy('applies.id', 'desc');
    }
}
