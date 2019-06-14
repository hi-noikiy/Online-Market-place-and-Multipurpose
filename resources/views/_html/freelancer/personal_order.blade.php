@extends('_html.freelancer.master')

@section('dascontent')
@php
    $user=App\User::find($id);
    $freelancer=App\Freelancer::where('user_id',$user->id)->first();
@endphp
<div>
    <div class="col-md-4 col-sm-4">
        <div class="card">
            <div class="card-body">
              
                @php
                    $completed_order=App\ProFreeOrder::where('freelancer_type',0)->where('freelancer_id',$freelancer->id)->where('status',1)->get();
                @endphp
                  <h5 class="card-title">Completed Orders <span class="badge badge-secondary">{{count($completed_order)}}</span></h5>
                @if($completed_order)
                    @foreach($completed_order as $order)
                    @php
                       // $project=App\
                    @endphp
                        <p class="card-text">Owner Name:</p>
                        <p class="card-text">Project title:</p>
                        <p class="card-text">Competation date: {{$order->created_at}}</p>
                        <p class="card-text">Price: ${{$order->price}}</p>
                    @endforeach    
                @endif
                
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4"> 
        <div class="card">
            <div class="card-body">
                
                @php
                    $completed_order=App\ProFreeOrder::where('freelancer_type',0)->where('freelancer_id',$freelancer->id)->where('status',0)->get();
                @endphp
                <h5 class="card-title">Not yet Completed Orders <span class="badge badge-secondary">{{count($completed_order)}}</span></h5>
                @if($completed_order)
                    @foreach($completed_order as $order)
                    @php
                       // $project=App\
                    @endphp
                        <p class="card-text">Owner Name:</p>
                        <p class="card-text">Project title:</p>
                        <p class="card-text">Competation date: {{$order->created_at}}</p>
                        <p class="card-text">Price: ${{$order->price}}</p>
                    @endforeach    
                @endif
                
            </div>
        </div>
    </div>
    
</div>
<br>
{{-- <div class="card">
    <a  class="btn btn-info" href="{{url('MyJob')}}">View Details</a>
</div> --}}
@endsection