<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProProjectProposal extends Model
{
    public function profreeorder()
    {
        return $this->hasOne('App\ProFreeOrder', 'proposal_id');
    }
    public function job()
    {
        return $this->belongsTo('App\Job', 'job_id');
    }
}
