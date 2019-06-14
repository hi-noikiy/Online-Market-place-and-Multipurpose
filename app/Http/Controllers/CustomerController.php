<?php

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use App\Project;
use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\ProFreeOrder;
use App\FreelancerProjectProposal;
use App\ProProjectProposal;
use Session;
use App\Job;
use App\FreelancerOrderReport;
use App\LanguageDetails;
use Illuminate\Contracts\Encryption\DecryptException;

class CustomerController extends Controller
{

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

            return view('_html.customerProject', ['data' => $data]);
    }

    public function read(Request $request)
    {

        if ($request->ajax()) {

            /*$where = [
                ['pro.type', '=', 2],
            ];*/
    
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
            return view('_html.ajax.customerProject', ['data' => $data])->render();
        }
    }
    public function response_to_notification($id)
    {
        $id=base64_decode($id);
        $notification=FreelancerOrderReport::find($id);
        $order=App\ProFreeOrder::find($notification->order_id);
        return view('_html.customer.notification')->with('notification',$notification)->with('order',$order);
    }

    public function getSingleRow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $singleRow = Project::find($request->id)->toArray();

        if (count($singleRow) > 0) {
            $singleRow['end_date'] = (date('m/d/Y', strtotime($singleRow['end_date'])));
            return response(['status' => "success", 'message' => "Data found", 'data' => $singleRow]);
        } else {
            return response(['status' => "error", 'message' => "Data not found"]);
        }
    }

    public function getProfileInfo()
    {
        $profileById = DB::table('users')
            ->select('users.*', 'user_infos.*')
            ->leftJoin('user_infos', 'user_infos.user_id', '=', 'users.id')
            ->where('users.id', Auth::id())
            ->first();

        return view('_html.profile')->with('profileById', $profileById);

    }

    public function updateProfileInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'physical_add' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        DB::beginTransaction();
        $users = array();
        $userId = $request->user_id;
        $users['name'] = $request->name;
        $users['name'] = $request->name;
        $users['mobile'] = $request->mobile;
        $users['updated_at'] = date('Y-m-d H:i:s');

        $user_update = DB::table('users')->where('id', $userId)->update($users);
        if (!$user_update) {
            DB::rollBack();
            return response(['status' => 'error', 'message' => "User update failed"]);
        }

        $userInfo = array();
        $userInfo['gender'] = $request->gender;
        $userInfo['physical_add'] = $request->physical_add;
        $userInfo['company_name'] = $request->company_name;
        $userInfo['tag_line'] = $request->tag_line;
        $userInfo['company_type'] = $request->company_type;
        $userInfo['company_category'] = $request->company_category;
        $userInfo['company_des'] = $request->company_des;
        $userInfo['updated_at'] = date('Y-m-d H:i:s');

        $user_info_update = DB::table('user_infos')->where('user_id', $userId)->update($userInfo);
        if (!$user_info_update) {
            DB::rollBack();
            return response(['status' => 'error', 'message' => "User details update failed"]);
        }

        DB::commit();
        return response(['status' => 'success', 'message' => "User update successfully",'data'=>$request->all()]);

    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'jobTitle' => 'required',
            'jobCat' => 'required',
            'freelancerType' => 'required',
            'endDate' => 'required|date|date_format:m/d/Y',
            'location' => 'required',
            'jobPrice' => 'required',
            'publicationStatus' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $project = Project::find($request->id);
        $project->title = $request->jobTitle;
        $project->category_id = $request->jobCat;
        $project->end_date = (date('Y-m-d', strtotime($request->endDate)));
        $project->location = $request->location;
        $project->job_price = $request->jobPrice;
        $project->freelancer_type = $request->freelancerType;
        $project->status = 1;
        $project->description = $request->description;
        $project->updated_at = date('Y-m-d H:i:s');
        if ($project->save()) {
            return response(['status' => "success", 'message' => "Project Update Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Project Update Failed"]);
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
            return response(['status' => "success", 'message' => "Project Delete Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Project Delete Failed"]);
        }

    }
    public function public_profile($id)
    {
        if(Auth::guard('admin')->check()){
            $id = base64_decode($id);
            $user = User::find($id);
            $customer = Customer::where('user_id', $user->id)->first();
            return view('_html.customer.public_view')->with('user', $user)->with('customer', $customer);
        }
       
    }
    public function customer_edit_profile($id)
    {
        if(Auth::guard('admin')->check()){
            $id=base64_decode($id);
            $user = User::find($id);
            $customer = Customer::where('user_id', $user->id)->first();
            return view('_html.customer.edit_profile')->with('user',$user)->with('customer',$customer);
        }else {
            return redirect()->back();
        }
    }
    public function editProfile(Request $request)
    {
        //  return $request;
        $this->validate($request, [
            'long_description' => 'required',
            'short_description' => 'required'
        ]);


        $user = Auth::guard('admin')->user();
        // if ($user->user_type == 2) {
        //     $freelancer = Freelancer::where('user_id', $user->id)->first();
        // } elseif ($user->user_type == 4) {
        //     $freelancer = Pro::where('user_id', $user->id)->first();
        // }
        $customer=Customer::where('user_id',$user->id)->first();

        $customer->short_description = $request->short_description;
        $customer->long_description = $request->long_description;


        if ($request->address) {
            $customer->address =  $request->address;
        }
        if ($request->country) {
            $customer->country_code =  $request->country;
        }
        if ($request->gender) {
            $customer->gender = $request->gender;
        }
        if ($request->birthday) {
            $customer->birthday = $request->birthday;
        }
        // if ($request->hourly_rate) {
        //     $freelancer->hourly_rate = $request->hourly_rate;
        // }
        if ($request->designation) {
            $customer->designation = $request->designation;
        }
        if ($request->zip) {
            $customer->zip = $request->zip;
        }
        if ($request->state) {
            $customer->state = $request->state;
        }
        $customer->save();
        if ($request->facebook) {
            $social = Social::where('user_id', $user->id)->where('user_type', 2)->where('name', 'facebook')->first();
            if ($social) {
                $social->url = $request->facebook;
                $social->save();
            } else {
                $social = new Social;
                $social->name = 'facebook';
                $social->user_type = 2;
                $social->user_id = $user->id;
                $social->url = $request->facebook;
                $social->save();
            }
        }
        if ($request->google) {
            $social = Social::where('user_id', $user->id)->where('user_type', 2)->where('name', 'google')->first();
            if ($social) {
                $social->url = $request->google;
                $social->save();
            } else {
                $social = new Social;
                $social->name = 'google';
                $social->user_type = 2;
                $social->user_id = $user->id;
                $social->url = $request->google;
                $social->save();
            }
        }
        if ($request->twitter) {
            $social = Social::where('user_id', $user->id)->where('user_type', 2)->where('name', 'twitter')->first();
            if ($social) {
                $social->url = $request->twitter;
                $social->save();
            } else {
                $social = new Social;
                $social->name = 'twitter';
                $social->user_type = 2;
                $social->user_id = $user->id;
                $social->url = $request->twitter;
                $social->save();
            }
        }
        if ($request->linkedin) {
            $social = Social::where('user_id', $user->id)->where('user_type', 2)->where('name', 'linkedin')->first();
            if ($social) {
                $social->url = $request->linkedin;
                $social->save();
            } else {
                $social = new Social;
                $social->name = 'linkedin';
                $social->user_type = 2;
                $social->user_id = $user->id;
                $social->url = $request->linkedin;
                $social->save();
            }
        }


        //Insert to educations tb
        if (!empty($request->school_name) && !empty($request->school_name[0])) {

            foreach ($request->school_name as $k => $val) {
                $check = Education::where('user_id', $user->id)->where('school_name', $request->school_name)->count();
                if ($check > 0) {
                    $education = Education::where('user_id', $user->id)->where('school_name', $request->school_name)->first();
                    $education->user_id = $user->id;
                    $education->school_name = $val;
                    $education->qualification_id = $request->qualification_id[$k];
                    $education->start_date = $request->edu_from_date[$k];
                    $education->end_date = $request->edu_to_date[$k];
                    $education->note = $request->edu_note[$k];
                    $education->updated_at = date('Y-m-d H:i:s');
                    $education->save();
                } else {
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
                } else {
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
        if (!empty($request->language) && !empty($request->language[0])) {
            foreach ($request->language as $k => $val) {
                $check = LanguageDetails::where('user_id', $user->id)->where( 'language_id', $val)->count();
                if ($check > 0) {

                    // $skill = SkillDetails::where('user_id', $user->id)->where('skill_id', $val)->first();
                    // $skill->user_id = $user->id;
                    // $skill->skill_id = $val;
                    // $skill->percentage = $request->skill_percentage[$k];
                    // $skill->updated_at = date('Y-m-d H:i:s');
                    // $skill->save();
                } else {
                    $language = new LanguageDetails;
                    $language->user_id = $user->id;
                    $language->language_id = $val;

                    $language->created_at = date('Y-m-d H:i:s');
                    $language->save();
                }
            }
        }

        Session::put('message', 'Edit Successful');
        return 'success';
    }
    public function request_on_job($id)
    {
        $id=base64_decode(urldecode($id));
        return view ( '_html.customer.applies')->with('id',$id);
    }
    public function proposal_accept(Request $request)
    {
        $p= $request->prosposal_id;
        $job_id = base64_decode($request->job_id);
        $proposal_id = base64_decode($p);
        //  $decrypted = base64_decode( $request->job_id);
       // return  $request;
      // return $job_id;
        $job=Job::find($job_id);
        if($job->jobpro==0){
            $proposal= FreelancerProjectProposal::find($proposal_id);
           
            $order = new ProFreeOrder;
            $order->customer_id=Auth::guard('admin')->user()->id;
            $order->price=$proposal->price;
            $order->freelancer_type=0;
            $order->freelancer_id=$proposal->user_id;
            $order->proposal_id=$proposal->id;
            $order->status=0;
            $order->delivery_time=$proposal->delivery_time;
            $order->save();
            $proposal->status=1;
            $proposal->save();
            
        }elseif($job->jobpro==1){
            $proposal = ProProjectProposal::find($proposal_id);
            $order = new ProFreeOrder;
            $order->customer_id = Auth::guard('admin')->user()->id;
            $order->price = $proposal->price;
            $order->freelancer_type = 1;
            $order->freelancer_id = $proposal->user_id;
            $order->proposal_id = $proposal->id;
            $order->status = 0;
            $order->delivery_time = $proposal->delivery_time;
            $order->save();
            $proposal->status = 1;
            $proposal->save();
        }
       Session::flash('reqmessage','Successful');
       return redirect()->back();


    }
    public function given_order($id)
    {
        $id=base64_decode(urldecode($id));
        $user=Auth::guard('admin')->user();
        $customer = Customer::where('user_id', $user->id);


            $data = [
                'activeJobs' => ProFreeOrder::where('customer_id', $customer->id)->where('status',0)->paginate(2),
               // 'pendingJobs' => Apply::getPendingJobs()->paginate(2),
                'completeJobs' => ProFreeOrder::where('customer_id', $customer->id)->where('status', 1)->paginate(2),
               // 'cancelJobs' => Apply::getCancelJobs()->paginate(2),
                'revisionJobs' => ProFreeOrder::where('customer_id', $customer->id)->where('status', 2)->paginate(2),
                'disputeJobs' => ProFreeOrder::where('customer_id', $customer->id)->where('status', 4)->paginate(2),
            ];
            // print_r($data['activeJobs']);
            // exit();
           // return view('_html.job.myJob', ['data' => $data]);
  
  
        return view ('_html.customer.order_given')->with( 'data', $data);
    }
    public function customer_personal_review($id)
    {
       
        $id = base64_decode(urldecode($id));
        $user = Auth::guard('admin')->user();
        $customer = Customer::where('user_id', $user->id);
        return view('_html.customer.review')->with('user',$user)->with('customer',$customer);
    }
}
