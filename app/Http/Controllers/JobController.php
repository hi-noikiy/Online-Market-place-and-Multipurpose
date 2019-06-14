<?php

namespace App\Http\Controllers;

use App\Apply;
use App\Category;
use App\Company;
use App\Country;
use App\Experience;
use App\Location;
use App\Project;
use App\Qualification;
use App\Skill;
use App\SkillDetails;
use App\Customer; 
use App\All_user;
use App\Job;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use App\ProFreeOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
use Session;

class JobController extends Controller
{
    public function myJob()
    {
       
       $user=Auth::guard('admin')->user();
       $customer=Customer::where('user_id',$user->id);

       
       
            $data = [
                'activeJobs' => ProFreeOrder::where('status',0)->where('customer_id',$user->id)->paginate(2),              
                'completeJobs' => ProFreeOrder::where('status', 1)->where('customer_id', $user->id)->paginate(2),
                'cancelJobs' => ProFreeOrder::where('status', 5)->where('customer_id', $user->id)->paginate(2),
                'revisionJobs' =>  ProFreeOrder::where('status', 2)->where('customer_id', $user->id)->paginate(2),
                'disputeJobs' =>  ProFreeOrder::where('status', 4)->where('customer_id', $user->id)->paginate(2),
            ];
            // print_r($data['activeJobs']);
            // exit();
            return view('_html.customer.myJob', ['data' => $data]);
        

    }

    public function getJobSeekerAppliedJobAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['appliedJobs'] = Apply::getAppliedJobs()->paginate(1);
            return view('_html.ajax.ajaxJobSeekerAppliedJob', ['data' => $data]);
        }
    }

    public function getJobSeekerMatchJobAjax(Request $request)
    {
        //Get user details
        $userDetails = UserInfo::where('user_id', '=', Auth::id())->first();
        $skill_ids = json_decode($userDetails->skill_ids);
        if ($request->ajax()) {
            $data['matchJobs'] = Project::getMatchJobs($userDetails)->paginate(1);
            return view('_html.ajax.ajaxJobSeekerMatchJob', ['data' => $data]);
        }
    }
    
    public function getJobSeekerInvitationJobAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['invitationJobs'] = Apply::getInvitationJobs()->paginate(1);
            return view('_html.ajax.ajaxJobSeekerInvitationJob', ['data' => $data]);
        }
    }

    public function getActiveJobAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['activeJobs'] = Apply::getActiveJobs()->paginate(2);
            return view('_html.ajax.ajaxActiveJob', ['data' => $data]);
        }
    }

    public function getPendingJobAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['pendingJobs'] = Apply::getPendingjobs()->paginate(2);
            return view('_html.ajax.ajaxPendingJob', ['data' => $data]);
        }
    }

    public function getCompleteJobAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['completeJobs'] = Apply::getCompletejobs()->paginate(2);
            return view('_html.ajax.ajaxCompleteJob', ['data' => $data]);
        }
    }

    public function getCancelJobAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['cancelJobs'] = Apply::getCalceljobs()->paginate(2);
            return view('_html.ajax.ajaxCancelJob', ['data' => $data]);
        }
    }

    public function getRivisionJobAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['revisionJobs'] = Apply::getRevisionjobs()->paginate(2);
            return view('_html.ajax.ajaxRevisionJob', ['data' => $data]);
        }
    }

    public function getDisputeJobAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['disputeJobs'] = Apply::getDisputejobs()->paginate(2);
            return view('_html.ajax.ajaxDisputeJob', ['data' => $data]);
        }
    }

    public function createCompany()
    {
        $data = [
            'categories' => Category::getUserCategories()->get(),
            'countries' => Country::get(),
            'qualifications' => Qualification::where('status', '=', 1)->get(),
            'skills' => Skill::where('status', '=', 1)->get(),
        ];

        return view('_html.job.jobCompany', ['data' => $data]);
    }

    public function addCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        DB::beginTransaction();

        //Insert to users tb
        $user = new User;
        $user->name = $request->company_name;
        $user->mobile = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->newPassword);
        $user->user_type = 6; //Company
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
        $userInfo->skill_ids = (!empty($request->skill) ? json_encode($request->skill) : null);
        $userInfo->location = $request->city;
        $userInfo->country = $request->country;
        $userInfo->created_at = date('Y-m-d H:i:s');
        if (!$userInfo->save()) {
            DB::rollBack();
            return response(['status' => "error", 'message' => "User info insert failed"]);
        }

        //Insert to company tb
        $company = new Company;
        $company->user_id = $user_id;
        $company->tag = $request->tag;
        $company->category_id = $request->category;
        $company->ceo_name = $request->category;
        $company->about_company = $request->about_company;
        $company->created_at = date('Y-m-d H:i:s');
        if (!$company->save()) {
            DB::rollBack();
            return response(['status' => "error", 'message' => "Company info insert failed"]);
        }

        DB::commit();
        return response(['status' => "success", 'message' => "Company create successfully"]);
    }

    public function createJob()
    {
        // $data = [
        //     'categories' => Category::getUserCategories()->get(),
        //     'countries' => Country::get(),
        //     'qualifications' => Qualification::where('status', '=', 1)->get(),
        //     'skills' => Skill::where('status', '=', 1)->get(),
        // ];

        // return view('_html.job.jobCreate', ['data' => $data]);
        return view('_html.customer.create_job');
    }

    public function saveJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'type' => 'required',
            'category' => 'required',
            'min' => 'required',
            'max'=>'required',
            'jobpro'=>'required',
            'skill1'=>'required',
            
            'duration' => 'required',
           
           
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $job = new Job;
        $job->title = $request->title;
        $job->job_category_id = $request->category;
        $job->duration = $request->duration;
        $job->max = $request->max;
        $job->description = $request->description;
      //  $job->skill_ids = json_encode($request->skills);
        $job->min = $request->min;
       // $job->experience = $request->experience;
        $job->type = $request->type; //Job
        // $job->user_type = $request->freelancer_type;
       
        $job->Location = $request->address;
      //  $job->country = $request->country;
        $job->jobpro = $request->jobpro;
        $user=Auth::guard('admin')->user();
        $customer=Customer::where('user_id',$user->id)->first();
        $job->customer =$customer->id;
        $job->created_at = date('Y-m-d H:i:s');
        if($request->hasFile('file')){
            $file = $request->file( 'file');

            $filename = time().'.'.$file->getClientOriginalExtension();

            $location = public_path('/uploads/file/');

            // Image::make($image)->save($location);
            $file->move($location, $filename);
            //    return 'hi';
            // $product->image = $filename;
            // $image = new Image;

            // $image->image = $filename;
            // $image->save();
            $job->file=$filename;
        }
        
        $job->save();
        if ($request->skill1) {
            $skill_details = new SkillDetails;
            $skill_details->user_id = -10;  //-10 -> this is not a personal user;
            $skill_details->item_type = $request->jobpro;
            $skill_details->item_id = $job->id;
            $skill_details->skill_id = $request->skill1;
            $skill_details->save();
        }
        if ($request->skill2) {
            $skill_details = new SkillDetails;
            $skill_details->user_id = -10;  //-10 -> this is not a personal user;
            $skill_details->item_type = $request->jobpro;
            $skill_details->item_id = $job->id;
            $skill_details->skill_id = $request->skill2;
            $skill_details->save();
        }
        if ($request->skill3) {
            $skill_details = new SkillDetails;
            $skill_details->user_id = -10;  //-10 -> this is not a personal user;
            $skill_details->item_type = $request->jobpro;
            $skill_details->item_id = $job->id;
            $skill_details->skill_id = $request->skill3;
            $skill_details->save();
        }
        if ($request->skill4) {
            $skill_details = new SkillDetails;
            $skill_details->user_id = -10;  //-10 -> this is not a personal user;
            $skill_details->item_type = $request->jobpro;
            $skill_details->item_id = $job->id;
            $skill_details->skill_id = $request->skill4;
            $skill_details->save();
        }
        if ($request->skill5) {
            $skill_details = new SkillDetails;
            $skill_details->user_id = -10;  //-10 -> this is not a personal user;
            $skill_details->item_type = $request->jobpro;
            $skill_details->item_id = $job->id;
            $skill_details->skill_id = $request->skill5;
            $skill_details->save();
        }
        Session::put('message','Successfull');

        return redirect( '/customer-dash');
    }

    public function CreateResume()
    {
        $data = [
            'categories' => Category::getUserCategories()->get(),
            'countries' => Country::get(),
            'qualifications' => Qualification::where('status', '=', 1)->get(),
            'skills' => Skill::where('status', '=', 1)->get(),
        ];

        return view('_html.job.jobResume', ['data' => $data]);
    }

    public function personal_order($id)
    {
        $id = base64_decode(urldecode($id));
        return view('_html.pro.personal_order')->with('id', $id);
    }

    public function findJobAjax(Request $request)
    {
        if ($request->ajax()) {
            //Search filter apply
            $where = [];
            if (!empty($request->keyword)) {
                $where[] = ['pro.title', 'like', "%{$request->keyword}%"];
            }

            if (!empty($request->category)) {
                $where[] = ['pro.category_id', '=', $request->category];
            }

            if (!empty($request->experience)) {
                if ($request->experience >= 4) {
                    $where[] = ['pro.experience', '>=', $request->experience];
                } else {
                    $where[] = ['pro.experience', '=', $request->experience];
                }
            }

            if (!empty($request->location)) {
                $where[] = ['pro.location', '=', $request->location];
            }

            if (!empty($request->budgetFrom)) {
                $where[] = ['pro.budget', '>=', $request->budgetFrom];
            }

            if (!empty($request->budgetTo)) {
                $where[] = ['pro.budget', '=<', $request->budgetTo];
            }

            $response = [
                'jobs' => Project::getJobs()->orderBy('id', 'desc')->paginate(2),
            ];

            return view('_html.ajax.ajaxJob')->with($response);

        }
    }

    public function JobDetails($id)
    {
        //$response = Project::jobDetails()->find(base64_decode(urldecode($id)));
        //$response->skills = getSkills($response->skill_ids);
        return view('_html.customer.view_job');
    }

    public function jobApply($id)
    {
        if (!Auth::check()) {
            return redirect()->route('Login');
        }

        $response = Project::jobDetails()->find(base64_decode(urldecode($id)));
        $response->skills = getSkills($response->skill_ids);
        $response->days = range(1, 15);
        return view('_html.job.jobApply', ['row' => $response]);
    }

    public function applyJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'cover_letter' => 'required',
            'amount' => 'required|numeric',
            'delivery_day' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        //Get project detais
        $project = Project::find($request->project_id);
        if (empty($project)) {
            return response(['status' => "error", 'message' => "Job not found"]);
        }

        //Check end date
        if ($project->end_date < date('Y-m-d')) {
            return response(['status' => "error", 'message' => "Job time is over"]);
        }

        //Check budget
        if ($project->budget < $request->amount) {
            return response(['status' => "error", 'message' => "Amount is bigger than budget"]);
        }

        //Check applied
        $is_apply = Apply::where([
            ['user_id', '=', Auth::id()],
            ['project_id', '=', $project->id],
            ['project_id', '=', $project->id],
        ])
            ->whereIn('status', [1, 2])
            ->first();

        if (!empty($is_apply)) {
            return response(['status' => "error", 'message' => "You already applied this job"]);
        }

        $apply = new Apply;
        $apply->user_id = Auth::id();
        $apply->project_id = $project->id;
        $apply->cover_letter = $request->cover_letter;
        $apply->amount = $request->amount;
        $apply->delivery_date = date('Y-m-d', strtotime(date('Y-m-d') . "+$request->delivery_day days"));
        $apply->created_at = date('Y-m-d H:i:s');
        if ($apply->save()) {
            return response(['status' => "success", 'message' => "Job apply successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Job apply failed"]);
        }
    }

    //Old function
    public function index()
    {
        $where = [
            ['pro.type', '=', 2],
        ];

        //Auth check
        if (!empty(Auth::id()) && Auth::id() != 2) {
            $where[] = ['pro.created_by', '=', Auth::id()];
        }

        $data = [
            'categories' => Category::get(),
            'locations' => Location::get(),
            'data' => DB::table('projects as pro')->select('pro.id', 'pro.title', 'pro.end_date', 'pro.description', 'pro.status', 'pro.freelancer_type', 'pro.job_price')
                ->addSelect('loc.name as location')
                ->join('locations as loc', 'pro.location', '=', 'loc.id')
                ->where($where)
                ->orderBy('pro.id', 'desc')
                ->paginate(10),
        ];

        return view('_html.jobs', ['data' => $data]);
    }

    public function read(Request $request)
    {
        if ($request->ajax()) {

            $where = [
                ['pro.type', '=', 2],
            ];

            //Auth check
            if (!empty(Auth::id()) && Auth::id() != 2) {
                $where[] = ['pro.created_by', '=', Auth::id()];
            }

            $data['data'] = DB::table('projects as pro')->select('pro.id', 'pro.title', 'pro.end_date', 'pro.description', 'pro.status', 'pro.freelancer_type', 'pro.job_price')
                ->addSelect('loc.name as location')
                ->join('locations as loc', 'pro.location', '=', 'loc.id')
                ->where($where)
                ->orderBy('pro.id', 'desc')
                ->paginate(10);

            return view('_html.ajax.jobs', ['data' => $data])->render();
        }
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jobTitle' => 'required',
            'jobCat' => 'required',
            'jobType' => 'required',
            'endDate' => 'required',
            'location' => 'required',
            'jobSalary' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $project = new Project;
        $project->title = $request->jobTitle;
        $project->category_id = $request->jobCat;
        $project->end_date = (date('Y-m-d', strtotime($request->endDate)));
        $project->location = $request->location;
        $project->job_price = $request->jobSalary;
        $project->job_type = $request->jobType;
        $project->type = 2;
        $project->status = 1;
        $project->description = $request->description;
        $project->created_by = Auth::id();
        $project->created_at = date('Y-m-d H:i:s');

        if ($project->save()) {
            return response(['status' => "success", 'message' => "Job Save Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Job Save Failed"]);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'jobTitle' => 'required',
            'jobCat' => 'required',
            'jobType' => 'required',
            // 'endDate' => 'required|date|date_format:m/d/Y',
            'endDate' => 'required',
            'location' => 'required',
            'jobSalary' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $project = Project::find($request->id);
        $project->title = $request->jobTitle;
        $project->category_id = $request->jobCat;
        $project->end_date = (date('Y-m-d', strtotime($request->endDate)));
        $project->location = $request->location;
        $project->job_price = $request->jobSalary;
        $project->job_type = $request->jobType;
        $project->status = $request->publicationStatus;
        $project->description = $request->description;
        $project->updated_at = date('Y-m-d H:i:s');

        if ($project->save()) {
            return response(['status' => "success", 'message' => "Job Save Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Job Save Failed"]);
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $project = Project::find($request->id);
        if ($project->delete()) {
            return response(['status' => "success", 'message' => "Job Delete Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Job Delete Failed"]);
        }

    }

}
