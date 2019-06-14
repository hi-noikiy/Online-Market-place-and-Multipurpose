<!DOCTYPE html>
<html>
<title>GIG Site</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('css/style1.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/response.css')}}">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

@php
  if($user->user_type==3){
    $freelancer=App\Freelancer::where('user_id',$user->id)->first();
    $cat=App\Category::where('type',2)->get();
  } elseif ($user->user_type==4) {
    $pro=App\Pro::where('user_id',$user->id)->first();
     $cat=App\Category::where('type',3)->get();
  } 

@endphp

<!-- Page Container -->
@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@php
			$m=Session::get('message');
		@endphp
		@if($m)
			<div class="bg-info">
				<h5 style="color:white;font-wight:700;">{{$m}}</h5>
			</div>
		@endif
<div class="w3-container w3-content" style="max-width:1400px;margin-top:20px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white" id="bar">
        <div class="w3-container">
         
         <p class="w3-center"><img src="{{asset('avatar.png')}}" class="wow heartBeat w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <div class="w3-container">
          <div style="text-align: center;">
         <h3 class="head-type" style="font-style: bold; padding: 0;">ProfileName</h3>


         

       </div>
       <div class="text" style="text-align: center;">
       <i class="fas fa-star" id="star"><i class="fas fa-star"> <i class="fas fa-star"> <i class="fas fa-star"> <i class="fas fa-star"><span style="color: black">5.0 (1k+ reviews)</span></i></i></i></i></i>
     </div>

        </div>


      </div>
      <div class="btn-group">
         {{-- <button class="wow rubberBand w3-btn w3-round">Contact me</button>
         <button class="wow rubberBand w3-btn w3-round">Get a Quote</button> --}}
         <h6>Email</h6>
         <h6>Email</h6>
      </div>
    </div>
      <br>
      
    
     
      <br>
      
      
      <div class="w3-card w3-round w3-white" id="bar">
        <div class="w3-container">
          <h6 class="widget-title">
            <span> 
              Description
            </span>
          </h6>
          <br>
          <p></p>
          <hr>

          <h6 class="widget-title">
            <span> 
              Description
            </span>
          </h6>
          <br>
          <p></p>
          <hr>

          <h6 class="widget-title">
            <span> 
              Description
            </span>
          </h6>
          <br>
          <p></p>
          <hr>

          <h6 class="widget-title">
            <span> 
              Description
            </span>
          </h6>
          <p></p>
          <hr>

          <h6 class="widget-title">
            <span> 
              Description
            </span>
          </h6>
          
          <p>
             <span class="w3-tag w3-small" id="spans">PHP</span>
            <span class="w3-tag w3-small" id="spans">Html</span>
            <span class="w3-tag w3-small" id="spans">CSS</span>
            <span class="w3-tag w3-small" id="spans">Javascript</span>
            <span class="w3-tag w3-small" id="spans">Photo Editing</span>
            <span class="w3-tag w3-small" id="spans">Graphics</span>
            <span class="w3-tag w3-small" id="spans">C++</span>
            <span class="w3-tag w3-small" id="spans">Java</span>
            <span class="w3-tag w3-small" id="spans">Wordpress</span>
            <span class="w3-tag w3-small" id="spans">Photography</span>
            <span class="w3-tag w3-small" id="spans">Video Editing</span>
          </p>
           <hr>

          <h6 class="widget-title">
            <span> 
              Description
            </span>
          </h6>
           <br>
          <p></p>
          <hr>

          <h6 class="widget-title">
            <span> 
              Description
            </span>
          </h6>
          <br>
          <p></p>
        </div>
      </div>
      <br>
      
    
     
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
    
      
      
      <div class="w3-container" id="cop"><br>
         
       <h6 class="widget-title">
            <span> 
               My Gigs
            </span>
            <span class="">
              <a class="" href="{{url('Gig/create')}}">Create a new</a>
            </span>
        </h6>
       
          <div class="w3-col m4">
      <div class="wow jackInTheBox w3-card-4">
        <div class="im1">
    <img src="{{asset('avatar.png')}}"  alt="Alps" width="100%">
  </div>
    <div class="w3-container w3-center">
      <a><img class="img" src="{{asset('avatar.png')}}"><span class="head">First Name </span></a>
      <p class="card">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
      <i class="fas fa-star" id="star"><span style="color: black;">5.0(80)</span></i>
      
      <hr>
    </div>
   
  </div>
</div>

     <div class="w3-col m4"">
      <div class="wow jackInTheBox w3-card-4">
        <div class="im1">
    <img src="{{asset('avatar.png')}}"  alt="Alps" width="100%">
  </div>
    <div class="w3-container w3-center">
      <a><img class="img" src="{{asset('avatar.png')}}"><span class="head">First Name </span></a>
      <p class="card">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
      <i class="fas fa-star" id="star"><span style="color: black;">5.0(80)</span></i>
      
      <hr>
    </div>
   
   
  </div>
