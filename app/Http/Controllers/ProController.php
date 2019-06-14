<?php

namespace App\Http\Controllers;

use App\User;
use App\Skill;
use App\Country;
use App\Category;
use App\Location;
use App\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Job;
use Session;
use Auth;
use PDF;
use Validator;
use App\Pro;
use App\Cv;
use App\CvProject;
use App\Interest;
class ProController extends Controller
{
    public function getPro()
    {
        $response = [
            'locations' => Location::get(),
            'categories' => Category::get(),
            'pros' => User::where('user_type', 4)->paginate(30),
        ];

        return view('_html.pro.pro')->with($response);

    }

    public function getProAjax(Request $request)
    {

        if ($request->ajax()) {          
            $response = [
                'pros' => User::where('user_type', 4)->paginate(30),
            ];
            
            return view('_html.ajax.ajaxPro')->with($response);

        }
    }

    public function proDetails($id)
    {
        $row = User::UserDetails()->find(base64_decode(urldecode($id)));
        return view('_html.pro.proDetails', compact('row'));
    }
    public function findjob(){
        $response = [
            'locations' => Location::get(),
            'categories' => Category::get(),
            'projects' => Job::where('jobpro', 1)->paginate(15),
        ];

        return view('_html.project.proproject', ['response' => $response]);
    }
    public function createProfile()
    {
        $data = [
            'categories' => Category::getUserCategories()->get(),
            'countries' => Country::get(),
            'qualifications' => Qualification::where('status', '=', 1)->get(),
            'skills' => Skill::where('status', '=', 1)->get(),
        ];

        return view('_html.pro.proCreate', ['data' => $data]);
    }
    
    public function export_pdt($id){
        $id=\base64_decode($id);
        $data = array('id'=>$id);
        $pdf = PDF::loadView( '_html.pro.cvPdf',compact('data'));
        return $pdf->download( '_html.pro.cvPdf');
    }

    public function pro_personal_cv($id)
    {
        $id=\base64_decode($id);
        $user=User::find($id);
        return view('_html.pro.cv_create')->with('user', $user);
    }
    public function save_cv_cover_image(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }
        $user=Auth::guard('admin')->user();
        $pro=Pro::where('user_id',$user->id)->first();
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $location = public_path('/uploads/user/');

