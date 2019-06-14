@foreach ($data['disputeJobs'] as $item)
@php
    if($item->freelancer_type==0){
        $proposal=App\FreelancerProjectProposal::find($item->proposal_id);
        $order=App\FreelancerProjectProposal::find($item->proposal_id)->profreeorder;
         $sender=App\User::find($order->freelancer_id);
         $freelancer=App\Freelancer::where('user_id',$sender->id)->first();
         $job=App\FreelancerProjectProposal::find($item->proposal_id)->job;
    }
    if($item->freelancer_type==1){
         $proposal=App\ProProjectProposal::find($item->proposal_id);
        $order=App\ProProjectProposal::find($item->proposal_id)->proproposal;
         $sender=App\User::find($order->freelancer_id);
         $freelancer=App\Pro::where('user_id',$sender->id)->first();
         $job=App\ProProjectProposal::find($item->proposal_id)->job;
    }
  
@endphp
<div class="brows-job-list">
    <div class="col-md-1 col-sm-2 small-padding">
        <div class="brows-job-company-img">
            <a href="job-detail.html"><img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" /></a>
        </div>
    </div>
    <div class="col-md-6 col-sm-5">
        <div class="brows-job-position">
            <a href="#">
                <h3>{{$job->title}}</h3>
            </a>
            <p>
                <span>{{$sender->name}}</span><span class="brows-job-sallery"><i class="fa fa-money"></i>${{$proposal->price}}</span>
                <span class="job-type cl-success bg-trans-success">{{$job->Location}}</span>
            </p>
        </div>
    </div>
    <div class="col-md-3 col-sm-3">
        <div class="brows-job-location">
            @php
                $country=App\Country::find($freelancer->country_code);
            @endphp
            <p><i class="fa fa-map-marker"></i>{{$freelancer->address}}
            @if($country)
            {{$country->name}}
            @endif
            </p>
        </div>
    </div>

    <div class="col-md-2 col-sm-2">

        {{--
        <div class="brows-job-link">
            <a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
        </div> --}}
    </div>
</div>
{{-- <span class="tg-themetag tg-featuretag">Active</span> --}} @endforeach {!! $data[ 'disputeJobs']->links() !!}