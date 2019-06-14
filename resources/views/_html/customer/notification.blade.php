@extends('_html.layoutes.app')
@section('contennt')
<style>
.des{
    height: 100px;
    overflow: hidden;
}
.des:hover{
    height: 100%;
    overflow-y: scroll;
}
</style>
<div class="wrapper">  
			
		
			
			<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(http://via.placeholder.com/1920x850);">
    <div class="container">
        <h1>Respond</h1>
    </div>
</section>
<div class="clearfix"></div>
<section class="container">
@php
    $req=['Delivery','Extension Time','Cancel','Modify'];
                    
    if($notification){
        $hashid=base64_encode($order->id);
        if($order->freelancer_type==0){
        $proposal=App\FreelancerProjectProposal::find($order->proposal_id);
        $job=App\Job::find($proposal->project_id);
        $freelancer=App\Freelancer::find($order->freelancer_id);
        $user=App\User::find($freelancer->user_id);
        }elseif ($order->freelancer_type==1) {
        $proposal=App\ProProjectProposal::find($order->proposal_id);
        $job=App\Job::find($proposal->job_id);
        $freelancer=App\Pro::find($order->freelancer_id);
        $user=App\User::find($freelancer->user_id);
        }
    }
                   
@endphp
    <div class="card">
        <h4>Open in order No. {{$hashid}}</h4>
        <h6 class="card-title">{{$user->name}} have you sent you {{$req[$notification->type]}} Request</h6>
        <p>
            Proposal Sent= {{$proposal->created_at}}
        </p>
        <p>
            Duration: {{$proposal->delivery_time}}
        </p>
        <p>
            Price : {{$proposal->price}}
        </p>
        <p><a>Accept</a></p>
       
        <p><a>Denied</a></p>
    </div>

</section>

@endsection