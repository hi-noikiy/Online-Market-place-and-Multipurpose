{{-- Total --}}
<div class="alert alert-info">
    <b>Total {{$data['scholarShip']->total() }} ScholarShip Found.</b>
</div>

@foreach ($data['scholarShip'] as $item)
<div class="item-click">
    <article>
        <div class="brows-job-list">
            <div class="col-md-1 col-sm-2 small-padding">
                <div class="brows-job-company-img">
                    <a href="{{url('ScholarShip/Details')}}"><img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" /></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-5">
                <div class="brows-job-position">
                    <a href="{{url('ScholarShip/Details')}}">
                        <h3>{{$item->title}}</h3>
                    </a>
                    <p>
                        <span>{{$item->institution}}</span><span class="brows-job-sallery"><i class="fa fa-money"></i>{{$item->budget}}</span>                        {{-- <span class="job-type cl-success bg-trans-success">Full Time</span> --}}
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="brows-job-location">
                    <p><i class="fa fa-map-marker"></i>{{$item->location_name.', '.$item->country_name}}</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="brows-job-link">
                    <a href="{{url('ScholarShip/Details/'.urlencode(base64_encode($item->id)))}}" class="btn btn-info">Details</a>
                </div>
            </div>
        </div>
    </article>
</div>
@endforeach {!! $data[ 'scholarShip']->links() !!}