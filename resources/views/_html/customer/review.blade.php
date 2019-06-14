
@extends('_html.customer.master')
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
               $review= \App\Helpers\GeneralHelper::get_total_review($user->id,2);
              
        
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