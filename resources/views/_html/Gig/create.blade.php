@extends('_html.layouts.app') 
@section('title', 'Create Gig') 
@section('content')
<div class="clearfix"></div> 

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>Create a New Gig</h1>
    </div>
</section>
@php
    if($user->user_type==3){
    $freelancer=App\Freelancer::where('user_id',$user->id)->first();
    $cat=App\Category::where('type',2)->get();
    $skill=App\Skill::where('type',3)->get();
    } elseif ($user->user_type==4) {
     $pro=App\Pro::where('user_id',$user->id)->first();
     $cat=App\Category::where('type',3)->get();
      $skill=App\Skill::where('type',4)->get();
    }  
  ///  print_r($skill);
   // exit();
@endphp
			<section class="accordion">
				<div class="container">
					<div class="col-md-6 col-sm-6">
						<div class="simple-tab">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="work-process">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											   Why Should you need a new Gig
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="work-process">
										<div class="panel-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam congue leo in congue mattis. Phasellus leo augue, consequat vitae cursus ut, efficitur a elit.</p>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="what-we-do">
										<h4 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												What information should be given to impress a customer?
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="what-we-do">
										<div class="panel-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam congue leo in congue mattis. Phasellus leo augue, consequat vitae cursus ut, efficitur a elit.</p>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="how-we-do">
										<h4 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												What Should not be given?
											</a>
										</h4>
									</div>
									<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="how-we-do">
										<div class="panel-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam congue leo in congue mattis. Phasellus leo augue, consequat vitae cursus ut, efficitur a elit.</p>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="how-we-do">
										<h4 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												Terms and Service for Gig Creation?
											</a>
										</h4>
									</div>
									<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="how-we-do">
										<div class="panel-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam congue leo in congue mattis. Phasellus leo augue, consequat vitae cursus ut, efficitur a elit.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                   
                    <div class="col-md-6 col-sm-6">
                        <form action="{{url('Gig/create')}}" method="POST" enctype="multipart/form-data">
                        @csrf         
                            <div class="accordian-style-three">
                                <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion3" href="#service-One" aria-expanded="true" aria-controls="collapseOne">
                                                    Create A Gig
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="service-One" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <p>
                                                    <label for="title">Title of the gig</label>
                                                    <input type="text" class="form-control" placeholder="Title" id="title" name="title" required>
                                                </p>
                                                <small>Title will be show to the customers</small>
                                            </div>
                                            <div class="panel-body">
                                                <p>
                                                    <label for="address">Your Address</label>
                                                    <input type="text" id="address" name="address" class="form-control" placeholder="Title" required> 
                                                </p>
                                                <small> Will be show to the customers</small>
                                            </div>
                                            <div class="panel-body">
                                                <p>
                                                    <style>
                                                        option{
                                                            padding: 5px;
                                                            margin:3px;
                                                        }
                                                    </style>
                                                    <label for="category">Select Category</label>
                                                   
                                                    <select name="category" id="category">
                                                         @if($cat)
                                                            @foreach($cat as $cat)
                                                                 <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                            @endforeach
                                                         @endif
                                                       
                                                        <option value="other">Other</option>
                                                    </select>
                                        
                                                    <label for="subcategory">Sub Category</label>
                                                    <select name="subcategory" id="subcategory">
                                                        <option value="">a</option>
                                                    </select>
                                                </p>
                                                
                                            </div>
                                      
                                            <div class="panel-body">
                                                <p>
                                                    <style>
                                                        option{
                                                            padding: 5px;
                                                            margin:3px;
                                                        }
                                                    </style>
                                                    <label for="skill">Select 5 Skills</label>
                                                    <br>
                                                    <select name="skill1">
                                                        @if($skill)
                                                       
                                                          <?php 
                                                            for($i=0;$i<count($skill);$i++) {?>
                                                            <option value="{{$skill[$i]->id}}">{{$skill[$i]->name}}</option>
                                                        
                                                        <?php } ?>
                                                           
                                                        @endif
                                                       
                                                        <option value="other">Other</option>
                                                    </select>
                                                    <select name="skill2">
                                                         @if($skill)
                                                       
                                                            <?php 
                                                            for($i=0;$i<count($skill);$i++) {?>
                                                            <option value="{{$skill[$i]->id}}">{{$skill[$i]->name}}</option>
                                                        
                                                            <?php } ?>
                                                           
                                                        @endif
                                                        <option value="other">Other</option>
                                                    </select>
                                                    <select name="skill3">
                                                         @if($skill)
                                                            <?php 
                                                            for($i=0;$i<count($skill);$i++) {?>
                                                            <option value="{{$skill[$i]->id}}">{{$skill[$i]->name}}</option>
                                                        
                                                        <?php } ?>
                                                        @endif
                                                       
                                                        <option value="other">Other</option>
                                                    </select>
                                                    <select name="skill4" >
                                                        
                                                        @if($skill)
                                                            <?php 
                                                            for($i=0;$i<count($skill);$i++) {?>
                                                            <option value="{{$skill[$i]->id}}">{{$skill[$i]->name}}</option>
                                                        
                                                            <?php } ?>
                                                        @endif
                                                        <option value="other">Other</option>
                                                    </select>
                                                    <select name="skill5">
                                                        
                                                        @if($skill)
                                                            <?php 
                                                            for($i=0;$i<count($skill);$i++) {?>
                                                            <option value="{{$skill[$i]->id}}">{{$skill[$i]->name}}</option>
                                                        
                                                            <?php } ?>
                                                        @endif
                                                        <option value="other">Other</option>
                                                    </select>
                                        
                                                   
                                                </p>
                                                
                                            </div>
                                                    
                                          
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="section-2">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#service-Two" aria-expanded="false" aria-controls="collapseTwo">
                                                   Description and Package
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="service-Two" class="panel-collapse collapse" role="tabpanel" aria-labelledby="section-2">
                                            <div class="panel-body">
                                                <div class="col-md-4 col-sm-4 card">
                                                    <ul style="list-style:none;">
                                                       <li class="card-title"><u><strong>Basic</strong></u></li> 
                                                       <li>
                                                           <label for="basci_dex">Describe (in Short)</label>
                                                           <textarea name="basic_short_des" id="basci_dex" cols="15" rows="2">Short Description</textarea>
                                                       </li>
                                                       <li>
                                                           <label for="basci_dex">Describe Your Offer</label>
                                                           <textarea name="basic_brief_des" id="basci_dex" cols="15" rows="10"></textarea>
                                                       </li>
                                                       <li>
                                                           <label for="basic_price">Price</label>
                                                           <input type="number" class="form-control" pattern="Price" name="basic_price" required>
                                                       </li>
                                                       <li>
                                                           <label for="basic_delivery">Delivery Time (in Days)</label>
                                                           <input name="basic_delivery" type="number" class="form-control" placeholder=" i.e. 5" required>
                                                       </li>
                                                      
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                     <ul style="list-style:none;">
                                                       <li class="card-title"><u><strong>Silver</strong></u></li> 
                                                       <li>
                                                           <label for="silver_short_des">Describe (in Short)</label>
                                                           <textarea name="silver_short_des" id="silver_short_des" cols="15" rows="2" required>Short Description</textarea>
                                                       </li>
                                                       <li>
                                                           <label for="silver_short_des">Describe Your Offer</label>
                                                           <textarea name="silver_brief_des" id="silver_short_des" cols="15" rows="10" required></textarea>
                                                       </li>
                                                        <li>
                                                           <label for="silver_price">Price</label>
                                                           <input name="silver_price" type="number" class="form-control" placeholder="Price" required >
                                                       </li>
                                                       <li>
                                                           <label for="silver_delivery">Delivery Time (in Days)</label>
                                                           <input name="silver_delivery" type="number" class="form-control" placeholder=" i.e. 5" required>
                                                       </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                     <ul style="list-style:none;">
                                                       <li class="card-title"><u><strong>Gold</strong></u></li> 
                                                       <li>
                                                           <label for="gold_short_des">Describe (in Short)</label>
                                                           <textarea name="gold_short_des" id="gold_short_des" cols="15" rows="2" required>Short Description</textarea>
                                                       </li>
                                                       <li>
                                                           <label for="gold_short_des">Describe Your Offer</label>
                                                           <textarea name="gold_brief_des" id="gold_short_des" cols="15" rows="10" required></textarea>
                                                       </li>
                                                       <li>
                                                           <label for="gold_price">Price</label>
                                                           <input name="gold_price" type="number" class="form-control" pattern="Price" required>
                                                       </li>
                                                      <li>
                                                           <label for="gold_delivery">Delivery Time (in Days)</label>
                                                           <input name="gold_delivery" type="number" class="form-control" placeholder="i.e. 5" required>
                                                       </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="section-22">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#service-Three" aria-expanded="false" aria-controls="collapseThree">
                                                   Images
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="service-Three" class="panel-collapse collapse" role="tabpanel" aria-labelledby="section-22">
                                            <div class="panel-body">
                                                <label for="">You Can put one or more Images</label>
                                                <input type="file" name="image1" class="form-control" required>
                                                <input type="file" name="image2" class="form-control">
                                                <input type="file" name="image3" class="form-control">
                                            </div>
                                            <input type="submit" class="btn btn-success form-control" value="Confirm and Create">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
				</div>
			</section>
@endsection