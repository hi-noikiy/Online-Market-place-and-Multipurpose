<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopegetFreelancer($query)
    {
        return $query->select('users.*', 'country.name as country_name', 'info.rating', 'info.note', 'info.is_available', 'info.skill_ids')
            ->join('user_infos as info', 'users.id', '=', 'info.user_id')
            ->join('countries as country', 'info.country', '=', 'country.id')
            ->where('users.user_type', '!=', 1)
            ->where('users.user_type', '=', 3)
            ->where('users.status', '=', 1);
    }

    public function scopegetPro($query)
    {
        return $query->select('users.*', 'country.name as country_name', 'info.rating', 'info.note', 'info.is_available', 'info.skill_ids')
            ->join('user_infos as info', 'users.id', '=', 'info.user_id')
            ->join('countries as country', 'info.country', '=', 'country.id')
            ->where('users.user_type', '!=', 1)
            ->where('users.user_type', '=', 4)
            ->where('users.status', '=', 1);
    }

    public function scopeUserDetails($query)
    {
        return $query->select('users.*', 'info.*', 'country.name as country_name')
            ->addSelect('loc.name as location_name')
            ->join('user_infos as info', 'users.id', '=', 'info.user_id')
            ->join('locations as loc', 'info.location', '=', 'loc.id')
            ->join('countries as country', 'info.country', '=', 'country.id')
            ->where('users.status', '=', 1);
    }
    public function cv(){
        return $this->hasOne('App\Cv','user_id');
    }
   
    public function education(){
        return $this->hasMany('App\Education','user_id');
    }
    public function experience(){
        return $this->hasMany('App\Experience','user_id');
    }
    public function interest(){
        return $this->hasMany('App\Interest','user_id');
    }
}
