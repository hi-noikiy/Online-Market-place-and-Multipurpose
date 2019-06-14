@php
    $user=App\User::find($id);
    // print_r($user);
    // exit();
@endphp
{{-- @if($user->user_type==3)
@extends('_html.freelancer.master')
@endif
@if($user->user_type==4) 
@extends('_html.pro.master')
@endif --}}
@extends('_html.pro.master')
@section('dascontent')

<div class="w3-container"><br>
  <style>
  .review-detail {
    display: table;
    margin-left: 100px;
    background: white;
    padding: 5px;
}
  </style> 
   
    <div class="">

        <!-- Single Review -->
         @php
          $review= \App\Helpers\GeneralHelper::get_total_review($user->id,4);
            // if($user->user_type==3){
            //     $review= \App\Helpers\GeneralHelper::get_total_review($user->id,3);
            // }elseif($user->user_type==4) {
               
            // }
        // print_r($review);
        // exit();    
        
    @endphp
        <div class="">
            <div class="review-thumb">
                <img src="http://via.placeholder.com/180x180" class="img-responsive img-circle" alt="" />
            </div>
            <div class="review-detail">
                @if($review)
                    @foreach($review as $review)
                    @php
                    if($review->giver_type==0){
                    $giver=App\All_user::find($review->giver_id);
                    }elseif ($review->giver_type==1) {
                        $giver=App\User::find($review->giver_id);
                    }  
                    @endphp
                    <h4>{{$giver->name}}<span>at {{$review->created_at}}</span></h4>
                
                    {{-- <span class="re-designation">Web Developer</span> --}}
                    <p>{{$review->comment}}</p>
                    @endforeach
                @endif    
            </div>
        </div>

    </div>

      <hr>
  </div> 
@endsection