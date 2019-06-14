{{-- Total --}}
<div class="alert alert-info">
    <b>Total {{$data['courses']->total() }} Courses Found</b>
</div>

@foreach ($data['courses'] as $item)

<div class="col-md-4 col-sm-6">
    <div class="freelance-container style-2">
        <div class="freelance-box">
            @if ($item->availablity == 1)
            <span class="freelance-status">Available</span> @else
            <span class="freelance-status bg-danger">Not Available</span> @endif
            <h4 class="flc-rate">{{'$'.$item->price}}</h4>
            <div class="freelance-inner-box">
                <div class="freelance-box-thumb">
                    <img src="{{asset('_html/assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt="" />
                </div>
                <div class="freelance-box-detail">
                    <h4>{{$item->title}}</h4>
                </div>
            </div>
            {{-- <a href="{{url('ScholarShip/Details/'.urlencode(base64_encode($item->id)))}}" class="btn btn-info">Details</a> --}}
            <a href="{{url('Courses/Details/'.urlencode(base64_encode($item->id)))}}" class="btn btn-freelance-two bg-default">View Detail</a>
        </div>
    </div>
</div>

{{--
<div class="col-md-4 col-sm-6">
    <div class="freelance-container style-2">
        <div class="freelance-box">
            <span class="freelance-status">Available</span>
            <h4 class="flc-rate">$10</h4>
            <div class="freelance-inner-box">
                <div class="freelance-box-thumb">
                    <img src="{{asset('_html/assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt="" />
                </div>
                <div class="freelance-box-detail">
                    <h4>CSS Full Courses</h4>
                </div>
            </div>
            <a href="#" class="btn btn-freelance-two bg-default">View Detail</a>
        </div>
    </div>
</div> --}} {{--
<div class="col-md-4 col-sm-6">
    <div class="freelance-container style-2">
        <div class="freelance-box">
            <span class="freelance-status bg-danger">Not Available</span>
            <h4 class="flc-rate">$10</h4>
            <div class="freelance-inner-box">
                <div class="freelance-box-thumb">
                    <img src="{{asset('_html/assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt="" />
                </div>
                <div class="freelance-box-detail">
                    <h4>jQuery Full Courses</h4>
                </div>
            </div>
            <a href="#" class="btn btn-freelance-two bg-default">View Detail</a>
        </div>
    </div>
</div> --}} @endforeach
<div class="col-md-12">
    {!! $data[ 'courses']->links() !!}
</div>