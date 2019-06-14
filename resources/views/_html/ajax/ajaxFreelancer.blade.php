{{-- Total --}}
<div class="alert alert-info">
    <b>Total {{ $freelancers->total() }} Freelancer Found.</b>
</div>

@foreach($freelancers as $freelancer)
@php
  //  print_r($freelancers);
  $people=App\Freelancer::where('user_id',$freelancer->id)->first();
  $country=null;
  if($people){
       if($people->address){
    
             $country=App\Country::find($people->country_code);
    
         }
  }
 
 
@endphp
<div class="col-md-3 col-sm-6">
    <div class="freelance-container style-2">
        <div class="freelance-box">
            <span class="freelance-status">{{checkAvailablity($freelancer->is_available)}}</span> 
            @if($people)
            <span class="freelance-status-right">Level:{{$people->level}}</span> 
            @endif 
            <div class="freelance-inner-box">
                <div class="freelance-box-thumb">
                    <img src="{{asset('_html/assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt="" />
                </div>
                <div class="freelance-box-detail">
                   
                    <h4>{{$freelancer->name}}</h4>
                     
                    @if($country)
                        <span class="location">{{$country->name}}</span>
                    @endif 
                    @if($people)
                        <h6>{{$people->short_description}}</h6>
                    @endif
                    
                </div>
                @if($freelancer->rating)
                <div class="rattings">
                    @for($i = 0; $i
                    < $freelancer->rating; $i++)
                        <i class="fa fa-star fill"></i> @endfor
                </div>
                @endif
            </div>
            <div class="freelance-box-extra">
                {{-- <p>{{$freelancer->note}}</p> --}}
                @php
                    $skills=App\SkillDetails::where('user_id',$freelancer->id)->get();
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
            <a href="{{url('Worker_Details/'. urlencode(base64_encode($freelancer->id)))}}" class="btn btn-freelance-two bg-default">View Detail</a>
        </div>
    </div>
</div>
@endforeach
<div class="col-md-12">
    {!! $freelancers->links() !!}
</div>