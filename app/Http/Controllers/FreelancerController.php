<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Education;
use App\Experience;
use App\Location;
use App\Qualification;
use App\Skill;
use App\SkillDetails;
use App\Freelancer;
use App\Pro;
use App\User;
use App\UserInfo;
use App\Social;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\LanguageDetails;
use Validator;
use Auth;

class FreelancerController extends Controller
{
    public function getCities(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $locations = Location::getLocations($request->id)->get();
        if (count($locations) > 0) {
            return response(['status' => "success", 'data' => $locations]);
        } else {
            return response(['status' => "error", 'data' => []]);
        }
    }

    public function getFreelancer()
    {
        $response = [
            'locations' => Location::get(),
            'categories' => Category::get(),
            'freelancers' => User::where('user_type',3)->paginate(30),
        ];

        return view('_html.freelancer.freelancer')->with($response);
    }
    

    public function getFreelancerAjax(Request $request)
    {
        if ($request->ajax()) {
            $response['freelancers'] = User::where('user_type', 3)->paginate(3);
            return view('_html.ajax.ajaxFreelancer')->with($response);
        }
    }

    public function Worker_Details($id)
    {
        $user = User::find(base64_decode(urldecode($id)));
        return view('_html.freelancer.freelancerDetails', compact('user'));
    }

    public function createProfile()
    {
        $data = [
            'categories' => Category::getUserCategories()->get(),
            'countries' => Country::get(),
            'qualifications' => Qualification::where('status', '=', 1)->get(),
            'skills' => Skill::where('status', '=', 1)->get(),
        ];

        return view('_html.freelancer.freelancerCreate', ['data' => $data]);
    }

    public function editProfile(Request $request)
    {
     //  return $request;
       $this->validate($request,[
           'long_description' => 'required',
           'short_description' => 'required'
       ]);

    
        $user = Auth::guard('admin')->user();
        if($user->user_type==3){
            $freelancer=Freelancer::where('user_id',$user->id)->first();
        }elseif($user->user_type==4){
            $freelancer=Pro::where('user_id',$user->id)->first();
        }
       
        $freelancer->short_description = $request->short_description;
        $freelancer->long_description = $request->long_description;

       
        if($request->address){
            $freelancer->address =  $request->address;
        }
        if( $request->country){
            $freelancer->country_code = $request->country ;
        }
        if($request->gender){
            $freelancer->gender=$request->gender;
        }
        if($request->birthday){
            $freelancer->birthday=$request->birthday;
        }
        if($request->hourly_rate){
            $freelancer->hourly_rate=$request->hourly_rate;
        }
        if($request->availability){
            $freelancer->availability=$request->availability;
        }
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $location = public_path('/uploads/user/');

            // Image::make($image)->save($location);
            $file->move($location, $filename);

            $freelancer->profile_image=$filename;
        }
        $freelancer->save();
        if($request->facebook){
            $social=Social::where('user_id',$user->id)->where('user_type',2)->where('name','facebook')->first();
            if( $social){
                $social->url=$request->facebook;
                $social->save();
            }else{
                $social= new Social;
                $social->name='facebook';
                $social->user_type=2;
                $social->user_id=$user->id;
                $social->url=$request->facebook;
                $social->save();
            }
        }
        if($request->google){
            $social=Social::where('user_id',$user->id)->where('user_type',2)->where('name','google')->first();
            if( $social){
                $social->url=$request->google;
                $social->save();
            }else{
                $social= new Social;
                $social->name='google';
                $social->user_type=2;
                $social->user_id=$user->id;
                $social->url=$request->google;
                $social->save();
            }
        }
        if($request->twitter){
            $social=Social::where('user_id',$user->id)->where('user_type',2)->where('name','twitter')->first();
            if( $social){
                $social->url=$request->twitter;
                $social->save();
            }else{
                $social= new Social;
                $social->name='twitter';
                $social->user_type=2;
                $social->user_id=$user->id;
                $social->url=$request->twitter;
                $social->save();
            }
        }
        if($request->linkedin){
            $social=Social::where('user_id',$user->id)->where('user_type',2)->where('name','linkedin')->first();
            if( $social){
                $social->url=$request->linkedin;
                $social->save();
            }else{
                $social= new Social;
                $social->name='linkedin';
                $social->user_type=2;
                $social->user_id=$user->id;
                $social->url=$request->linkedin;
                $social->save();
            }
        }
        

