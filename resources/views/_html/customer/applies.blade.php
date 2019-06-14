@extends('_html.layouts.app') 
@section('title','Applications')
@php
    $job=App\Job::find($id);
    if($job->jobpro==0){
        $proposals=App\FreelancerProjectProposal::where('project_id',$job->id)->where('status',0)->get();
    }elseif($job->jobpro==1){
         $proposals=App\ProProjectProposal::where('job_id',$job->id)->where('status',0)->get();
    }
@endphp
@section('content')
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
					<h1>Applications</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category">
				<div class="container">
					<!-- Company Searrch Filter Start -->

					<!-- Company Searrch Filter End -->
					@if($proposals)
					<div class="item-click">
                        @foreach($proposals as $proposal)
                        @php
                            $sender=App\User::find($proposal->user_id);
                            if($job->jobpro==0){
                                $freelancer=App\Freelancer::where('user_id',$sender->id)->first();
                                 $image=App\Image::where('type',9)->where('item_id',$sender->id)->first();
                            }elseif ($job->jobpro==1) {
                                $freelancer=App\Pro::where('user_id',$sender->id)->first();
                                 $image=App\Image::where('type',10)->where('item_id',$sender->id)->first();
                            }
                            $availability=['Part Time','Full Time','Intern'];
                           
                        @endphp
						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<a href="{{url('Worker_Details/'. urlencode(base64_encode($sender->id)))}}">
                                            @if($image)
                                                <img src="{{asset('uploads/users/'.$image->image)}}" class="img-responsive" alt="" />
                                            @else 
                                                <img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" />
                                            @endif
                                            
                                        </a>
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<a href="{{url('Worker_Details/'. urlencode(base64_encode($sender->id)))}}"><h3>{{$sender->name}}</h3></a>
										<p>
											<span>At: {{$proposal->created_at}}</span><span class="brows-job-sallery"><i class="fa fa-money"></i>${{$proposal->price}}</span>
											<span class="job-type cl-success bg-trans-success">{{$availability[$freelancer->availability]}}</span>
										</p>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									
										<p class="des">{{$proposal->description}}</p>
									
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="brows-job-link">
                                        <a class="decession" onclick="decession()" style="cursor:pointer" class="btn btn-secondary ">Accept</a>
                                        <form action="{{url('proposal_accept')}}" method="POST" id="final_decession" style="display:none">
                                            @csrf
                                            @php
                                                $job_id = base64_encode($job->id);
                                                $proposal_id=base64_encode($proposal->id);
                                                 
                                            @endphp
                                            <input type="hidden" name="job_id" value="{{$job_id}}">
                                            <input type="hidden" name="prosposal_id" value="{{$proposal_id}}">
                                            <input type="submit" value="Confirm"   href="" class="btn btn-secondary ">
                                        </form>
										
										<a class="decession" onclick="decession()" style="cursor:pointer" class="btn btn-secondary float-left">Denied</a>
									</div>
								</div>
							</div>
							
                        </article>
                        @endforeach
                    </div>
                    @endif

				</div>
			</section>
		
			
        </div>
<script>
 function decession(){
    $('.decession').hide();
    $('#final_decession').show();
 }
</script>				
@endsection