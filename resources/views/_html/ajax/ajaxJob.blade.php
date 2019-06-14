{{-- Total --}}
<div class="alert alert-info">
    <b>Total {{ $jobs->total() }} Jobs Found.</b>
</div>

@foreach($jobs as $job)
<div class="item-click">
    <article>
        <div class="brows-job-list">
            <div class="col-md-1 col-sm-2 small-padding">
                <div class="brows-job-company-img">
                    <a href="job-detail.html">
                        <img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" />
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-5">
                <div class="brows-job-position">
                    {{-- <a href="{{url('JobDetails/'. urlencode(base64_encode($job->id)))}}">
                        <h3>{{$job->title}}</h3>
                    </a> --}}

                    <h3>{{$job->title}}</h3>

                    <p>
                        <span>{{$job->user_name}}</span><span class="brows-job-sallery">
                            <i class="fa fa-money"></i>${{$job->budget}}
                        </span> @if(!empty($job->experience))
                        <span class="job-type cl-success bg-trans-success">
                            {{$job->experience}} Year
                        </span> @endif
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="brows-job-location">
                    <p><i class="fa fa-map-marker"></i>{{$job->location.', '.$job->country}}</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="brows-job-link">
                    <a href="{{url('JobDetails/'. urlencode(base64_encode($job->id)))}}" class="btn btn-default">Apply Now</a>
                </div>
            </div>
        </div>
        <span class="tg-themetag tg-featuretag">{{$job->category}}</span>
    </article>
</div>
@endforeach {!! $jobs->links() !!}