        //Insert to educations tb
        if (!empty($request->school_name) && !empty($request->school_name[0])) {
           
            foreach ($request->school_name as $k => $val) {
                $check=Education::where('user_id',$user->id)->where('school_name',$request->school_name)->count();
                if($check>0){
                    $education = Education::where('user_id', $user->id)->where('school_name', $request->school_name)->first();
                    $education->user_id = $user->id;
                    $education->school_name = $val;
                    $education->qualification_id = $request->qualification_id[$k];
                    $education->start_date = $request->edu_from_date[$k];
                    $education->end_date = $request->edu_to_date[$k];
                    $education->note = $request->edu_note[$k];
                    $education->updated_at = date('Y-m-d H:i:s');
                    $education->save();
                }
                else{
                    $education = new Education;
                    $education->user_id = $user->id;
                    $education->school_name = $val;
                    $education->qualification_id = $request->qualification_id[$k];
                    $education->start_date = $request->edu_from_date[$k];
                    $education->end_date = $request->edu_to_date[$k];
                    $education->note = $request->edu_note[$k];
                    $education->created_at = date('Y-m-d H:i:s');
                    $education->save();
                }
               
            }
        }
        if (!empty($request->language) && !empty($request->language[0])) {
           
            foreach ($request->language as $k => $val) {
                $check=LanguageDetails::where('user_id',$user->id)->where('language_id', $val)->count();
                if($check>0){
                    // $education = LanguageDetails::where('user_id', $user->id)->where('language_id', $request->language)->first();
                    // $education->user_id = $user->id;
                    // $education->school_name = $val;
                    // $education->qualification_id = $request->qualification_id[$k];
                    // $education->start_date = $request->edu_from_date[$k];
                    // $education->end_date = $request->edu_to_date[$k];
                    // $education->note = $request->edu_note[$k];
                    // $education->updated_at = date('Y-m-d H:i:s');
                    // $education->save();
                }
                else{
                    $language = new LanguageDetails;
                    $language->user_id = $user->id;
                    $language->language_id = $val;

                    $language->created_at = date('Y-m-d H:i:s');
                    $language->save();
                }
               
            }
        }

        //Insert to experiences tb
        if (!empty($request->exp_employee) && !empty($request->exp_employee[0])) {
            foreach ($request->exp_employee as $k => $val) {
                $check = Experience::where('user_id', $user->id)->where('institution', $val)->where('position', $request->exp_position[$k])->count();
                if ($check > 0) {
                    $experience = Experience::where('user_id', $user->id)->where('institution', $val)->where('position', $request->exp_position[$k])->first();
                    $experience->user_id = $user->id;
                    $experience->institution = $val;
                    $experience->position = $request->exp_position[$k];
                    $experience->start_date = $request->exp_start[$k];
                    $experience->end_date = $request->exp_end[$k];
                    $experience->note = $request->exp_note[$k];
                    $experience->updated_at = date('Y-m-d H:i:s');
                    $experience->save();
                }
                else{
                    $experience = new Experience;
                    $experience->user_id = $user->id;
                    $experience->institution = $val;
                    $experience->position = $request->exp_position[$k];
                    $experience->start_date = $request->exp_start[$k];
                    $experience->end_date = $request->exp_end[$k];
                    $experience->note = $request->exp_note[$k];
                    $experience->created_at = date('Y-m-d H:i:s');
                    $experience->save();
                }
                
            }
        }

        //Insert to Skill_details tb
        if (!empty($request->skill) && !empty($request->skill[0])) {
            foreach ($request->skill as $k => $val) {
                $check = SkillDetails::where('user_id', $user->id)->where('skill_id', $val)->count();
                if ($check > 0) {
                   
                    $skill = SkillDetails::where('user_id', $user->id)->where('skill_id', $val)->first();
                    $skill->user_id = $user->id;
                    $skill->skill_id = $val;
                    $skill->percentage = $request->skill_percentage[$k];
                    $skill->updated_at = date('Y-m-d H:i:s');
                    $skill->save();
                }
                else{
                    $skill = new SkillDetails;
                    $skill->user_id = $user->id;
                    $skill->skill_id = $val;
                    $skill->percentage = $request->skill_percentage[$k];
                    $skill->created_at = date('Y-m-d H:i:s');
                    $skill->save();
                }
               
            }
        }

        Session::put('message','Edit Successful');
        return 'success';
    }
    public function freelancer_edit_profile($id){
        $id=base64_decode(urldecode($id));
        return view('_html.freelancer.freelancer_edit_profile')->with('id',$id);
    }
    public function personal_review($id){
        $id= base64_decode(urldecode($id));
        if(Auth::guard('admin')->user()->user_type==3){
            return view('_html.freelancer.personal_review')->with('id', $id);
        }
        if(Auth::guard('admin')->user()->user_type==4){
            return view('_html.pro.personal_review')->with('id', $id);
        }
       
    }
}
