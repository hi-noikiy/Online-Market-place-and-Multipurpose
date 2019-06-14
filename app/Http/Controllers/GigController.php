<?php

namespace App\Http\Controllers;

use App\Gig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Session;
use App\User;
use App\All_user;
use App\SkillDetails;
use App\Freelancer;
use App\Pro;
use App\Image;


class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user=Auth::guard('admin')->user();
   
       return view('_html.Gig.view')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::guard('admin')->user();
        return view('_html.Gig.create')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>'required | min:6',
            'address' => 'required',
            'category' => 'required',
            'basic_short_des' => 'required | min:6',
            'basic_brief_des' => 'required | min:18',
            'basic_price' => 'required',
            'basic_delivery' => 'required',
            'silver_short_des' => 'required',
            'silver_brief_des' => 'required',
            'silver_price' => 'required',
            'silver_delivery' => 'required',
            'gold_short_des' => 'required',
            'gold_brief_des' => 'required',
            'gold_price' => 'required',
            'gold_delivery' => 'required'
        ]);
        $gig = new Gig;
        $gig->title = $request->title;
        $gig-> basic_short_description = $request->basic_short_des;
        $gig->silver_short_description = $request->silver_short_des;
        $gig->gold_short_description = $request->gold_short_des;

        $gig->basic_long_description = $request->basic_brief_des;
        $gig->silver_brief_description = $request->silver_brief_des;
        $gig->gold_brief_description = $request->gold_brief_des;

        $gig->price1 = $request->basic_price;
        $gig->price2 = $request->silver_price;
        $gig->price3 = $request->gold_price;

        $gig->delivery_time1 = $request->basic_delivery;
        $gig->delivery_time2 = $request->silver_delivery;
        $gig->delivery_time3 = $request->gold_delivery;

        $gig->ip = \Request::ip();
        $gig->address = $request->address;
        if($request->category=='other'){
            $gig->category_id = -100;
        }else{
            $gig->category_id = $request->category;
        }
       
        $user = Auth::guard('admin')->user();
       // return $user->user_type;
        if ($user->user_type == 3) {
            $gig->type = 0;
            $freelancer = Freelancer::where('user_id', $user->id)->first();
        } 
        if($user->user_type == 4) {
            $gig->type = 1;
            $freelancer = Pro::where('user_id', $user->id)->first();
           // return $freelancer;
        }

        $gig->freelancer_id = $freelancer->id;
        $gig->save();
        if ($request->hasFile('image1')) {

            $image = $request->file('image1');

            $filename = time().'.'.$image->getClientOriginalExtension();

            $location = public_path('/uploads/gig/');

            // Image::make($image)->save($location);
            $image->move($location, $filename);
            //    return 'hi';
            // $product->image = $filename;
            $image = new Image;
            $image->item_id=$gig->id;
            $image->type=$user->user_type;
            $image->image = $filename;
            $image->save();
        }
        if ($request->hasFile('image2')) {

            $image = $request->file('image2');

            $filename = time().'.'.$image->getClientOriginalExtension();

            $location = public_path('/uploads/gig/');

            // Image::make($image)->save($location);
            $image->move($location, $filename);
            //    return 'hi';
            // $product->image = $filename;
            $image = new Image;
            $image->item_id=$gig->id;
            $image->type=$user->user_type;
            $image->image = $filename;
            $image->save();
        }
        if ($request->hasFile('image3')) {

            $image = $request->file('image3');

            $filename = time().'.'.$image->getClientOriginalExtension();

            $location = public_path('/uploads/gig/');

            // Image::make($image)->save($location);
            $image->move($location, $filename);
            //    return 'hi';
            // $product->image = $filename;
            $image = new Image;
            $image->item_id=$gig->id;
            $image->type=$user->user_type;
            $image->image = $filename;
            $image->save();
        }
        if($request->skill1){
            $skill= new SkillDetails;
            if($request->skill1=='other'){
                $skill->skill_id = -100;
            }else{
                $skill->skill_id = $request->skill1;
            }
           
            $skill->user_id=$user->id;
            $skill->percentage=90;
            $skill->save();
        }
        if($request->skill2){
            $skill= new SkillDetails;
            if ($request->skill2 == 'other') {
                $skill->skill_id = -100;
            } else {
                $skill->skill_id = $request->skill2;
            }
            $skill->user_id=$user->id;
            $skill->percentage=90;
            $skill->save();
        }
        if($request->skill3){
            $skill= new SkillDetails;
            if ($request->skill3 == 'other') {
                $skill->skill_id = -100;
            } else {
                $skill->skill_id = $request->skill3;
            }
            $skill->user_id=$user->id;
            $skill->percentage=90;
            $skill->save();
        }
        if($request->skill4){
            $skill= new SkillDetails;
            if ($request->skill4 == 'other') {
                $skill->skill_id = -100;
            } else {
                $skill->skill_id = $request->skill4;
            }
            $skill->user_id=$user->id;
            $skill->percentage=90;
            $skill->save();
        }
        if($request->skill5){
            $skill= new SkillDetails;
            if ($request->skill5 == 'other') {
                $skill->skill_id = -100;
            } else {
                $skill->skill_id = $request->skill5;
            }
            $skill->user_id=$user->id;
            $skill->percentage=90;
            $skill->save();
        }

       Session::flash('message','Your Gig has been succefuly created');
       return Redirect::to('Gig/mygigs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gig  $gig
     * @return \Illuminate\Http\Response
     */
    public function show(Gig $gig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gig  $gig
     * @return \Illuminate\Http\Response
     */
    public function edit(Gig $gig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gig  $gig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gig $gig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gig  $gig
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gig $gig)
    {
        //
    }
}
