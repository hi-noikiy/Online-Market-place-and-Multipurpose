@foreach ($data['appliedJob'] as $item)
<div class="brows-job-list">
    <div class="col-md-1 col-sm-2 small-padding">
        <div class="brows-job-company-img">
            <a href="job-detail.html"><img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" /></a>
        </div>
    </div>
    <div class="col-md-6 col-sm-5">
        <div class="brows-job-position">
            <a href="#">
                <h3>{{$item->title}}</h3>
            </a>
            <p>
                {{-- <span>{{$item->user_name}}</span> --}}
                <span class="brows-job-sallery"><i class="fa fa-money"></i>{{'$'.$item->budget}}</span>
                <span class="job-type cl-success bg-trans-success">{{getJobType($item->job_type)}}</span>
            </p>
        </div>
    </div>
    <div class="col-md-3 col-sm-3">
        <div class="brows-job-location">
            {{-- <p><i class="fa fa-map-marker"></i>{{$item->location.', '.$item->country}}</p> --}}
            <p><i class="fa fa-user"></i>{{$item->jobSeeker_name}}</p>
        </div>
    </div>

    <div class="col-md-2 col-sm-2">

        {{--
        <div class="brows-job-link">
            <a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
        </div> --}}
    </div>
</div>
{{-- <span class="tg-themetag tg-featuretag">Active</span> --}} @endforeach {!! $data[ 'appliedJob']->links() !!}