</div>

     <div class="w3-col m4">
      <div class="wow jackInTheBox w3-card-4">
        <div class="im1">
    <img src="{{asset('avatar.png')}}"  alt="Alps" width="100%">
  </div>
    <div class="w3-container w3-center">
      <a><img class="img" src="{{asset('avatar.png')}}"><span class="head">First Name </span></a>
      <p class="card">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
      <i class="fas fa-star" id="star"><span style="color: black;">5.0(80)</span></i>
      
      <hr>
    </div>
   
    <p></p>
  </div>

        
        </div>


                <div class="w3-col m4"">
      <div class="wow jackInTheBox w3-card-4">
        <div class="im1">
    <img src="{{asset('avatar.png')}}"  alt="Alps" width="100%">
  </div>
    <div class="w3-container w3-center">
      <a><img class="img" src="{{asset('avatar.png')}}"><span class="head">First Name </span></a>
      <p class="card">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
      <i class="fas fa-star" id="star"><span style="color: black;">5.0(80)</span></i>
      
      <hr>
    </div>
    
  </div>
</div>

     <div class="w3-col m4"">
      <div class="wow jackInTheBox w3-card-4">
        <div class="im1">
    <img src="{{asset('avatar.png')}}"  alt="Alps" width="100%">
  </div>
    <div class="w3-container w3-center">
      <a><img class="img" src="{{asset('avatar.png')}}"><span class="head">First Name </span></a>
      <p class="card">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
      <i class="fas fa-star" id="star"><span style="color: black;">5.0(80)</span></i>
      
      <hr>
    </div>
   
  </div>
</div>

     <div class="w3-col m4"">
      <div class="wow jackInTheBox w3-card-4">
        <div class="im1">
    <img src="{{asset('avatar.png')}}"  alt="Alps" width="100%">
  </div>
    <div class="w3-container w3-center">
      <a><img class="img" src="{{asset('avatar.png')}}"><span class="head">First Name </span></a>
      <p class="card">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
      <i class="fas fa-star" id="star"><span style="color: black;">5.0(80)</span></i>
      
      <hr>
    </div>
    <br>
    <p></p>
  </div>

        
        </div>



            
     <div class="w3-col m4"">
      <div class="wow jackInTheBox w3-card-4">
        <div class="im1">
    <img src="{{asset('avatar.png')}}"  alt="Alps" width="100%">
  </div>
    <div class="w3-container w3-center">
      <a><img class="img" src="{{asset('avatar.png')}}"><span class="head">First Name </span></a>
      <p class="card">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
      <i class="fas fa-star" id="star"><span style="color: black;">5.0(80)</span></i>
      
      <hr>
    </div>
    
  </div>



</div>
        
      </div>
      
      <div class="w3-container"><br>
         
         <header class="comment">
  
<h3 class="cmnt-header"> Reviews As Seller
        <select class="select">
  <option value="as">Most Reviews</option>
  
  <option value="sa">Positive Reviews</option>
  <option value="asa">Negative Reviews</option>
</select></h3>
      

</header>   
         
      </div>  

      <div class="w3-container"><br>
        <table class="w3-table w3-bordered" id="table-el">
          <thead>
             <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Another</th>
      
    </tr>
  </thead>
</table>
       
      </div>

      <div class="w3-container"><br>
        <table class="w3-table w3-bordered">
          <thead>
             <tr>
      <a><img class="img" src="{{asset('avatar.png')}}"><span class="head">First Name </span></a><p class="comments">comments </p> <small class="small">3 days ago</small> 
</tr>
  </thead>
</table>
<hr>

<table class="w3-table w3-bordered">
          <thead>
             <tr>
      <a><img class="img" src="{{asset('avatar.png')}}"><span class="head">First Name </span></a><p class="comments">comments </p> <small class="small">3 days ago</small> 
</tr>
  </thead>
</table>
<hr>


       
      </div>  


        <div class="w3-container"><br>
         
         <header class="comment">
  
<h3 class="cmnt-header"> Reviews As Buyer
        <select class="select">
  <option value="as">Most Reviews</option>
  
  <option value="sa">Positive Reviews</option>
  <option value="asa">Negative Reviews</option>
</select></h3>
      

</header>   
         
      </div> 



         <div class="w3-container"><br>
        <table class="w3-table w3-bordered">
          <thead>
             <tr>
      <a><img class="img" src="{{asset('avatar.png')}}"><span class="head">First Name </span></a><p class="comments">comments </p> <small class="small">3 days ago</small> 
</tr>
  </thead>
</table>
<hr>


<table class="w3-table w3-bordered">
          <thead>
             <tr>
      <a><img class="img" src="{{asset('avatar.png')}}"><span class="head">First Name </span></a><p class="comments">comments </p> <small class="small">3 days ago</small> 
</tr>
  </thead>
</table>
<hr>



      </div> 
      
    <!-- End Middle Column -->
    </div>
    
  
   
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->


 <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html> 
