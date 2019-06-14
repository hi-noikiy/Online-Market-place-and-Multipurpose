@extends('_html.customer.master')
@section('descontent')
@php
    $user=Auth::guard('admin')->user();
    $customer=App\Customer::where('user_id',$user->id)->first();

    $job=App\Job::where('customer',$customer->id)->where('jobpro',1)->count();
    $pro=App\Job::where('customer',$customer->id)->where('jobpro',0)->count();
       // $freelancer_proposals=App\FreelancerProjectProposal::where()

    $jobm=App\Job::where('customer',$customer->id)->where('jobpro',1)->get();
    $prom=App\Job::where('customer',$customer->id)->where('jobpro',0)->get();
       $job_request=0;
       foreach($jobm as $j){
          $job_request_current=App\ProProjectProposal::where('job_id',$j->id)->where('status',0)->count();
         // print_r($job_request_current);
          $job_request=$job_request+$job_request_current;
       }
       $pro_request=0;
       foreach($prom as $p){
         $pro_request_current=App\FreelancerProjectProposal::where('project_id',$p->id)->where('status',0)->count();
         $pro_request=$pro_request+$pro_request_current;
       }
      $review= \App\Helpers\GeneralHelper::get_total_review($user->id,3);
@endphp
 <div id="request_1" style="display:none">
  <h4 class="card-title">Total Projects</h4>
  @include('_html.customer.request_on_project')
</div>
<div id="request_2" style="display:none">
  <h4 class="card-title">Total Job</h4>
  @include('_html.customer.request_on_job')
</div>
    <div class="w3-container" id="cop"><br><br>


        <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-third">
      <div class="w3-container w3-teal w3-padding-16" style="border-radius: 5px;">
        <div class="w3-left"><i class="fas fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Message today</h4>
      </div>
    </div>
    <div class="w3-third">
      <div class="w3-container w3-teal w3-padding-16" style="border-radius: 5px;">
        <div class="w3-left"><i class="fas fa-gavel w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{$pro_request}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Project Request</h4>
      </div>
    </div>
    <div class="w3-third">
      <div class="w3-container w3-teal w3-padding-16" style="border-radius: 5px;">
        <div class="w3-left"><i class="fas fa-gavel w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{$job_request}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Job Request</h4>
      </div>
    </div>
    <div class="w3-third">
      <div class="w3-container w3-teal w3-padding-16" style="border-radius: 5px;">
        <div class="w3-left"><i class="fas fa-gavel w3-xxxlarge"></i></div>
        <div class="w3-right">
          @if($pro)
            <h3>{{$pro}}</h3>
          @else 
             <h3>No Project Yet</h3>
          @endif
        </div>
        <div class="w3-clear"></div>
        <h4>Project Posted</h4>
      </div>
    </div>
    <div class="w3-third">
      <div class="w3-container w3-teal w3-padding-16" style="border-radius: 5px;">
        <div class="w3-left"><i class="fas fa-suitcase w3-xxxlarge"></i></div>
        <div class="w3-right">
          @if($job)
            <h3>{{$job}}</h3>
          @else 
             <h3>No Job Yet</h3>
          @endif
        </div>
        <div class="w3-clear"></div>
        <h4>Job posted</h4>
      </div>
    </div>

     <div class="w3-third">
      <div class="w3-container w3-teal w3-padding-16" style="border-radius: 5px;">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{count($review)}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Reviews</h4>
      </div>
    </div>


    
  </div>

  <div class="container">

  <div class="w3-row">

    <div class="w3-col m8" >
  <div class="w3-panel w3-teal w3-display-container" style="border-radius: 5px;">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-red w3-large w3-display-topright">x</span>
  <h3><i class="fas fa-file-alt"></i> Active Project</h3>
  @php
      $myproject=App\Job::where('jobpro',0)->where('customer',$customer->id)->get();
     // $active_task=App\FreelancerProjectProposal::where('user_id',$user->id)->where('status',1)->get();
  @endphp
  <hr>
  @if($myproject)
   @foreach($myproject as $task)
     @php
         $active_task=App\FreelancerProjectProposal::where('project_id',$task->id)->where('status',1)->first();
     @endphp
   <div>
     @if($active_task)
      <p style="color: white;font-weight:700;">{{$task->title}}</p>
      <p style="color: white;font-weight:700"> <span class="w3-right">Request gained: {{$active_task->created_at}}</span></p> <br>
      <p style="color: white;font-weight:700"> <span class="w3-right">Order Accepted: {{$active_task->updated_at}}</span></p>
      <p style="color: white;font-weight:700"> <span>Price:$ {{$active_task->price}}</span></p>
      @endif
   </div>
   @endforeach
  @endif
</div>
</div>
    <div class="w3-col m8" >
  <div class="w3-panel w3-teal w3-display-container" style="border-radius: 5px;">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-red w3-large w3-display-topright">x</span>
  <h3><i class="fas fa-file-alt"></i> Active Jobs</h3>
  @php
      $myproject=App\Job::where('jobpro',1)->where('customer',$customer->id)->get();
     // $active_task=App\FreelancerProjectProposal::where('user_id',$user->id)->where('status',1)->get();
  @endphp
  <hr>
  @if($myproject)
   @foreach($myproject as $task)
     @php
         $active_task=App\ProProjectProposal::where('job_id',$task->id)->where('status',1)->first();
     @endphp
   <div>
     @if($active_task)
      <p style="color: white;">{{$task->title}} </p>
      <p> <span class="w3-right">Request gained: {{$active_task->created_at}}</span></p>
      <p> <span class="w3-right">Order Started: {{$active_task->updated_at}}</span></p>
      <p> <span class="w3-right">Price: {{$active_task->price}}</span></p>
      @endif
   </div>
   @endforeach
  @endif
</div>
</div>



  </div>
</div>   
        
        </div>

        <script>
         function show_request_on(data){
           var i=0;
           for(;i<data;i++){
             $('#cop').hide('1000');
             if(i=data){
               $('#request_'+i).show('500');
               console.log(i);
             }else{
                $('#request_'+i).hide('1000'); 
             }
             
           }
          
         }
         
        </script>
@endsection