            // Image::make($image)->save($location);
            $file->move($location, $filename);
            $cv=Cv::where('user_id',$user->id)->first();
            if($cv){
                $cv->cover_pic = $filename;
                $cv->save();
            }else{
                $cv = new Cv;
                $cv->cover_pic = $filename;
                $cv->user_id=$user->id;
                $cv->profile_pic=$pro->profile_image;
                $cv->save();
            }
           Session::flash( 'successmessage',' Pro CV cover changed');
        }
        return redirect()->back();
    }
    public function pro_cv($id){
        $id=base64_decode($id);
        $user=User::find($id);
        return view('_html.pro.cv')->with('user',$user);
    }
    public function edit_cv($id){
        $id = base64_decode($id);
        $user = User::find($id);
        return view('_html.pro.edit_cv')->with('user',$user);
    }
    public function pro_create_cv(Request $request){

        $user = Auth::guard('admin')->user();
        $pro = Pro::where('user_id', $user->id)->first();
        $cv = new Cv;
              
        $cv->user_id = $user->id;
        $cv->profile_pic = $pro->profile_image;
        $cv->save();
        if (!empty($request->project_title) && !empty($request->project_title[0])) {
            foreach ($request->project_title as $k => $val) {
                $project = new CvProject;
                $project->cv_id = $cv->id;
                $project->tytle = $request->project_title[$k];
               
                $project->start_date = $request->project_from_date[$k];
                $project->end_date = $request->project_to_date[$k];
                $project->description = $request->project_description[$k];
                if($request->project_skill[$k]){
                    $project->skills_required=$request->project_skill[$k];
                }
                if($request->project_link[$k]){
                    $project->link=$request->project_link[$k];
                }
                if($request->project_supervisor[$k]){
                    $project->supervisor=$request->project_supervisor[$k];
                }
                if($request->project_type[$k]){
                    $project->type=$request->project_type[$k];
                }
               
                $project->created_at = date('Y-m-d H:i:s');
                $project->save();
               
            }
        }
        if (!empty($request->interest) && !empty($request->interest[0])) {
            foreach ($request->interest as $k => $val) {
                $interest = new Interest;
                $interest->user_id = $user->id;
                $interest->name = $request->interest[$k];

                $interest->details = $request->interest_details[$k];
                
               $interest->save();
            }
        }
        Session::flash('successmessage','CV created successfully');
        return redirect()->back();
    }
    public function edit_cv_save(Request $request,$id){
       $id=base64_decode($id); 
       $cv=Cv::find($id);
       $user=Auth::guard('admin')->user();
       if($cv->user_id== $user->id){
            if (!empty($request->interest) && !empty($request->interest[0])) {
                foreach ($request->interest as $k => $val) {
                    $check=Interest::where('user_id',$user->id)->where('name',$request->interest[$k])->first();
                    if(!$check){
                        $interest = new Interest;
                        $interest->user_id = $user->id;
                        $interest->name = $request->interest[$k];

                        $interest->details = $request->interest_details[$k];

                        $interest->save();
                    }
                    
                }
            }
            if (!empty($request->project_title) && !empty($request->project_title[0])) {
                foreach ($request->project_title as $k => $val) {
                    $check=App\CvProject::where('tytle', $request->project_title[$k])->first();
                    if(!$check){
                        $project = new CvProject;
                        $project->cv_id = $cv->id;
                        $project->tytle = $request->project_title[$k];

                        $project->start_date = $request->project_from_date[$k];
                        $project->end_date = $request->project_to_date[$k];
                        $project->description = $request->project_description[$k];
                        if ($request->project_skill[$k]) {
                            $project->skills_required = $request->project_skill[$k];
                        }
                        if ($request->project_link[$k]) {
                            $project->link = $request->project_link[$k];
                        }
                        if ($request->project_supervisor[$k]) {
                            $project->supervisor = $request->project_supervisor[$k];
                        }
                        if ($request->project_type[$k]) {
                            $project->type = $request->project_type[$k];
                        }

                        $project->created_at = date('Y-m-d H:i:s');
                        $project->save();
                    }
                   
                }
            }
            Session::flash('successmessage','successful');
            return redirect()->back();
       }else{
           return 'you do not have permission to edit this';
       }
    }
    public function addProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        DB::beginTransaction();

        //Insert to users tb
        $user = new User;
        $user->name = $request->name;
        $user->mobile = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->newPassword);
        $user->user_type = 4; //Pro
        $user->status = 1;
        $user->created_by_ip = \Request::ip();
        $user->created_at = date('Y-m-d H:i:s');
        if (!$user->save()) {
            DB::rollBack();
            return response(['status' => "error", 'message' => "User data insert failed"]);
        }

        $user_id = $user->id;
        //Insert to user_infos tb
        $userInfo = new UserInfo;
        $userInfo->user_id = $user_id;
        $userInfo->designation = $request->professionTitle;
        $userInfo->note = $request->note;
        // $userInfo->gender = ;
        $userInfo->skill_ids = json_encode($request->skill);
        $userInfo->location = $request->city;
        $userInfo->country = $request->country;
        $userInfo->created_at = date('Y-m-d H:i:s');
        if (!$userInfo->save()) {
            DB::rollBack();
            return response(['status' => "error", 'message' => "User info insert failed"]);
        }

        //Insert to educations tb
        if (!empty($request->school_name) && !empty($request->school_name[0])) {
            foreach ($request->school_name as $k => $val) {
                $education = new Education;
                $education->user_id = $user_id;
                $education->school_name = $val;
                $education->qualification_id = $request->qualification_id[$k];
                $education->start_date = $request->edu_from_date[$k];
                $education->end_date = $request->edu_to_date[$k];
                $education->note = $request->edu_note[$k];
                $education->created_at = date('Y-m-d H:i:s');
                if (!$education->save()) {
                    DB::rollBack();
                    return response(['status' => "error", 'message' => "Education info insert failed"]);
                }
            }
        }

        //Insert to experiences tb
       if (!empty($request->exp_employee) && !empty($request->exp_employee[0])) {
            foreach ($request->exp_employee as $k => $val) {
                $experience = new Experience;
                $experience->user_id = $user_id;
                $experience->institution = $val;
                $experience->position = $request->exp_position[$k];
                $experience->start_date = $request->exp_start[$k];
                $experience->end_date = $request->exp_end[$k];
                $experience->note = $request->exp_note[$k];
                $experience->created_at = date('Y-m-d H:i:s');
                if (!$experience->save()) {
                    DB::rollBack();
                    return response(['status' => "error", 'message' => "Experience info insert failed"]);
                }
            }
        }

        //Insert to Skill_details tb
        if (!empty($request->skill) && !empty($request->skill[0])) {
            foreach ($request->skill as $k => $val) {
                $skill = new SkillDetails;
                $skill->user_id = $user_id;
                $skill->skill_id = $val;
                $skill->percentage = $request->skill_percentage[$k];
                $skill->created_at = date('Y-m-d H:i:s');
                if (!$skill->save()) {
                    DB::rollBack();
                    return response(['status' => "error", 'message' => "Skill info insert failed"]);
                }
            }
        }

        DB::commit();
        return response(['status' => "success", 'message' => "Pro info save successfully"]);
    }
}
