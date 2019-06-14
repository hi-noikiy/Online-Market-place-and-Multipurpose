<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function freelanceprojectproposal()
    {
        return $this->hasMany('App\FreelanceProjectProposal');
    }
    public function proprojectproposal()
    {
        return $this->hasMany('App\ProProjectProposal');
    }
}
