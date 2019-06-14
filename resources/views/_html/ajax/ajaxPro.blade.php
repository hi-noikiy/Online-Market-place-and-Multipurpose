{{-- Total --}}
<div class="alert alert-info">
    <b>Total {{ $pros->total() }} Pro Found.</b>
</div>
@foreach($pros as $pro)
@php
  //  print_r($freelancers);
  $people=App\Pro::where('user_id',$pro->id)->first();
  $country=null;
  if($people->address!=null){
     $country=$people->address;
    $country_code=explode($country,',');
    $country=App\Country::find($country_code[0]);
    // print_r($country);
  }
 
@endphp
<div class="col-md-4 col-sm-6">
    <div class="freelance-container style-2">
        <div class="freelance-box">
             <span class="freelance-status">{{checkAvailablity($pro->is_available)}}</span> 
            <span class="freelance-status-right">Level:{{$people->level}}</span> 
            <div class="freelance-inner-box">
                <div class="freelance-box-thumb">
                    <img src="{{asset('_html/assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt="" />
                </div>
                <div class="freelance-box-detail">
                     <h4>{{$pro->name}}</h4>
                     
                    @if($country)
                        <span class="location">{{$country->name}}</span>
                    @endif 
                    @if($people)
                        <h6>{{$people->short_description}}</h6>
                    @endif
                </div>
                @if($pro->rating)
                <div class="rattings">
                    @for($i = 0; $i
                    < $pro->rating; $i++)
                        <i class="fa fa-star fill"></i> @endfor
                </div>
                @endif
            </div>
            <div class="freelance-box-extra">
                @php
                    $skills=App\SkillDetails::where('user_id',$pro->id)->get();
                @endphp
                @if($skills)
                <ul>
                    @for($i = 0; $i< count($skills); $i++) 
                        @if($i < 3)
                        @php
                            $s=App\Skill::find($skills[$i]->skill_id);
                        @endphp
                            @if($s)
                                 <li>{{$s->name}}</li>
                            @endif
                        @endif
                    @endfor
                        @if(count($skills) > 3)
                          <li class="more-skill bg-primary">+{{count($skills) - 3}}</li>
                        @endif
                </ul>
                @endif
            </div>
            <a href="{{url('Worker_Details/'. urlencode(base64_encode($pro->id)))}}" class="btn btn-freelance-two bg-default">View Detail</a>
        </div>
    </div>
</div>  
@endforeach
<div class="col-md-12">
    {!! $pros->links() !!}
</div>