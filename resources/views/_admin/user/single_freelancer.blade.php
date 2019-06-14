@extends('_admin.layouts.app') 
@section('title', 'Freelancer') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Freelancer</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Freelancer</li>
            </ol>
        </div>
    </div>

    @php
        $country=App\Freelancer::find($freelancer->id)->country;
        $gender=['a','Male','Female','Other'];
        $verified=['Not','Yes'];
        $availability=['Permanent','Part time','Intern'];

    @endphp
    <div class="container-fluid">
        <div class="jumbotron">
            <h1 class="display-4">{{$user->email}}</h1>
            <p class="lead">
                <h5>Name: {{$user->email}}</h5>  
                <address> Address: {{$freelancer->address}}, {{$country->name}} </address> 
                <h5>Mobile: {{$user->mobile}}</h5> 
                
            </p>
            <hr class="my-4">
            <p>
                <h6>Gender: {{$gender[$freelancer->gender]}}</h6>
                <h6>Bithday: {{$freelancer->birthday}}</h6>
                <h6>Level: {{$freelancer->level}}</h6>
                <h6>Hourly Rate: {{$freelancer->hourly_rate}}</h6>
                <h6>Verified: {{$verified[$freelancer->verified_at]}}</h6>
                <h6>Availability: {{$availability[$freelancer->availability]}}</h6>
                <h6>Average Response Time: {{$freelancer->response_time}}</h6>
                <h6>Recent Delivery: {{$freelancer->recent_delivery}}</h6>
            </p>
            <div>
                <label for="">Profile Image</label>
                <img src="{{asset('uploads/user/'.$freelancer->profile_image)}}" height="50px" width="50px" style="border-radius:10%;margin-left:auto;margin-right:auto;display:block">
            </div>
            <p class="lead">
                <h6>Created at: {{$freelancer->created_at}}</h6>
                <h6>Updated at: {{$freelancer->updated_at}}</h6>
            </p>
             <hr class="my-4">
             <p>
                 <h6>Short Description: {{$freelancer->short_description}}</h6>
                 <h6>Long Description: {{$freelancer->long_description}}</h6>
             </p>
            <p>
                <a href="" class="btn btn-success">Email This User</a>
            </p>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-title">
                <h4 class="card-title" style="cursor:pointer">Gigs</h4>
                <div class="card-body">
                    @if($gigs)
                        @foreach($gigs as $gig)
                        @php
                            $category=App\JobCategory::where('id',$gig->category_id)->first();
                        @endphp
                            <div class="col-md-4 col-sm-6 float-left" style="border:1px solid black;padding:3px;margin:1px">
                                <h5>{{$gig->title}}</h5>
                                <small>Created by Ip: {{$gig->ip}}</small>
                                @if($category)
                                <small class="badge badge-success">Category: {{$category->name}}</small>
                                @else 
                                    <h6 class="badge badge-success">Category: Other</h6>
                                @endif
                                <div align='center'>
                                    <img src="{{asset('uploads/gig/'.$gig->type)}}" alt=""  height="70px" width="70px" style="border-radius:10%;margin-left:auto;margin-right:auto;display:block">
                                </div>
                                <div class="card-title">
                                    <h6>{{$gig->basic_short_description}}</h6>
                                    <small>{{$gig->basic_long_description}}</small>
                                    <hr>
                                    <p>
                                        Price:{{$gig->price1}} 
                                        <br>
                                        Deliver Time: {{$gig->delivery_time1}}
                                    </p>
                                </div>
                                <div class="card-title">
                                    <h6>{{$gig->silver_short_description}}</h6>
                                    <small>{{$gig->silver_brief_description}}</small>
                                    <hr>
                                    <p>
                                        Price:{{$gig->price2}} 
                                        <br>
                                        Deliver Time: {{$gig->delivery_time2}}
                                    </p>
                                    
                                </div>
                                <div class="card-title">
                                    <h6>{{$gig->gold_short_description}}</h6>
                                    <small>{{$gig->gold_brief_description}}</small>
                                    <hr>
                                    <p>
                                        Price:{{$gig->price3}} 
                                        <br>
                                        Deliver Time: {{$gig->delivery_time3}}
                                    </p>
                                </div>
                                <hr>
                                Created at: {{$gig->created_at}}
                                <br>
                                <a href="" class="btn btn-danger">Delete this Gig</a>
                            </div>
                        @endforeach
                    @endif
                    {{ $gigs->links() }}
                </div>
            </div>
        </div>

        {{-- review givern --}}
        <div class="card">
            <h3 class="card-title">Review Given</h3>
            <div class="card-body">
               

            </div>
        </div>
        <div class="card">
            <h3 class="card-title">Request Send</h3>
            @if($proposals)
               
                 @foreach($proposals as $proposal)
                    <div class="col-md-3 col-sm-6 float-left" style="border:1px solid black;margin:2px;padding:3px;">
                        @php
                            $job=App\FreelancerProjectProposal::find($proposal->id)->job;
                            $status=['Not_Accepted','Accepted','Denied'];
                        @endphp
                        <h5>Project title: {{$job->title}}</h5>
                            <label for="">Description</label>
                            <p>
                                {{$proposal->description}}
                            </p>
                            <hr>
                            <div>
                            <h5> Delivery time: {{$proposal->delivery_time}}</h5>
                            <h5> Price: {{$proposal->price}}</h5>
                            </div>
                            <hr>
                            <small class="badge badge-secondary">{{$status[$proposal->status]}}</small>
                    </div>
                @endforeach

               
                {{ $proposals->links() }}
            @endif
        </div>
        <div class="card">
            <h3 class="card-title">Completed Order</h3>
        </div>
        <div class="card">
            <h3 class="card-title">Analitiec</h3>
        </div>
    </div>
</div>
@endsection