
<style>
.freelance-box {
    text-align: center;
    padding: 3px 1px 1px;
}
.freelance-inner-box {
    padding: 0px 0px 0px;
    text-align: center;
}
.freelance-box-thumb {
    margin-bottom: 10px;
    width: 100px;
    height: 100px;
    margin: 0 auto 25px auto;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 0px 14px 0 rgba(0, 0, 0, 0.08);
    -webkit-box-shadow: 0 0px 14px 0 rgba(0, 0, 0, 0.08);
    -moz-box-shadow: 0 0px 14px 0 rgba(0, 0, 0, 0.08);
}
</style>	
@php
    $user=Auth::guard('admin')->user();
    $customer=App\Customer::where('user_id',$user->id)->first();
    $job=App\Job::where('customer',$customer->id)->where('jobpro',0)->get();
@endphp	

@if($job)
<section class="accordion">
    <div class="container">
       @foreach($job as $job)
        <div class="row">
        @php
            $proposal=App\FreelancerProjectProposal::where('project_id',$job->id)->get();
            $proposal_cont=App\FreelancerProjectProposal::where('project_id',$job->id)->count();
            $avr=0;
            $n=0;
            if($proposal){
                foreach($proposal as $proposal){
                     $a=$proposal->price;
                    $avr=$avr+$a;
                    $n++;
                }
               if($avr!=0){
                     $avr=$avr/$n;
                }else{
                    $avr=0;
                }
            }
        @endphp    
            
            
            <!-- Single Freelancer -->
            <div class="col-md-4 col-sm-6">
                <div class="freelance-container">
                    <div class="freelance-box">
                        <span class="freelance-status bg-warning">Total:{{ $proposal_cont}}</span>
                        <h4 class="flc-rate">${{$avr}}/hr</h4>
                        <div class="freelance-inner-box">
                            <div class="freelance-box-thumb">
                                <img src="http://via.placeholder.com/180x180" class="img-responsive img-circle" alt="" />
                            </div>
                            <div class="freelance-box-detail">
                                <h4>{{$job->title}}</h4>
                                <span class="desination"></span>
                            </div>
                        </div>
                        <div class="freelance-box-extra">
                            <ul>
                                @php
                                    $skill=App\SkillDetails::where('item_type',0)->where('item_id',$job->id)->get();
                                @endphp
                                <span class="brows-job-sallery">
                                    @if($skill)
                                        @foreach($skill as $skill)
                                            @php
                                                $s=App\Skill::find($skill->skill_id);
                                            @endphp
                                            @if($s)
                                            <span class="w3-tag w3-small" id="spans" style="background-color: #7ed85b; border-radius: 20px;">{{$s->name}}</span>
                                            @endif
                                        @endforeach
                                    @endif
                                </span>
                            </ul>
                            <p>{{$job->description}}</p>
                        </div>
                    </div>
                     <a href="{{ url('request_on_job/'.urlencode(base64_encode($job->id)))}}" class="btn btn-freelance bt-1">See Request on this project</a>
                </div>
            </div>
            
            <!-- Single Freelancer -->
          
            
        </div>
        @endforeach
            
    </div>
</section>
@endif
		
