<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerProjectProposal extends Model
{
    public function profreeorder()
    {
        return $this->hasOne('App\ProFreeOrder', 'proposal_id');
    }
    public function job(){
        return $this->belongsTo('App\Job','project_id');
    }
}
