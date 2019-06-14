<div class="col-md-12">
    @foreach($data['data'] as $item)
    <article>
        <div class="mng-company">
            <div class="col-md-2 col-sm-2">
                <div class="mng-company-pic">
                    <img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" />
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="mng-company-name">
                    <h4>{{$item->title}}</h4>
                    <span class="cmp-time">End Date: {{$item->end_date}}</span>
                </div>
                <div>
                    <span class="cmp-time">Type: {{getFreelancerType($item->freelancer_type)}}</span>
                </div>
            </div>

            <div class="col-md-2 col-sm-2">
                <div class="brows-job-type" style="margin-top: 50px;">
                    <h4><span>$</span>{{$item->job_price}}</h4>
                </div>
            </div>

            <div class="col-md-2 col-sm-2">
                <div class="brows-job-type">
                    <span class="full-time" style="color:white">
                    {{getProjectStatusName($item->status)}}
                </span>
                </div>
                <div class="mng-company-location">
                    @if($item->location)
                    <p><i class="fa fa-map-marker"></i> {{$item->location}}</p>
                    @endif
                </div>
            </div>

            @if(Auth::check())
            @if(Auth::user()->user_type == 3)
            <div class="col-md-1 col-sm-1">
                <div class="mng-company-action">
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" onclick="editJob({{$item->id}})"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" onclick="deleteJob({{$item->id}})"><i class="fa fa-trash-o"></i></a>
                </div>
            </div>
            @endif
            @else
            <div class="col-md-1 col-sm-1">
                <div class="brows-job-link">
                    <a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
                </div>
            </div>
            @endif
            
        </div>
    </article>
    @endforeach {!! $data['data']->links() !!}

</div>