{{-- Total --}}
<div class="alert alert-info">
    <b>Total {{ $response['projects']->total() }} Job Found.</b>
</div>
<style>
.des{
    overflow: hidden;
    height: 25px;
}
.des:hover{
    height: 100%;
    overflow-y: scroll;
    background: greenyellow;
    color: black;
}
</style>
<div class="item-click">
@foreach($response['projects'] as $project)
@php
    $image=App\Image::where('type',8)->where('item_id',$project->id)->first();
    $type=['Permanant','Part time','Intern','Temporary'];
    $user=$project->customer;
    $user=App\Customer::find($user);
    $user=App\User::find($user->user_id);
@endphp

    <article>
        <div class="brows-job-list">
            <div class="col-md-1 col-sm-2 small-padding">
                <div class="brows-job-company-img">
                    @if($image)
                    <a href="job-detail.html"><img src="{{asset('uploads/file/'.$image->image)}}" class="img-responsive" alt="" /></a>
                    @else 
                    <a href="job-detail.html"><img src="http://www.illuminationworksllc.com/wp-content/uploads/2017/04/ProjectManagement-1.jpg" class="img-responsive" alt="" /></a>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-sm-5">
                <div class="brows-job-position">
                    <a href="job-apply-detail.html"><h3>{{$project->title}}</h3></a>
                    <p>
                        <span>{{$user->name}}</span><span class="brows-job-sallery"><i class="fa fa-money"></i>
                            @if($project->min)
                            ${{$project->min}}
                            @endif
                             - 
                             @if($project->max)
                             ${{$project->max}}
                             @endif
                            </span>
                          
                   <i class="fa ">
                    @if($project->duration)    
                    </i>Duration: {{$project->duration}} Days
                    @endif
             
                        
                    </p>

                    <p>
                        @php
                            $skill=App\SkillDetails::where('item_type',1)->where('item_id',$project->id)->get();
                        @endphp
                        <span>Requirements</span>
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
                        <div class="col-md-8 col-sm-8 des">
                           <p> {{$project->description}}</p>
                        </div>
                        
                        
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="brows-job-location">
                    <p><i class="fa ">
                    @if($project->Location)    
                    </i>{{$project->Location}}</p>
                    @endif
                </div>
            </div>
            
            <div class="col-md-2 col-sm-2">
                <div class="brows-job-link">
                    @php
                        $u=Auth::guard('admin')->user();
                        $pro_proposal=App\ProProjectProposal::where('job_id',$project->id)->where('user_id',$u->id)->first();
                        $status=['Not Accepted Yet','Accepted','Denied'];
                    @endphp
                    @if($pro_proposal)
                     <a  class="btn btn-default" >{{$status[$pro_proposal->status]}}</a>
                    @else 
                     <a  class="btn btn-default" data-toggle="modal" data-target="#exampleModalCenter">Apply Now</a>
                    @endif
                   
                </div>
            </div>
        </div>
        @if($project->type)
        <span class="tg-themetag tg-featuretag">{{$type[$project->type]}}</span>
        @endif
    </article>


@endforeach {!! $response['projects']->links() !!}
</div>
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade container" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Send Proposal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('post_a_job_proposal')}}" method="POST" class="card">
            @csrf

            <input type="hidden" value="{{$project->id}}" name="project_id">
            <div class=form-control">
            <label for="">Description</label>
            <textarea rows="5"  class="form-control" name="description">
                Describe Your Proposal
            </textarea>
            </div>
            <div class=form-control">
            <label for="">Delivery in</label>
            <input type="number" class="form-control" name="delivery">
            </div>
            <div class=form-control">
            <label for="">Price</label>
            <input type="number" class="form-control" name="price">
            </div>
            <div class=form-control">
                <label for="">Send option with the gig</label>
                <select name="" id="" class="form-control" name="gig_id">
                    @php
                        $u=Auth::guard('admin')->user();
                        $f=App\Pro::where('user_id',$u->id)->first();
                        $g=App\Gig::where('freelancer_id',$f->id)->get();
                    @endphp
                    @if($g)
                        @foreach($g as $gig)
                        <option value="{{$gig->id}}">{{$gig->title}}</option>
                        @endforeach
                    @endif
                  
            
                </select>
            </div>
            <div class=form-control">
                <label for="">Attach the CV</label>
                <input type="checkbox"  value="true">
            </div>
            
            <input type="submit" class="btn btn-success form-control" value="Send">
        </form>
      </div>
     
    </div>
  </div>
</div>
