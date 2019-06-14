@extends('_html.pro.master')
@section('dascontent')
 @php
    $user=Auth::guard('admin')->user();
    $pro=App\Pro::where('user_id',$user->id)->first();

   
    $proposal=App\ProProjectProposal::where('user_id',$user->id)->get();
    $project_won=App\ProProjectProposal::where('user_id',$user->id)->where('status',1)->count();
    $gig=App\Gig::where('freelancer_id',$pro->id)->get();
    $proposal_got=0;
    if($gig){
      foreach($gig as $gig){
        $c=App\ProProjectProposal::where('gig_id',$gig->id)->where('status',0)->count();
        $proposal_got=$proposal_got+$c;
      }
    }
     $review= \App\Helpers\GeneralHelper::get_total_review($user->id,4);

@endphp     
      <div class="w3-container" id="cop"><br><br>

        <div class="w3-row-padding w3-margin-bottom">
   
    <div class="w3-third">
      <div class="w3-container w3-teal w3-padding-16" style="border-radius: 5px;">
        <div class="w3-left"><i class="fas fa-gavel w3-xxxlarge"></i> <h4  class="w3-left">Task bids won</h4></div>
        <div class="w3-right">
          <h3>{{$project_won}}</h3>
        </div>
      </div>
    </div>
    <div class="w3-third">
      <div class="w3-container w3-teal w3-padding-16" style="border-radius: 5px;">
        <div class="w3-left"><i class="fas fa-suitcase w3-xxxlarge"></i><h4 style="padding:5px"  class="w3-left">Job applied</h4></div>
        <div class="w3-right">
          <h3>{{count($proposal)}}</h3>
        </div>
        <div class="w3-clear"></div>
        
      </div>
    </div>

     <div class="w3-third">
      <div class="w3-container w3-teal w3-padding-16" style="border-radius: 5px;">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i> <h4 style="padding:5px" class="w3-left">Reviews</h4></div>
        <div class="w3-right">
          <h3>{{count($review)}}</h3>
        </div>
        <div class="w3-clear"></div>
       
      </div>
    </div>
     <div class="w3-third">
        <div class="w3-container w3-teal w3-padding-16" style="border-radius: 5px;">
          <div class="w3-left"><i class="fab fa-product-hunt w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>{{$proposal_got}}</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Propsals Got</h4>
        </div>
      </div>


    
  </div>

  <div class="container">

  <div class="w3-row">
    <div class="w3-col m6">
  <div class="w3-panel w3-teal w3-display-container" style="border-radius: 5px;">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-red w3-large w3-display-topright">x</span>
  <h3><i class="fas fa-file-alt"></i> Active Jobs</h3>
  @php
      $active_task=App\ProProjectProposal::where('user_id',$user->id)->where('status',1)->get();
  @endphp
  <hr>
  @if($active_task)
   @foreach($active_task as $task)
     @php
         $job=App\Job::find($task->job_id);
          $pro_request_current=App\ProProjectProposal::where('job_id',$job->id)->where('status',1)->first();
        $get_delivery_time=null;
          if($pro_request_current){
              $get_delivery_time= \App\Helpers\GeneralHelper::get_delivery_time($pro_request_current->created_at,$pro_request_current->delivery_time);
           //  print_r($get_delivery_time);
             // break;

          }
      
     @endphp
   <div>
     @if($job)
     <a href="{{url('single_project_details/'.urlencode(base64_encode($task->id)))}}">
      <p style="color: white;font-weight:700">{{$job->title}}
       
         <span class="w3-right">Order Started: {{$task->updated_at}}</span></p>
        <p class="w3-right" style="color: white;font-weight:700">Price: $ {{$pro_request_current->price}}</p>
       
         @if(($get_delivery_time)!=null)
         {{-- <p style="color: white;font-weight:700">Ends is :{{$get_delivery_time}} --}}
         @endif
         </p>
      </a>
      @endif
   </div>
   @endforeach
  @endif
</div>
</div>


<div class="w3-col m3" style="margin-left: 3px;">
  <div class="w3-panel w3-teal w3-display-container" style="border-radius: 5px;">
 
  <h3><i class="fas fa-notes-medical"></i>Notes</h3>
   <div class="w3-card" style="background-color: #fff; border-radius: 5px;">
  
  @php
      $note=App\PersonalNote::where('user_id',$user->id)->get();
  @endphp
    <div class="w3-container">
      @if($note)
        @foreach($note as $note)
      <p style="color: black;">{{$note->note}}</p>
        @endforeach
      @endif  
    </div>

    {{-- <div class="w3-container">
      <p style="color: black;">project submission date is 29th april</p>
    </div>
    <div class="w3-container">
      <p style="color: black;">project submission date is 29th april</p>
    </div> --}}

  </div>
  <br>
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-block" style="border-radius: 5px; text-align: center; background-color: #104799;">Add Note</button>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content ">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
       <div class="w3-container">
  <h2 style="color: black">Add Notes</h2>
</div>

<form class="" action="{{url('add_personal_note')}}" method="POST">
  @csrf
  
  <label style="color: black;">Description</label>
  <input class="form-control" name="note" type="text"></p>
  <p>
    <p>
      <input type="submit" class="btn btn-success">
    </p>
  
</form>
      </div>
    </div>
  </div>
<br>

</div>
</div>


  </div>
</div>   
        
        </div>



        
      </div>
@endsection      