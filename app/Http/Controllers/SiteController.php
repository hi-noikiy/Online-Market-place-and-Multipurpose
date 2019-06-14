<?php

namespace App\Http\Controllers;

use App\User;
use App\Skill;
use Validator;
use App\Country;
use App\TemUser;
use App\Category;
use App\UserInfo;
use App\Education;
use App\Qualification;
use App\userCompanyType;
use App\userCompanyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\All_user;

class SiteController extends Controller
{
    public function index()
    {
        $data['countries'] = Country::select('id', 'name')->where('status', '=', 1)->get();
        $data['categories'] = Category::select('name', 'slug', 'icon')->distinct('name')
            ->where('type', '=', 1) //UI
            ->where('status', '=', 1)
            ->paginate(12);

        return view('_html.home', ['data' => $data]);
    }

    public function homeAjaxCategories(Request $request)
    {
        if ($request->ajax()) {
            $data['categories'] = Category::select('name', 'slug', 'icon')
                ->distinct('name')
                ->where('type', '=', 1) //UI
                ->where('status', '=', 1)
                ->paginate(12);

            return view('_html.ajax.ajaxHomeCategories', ['data' => $data]);
        }
    }

    // public function userUpdateView(Request $request)
    // {
    //     $data = [
    //         'categories' => Category::getUserCategories()->get(),
    //         'countries' => Country::get(),
    //         'qualifications' => Qualification::where('status', '=', 1)->get(),
    //         'skills' => Skill::where('status', '=', 1)->get(),
    //         'info' => User::UserDetails()->where('users.id', '=', Auth::id())->first(),
    //         'edu_info' => Education::where('user_id','=', Auth::id())->get(),
    //     ];

    //     if(Auth::user()->user_type == 6){
    //         return view('_html.userUpdate');
    //     }else{
    //         return view('_html.userUpdate', ['data' => $data]);
    //     }
    // }

    /*
    Old functions
     */
    // created by saddam
    public function jobByCategory($slug)
    {
        $jobByCategory = DB::table('projects as pro')
            ->join('categories', 'categories.id', '=', 'pro.category_id')
            ->join('users', 'pro.created_by', '=', 'users.user_type')
            ->select('pro.id', 'pro.category_id', 'pro.title', 'pro.type', 'pro.end_date', 'pro.location', 'pro.job_price', 'pro.description', 'pro.created_by', 'users.name', 'categories.name', 'categories.slug')
            ->where('categories.slug', $slug)
            ->where('pro.type', 2)
            ->paginate(10);

        return view('_html.jobBySlug')->with('showjobByCategory', $jobByCategory);

    }

    // created by saddam
    public function productDetails($productId)
    {

        $jobDetails = DB::table('projects as pro')
            ->join('categories', 'categories.id', '=', 'pro.category_id')
            ->join('locations', 'locations.id', '=', 'pro.location')
            ->join('users', 'pro.created_by', '=', 'users.user_type')
            ->select('pro.id', 'pro.category_id', 'pro.title', 'pro.type', 'pro.job_type', 'pro.end_date', 'pro.location', 'pro.job_price', 'pro.location', 'pro.description', 'pro.created_by', 'users.name', 'categories.name', 'locations.name', 'categories.slug')
            ->where('pro.id', $productId)
            ->first();
        return view('_html.jobDetails')->with('details_job', $jobDetails);

    }

    public function checkLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response(['status' => "error", 'message' => "Please Check Email Or Password"]);
        }

        // if (Auth::user()->status == 2) { //Inactive
        //     return response(['status' => "error", 'message' => "Your account is inactive."]);
        // }

        return Redirect::to('/');

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:tem_users',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        //Check exist user
        $existUser = User::select('*')
            ->where('email', '=', $request->email)
            ->first();
        if (!empty($existUser)) {
            return response(['status' => 'error', 'message' => "Email address already exist"]);
        }

        $tempUser = new TemUser;
        $tempUser->verify_code = mt_rand(100000, 999999);
        $tempUser->name = $request->name;
        $tempUser->email = $request->email;
        $tempUser->email_status = 2;
        $tempUser->status = 2;
        $tempUser->created_by_ip = \Request::ip();
        $tempUser->created_at = date('Y-m-d H:i:s');

        if (!$tempUser->save()) {
            return response(['status' => "error", 'message' => "Failed to insert data"]);
        }

        //Send email
        return response(['status' => "success", 'message' => "Please check your email"]);
    }

    public function updateRegister($key)
    {
        $data = [
            'companyCategories' => userCompanyCategory::select('id', 'name')->where('status', '=', 1)->get(),
            'companyTypies' => userCompanyType::select('id', 'name')->where('status', '=', 1)->get(),
        ];

        return view('_html.register', ['data' => $data]);
    }

    public function verifyCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|numeric|digits:6',
            'key' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        //Check validation
        $checkValidation = TemUser::select('*')
            ->where('verify_code', '=', $request->code)
            ->first();
        if (empty($checkValidation)) {
            return response(['status' => 'error', 'message' => "No verification code not correct"]);
        }

        $tempUser = TemUser::find($checkValidation->id);
        $tempUser->status = 1;
        $tempUser->updated_by_ip = \Request::ip();
        $tempUser->updated_at = date('Y-m-d H:i:s');
        if (!$tempUser->save()) {
            return response(['status' => "error", 'message' => "Failed to verify user"]);
        }

        return response(['status' => "success", 'message' => "User verify successfully"]);
    }

    public function createUserAccount(Request $request)
    {
        $validatorArray = [
            'key' => 'required',
            'userType' => 'required',
            'mobileNumber' => 'required',
            'rePassword' => 'required',
            'gender' => 'required',
            'physicalAdd' => 'required',
        ];

        if (in_array($request->all()['userType'], [2, 3])) {
            $validatorArray['userSubType'] = "required";
            if ($request->all()['userSubType'] == 1) {
                $validatorArray['companyName'] = "required";
                $validatorArray['companyType'] = "required";
                $validatorArray['companyCategory'] = "required";
                $validatorArray['companyDes'] = "required";
            }
        }

        $validator = Validator::make($request->all(), $validatorArray);
        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        //Get tem user info
        $key = explode(",", $request->key);
        $email = $key[0];
        $code = $key[1];
        $temUserInfo = TemUser::select('*')
            ->where('verify_code', '=', $code)
            ->first();
        if (empty($temUserInfo)) {
            return response(['status' => 'error', 'message' => "No verification code not correct"]);
        } else if ($temUserInfo->status != 1) {
            return response(['status' => 'error', 'message' => "Security code is not valid"]);
        }

        DB::beginTransaction();
        //Save to user table
        $user = new User;
        $user->name = $temUserInfo->name;
        $user->mobile = $request->mobileNumber;
        $user->email = $temUserInfo->email;
        $user->password = Hash::make($request->password);
        $user->user_type = (int) $request->userType + 1;
        $user->user_sub_type = (int) $request->userSubType + 1;
        $user->status = ($request->userType == 1 ? 1 : 2);
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_by_ip = \Request::ip();
        if (!$user->save()) {
            DB::rollBack();
            return response(['status' => 'error', 'message' => "User insert failed"]);
        }

        //Save to user info table
        $userInfo = new UserInfo;
        $userInfo->user_id = $user->id;
        $userInfo->physical_add = $request->physicalAdd;
        $userInfo->company_name = $request->companyName;
        $userInfo->tag_line = $request->tagLine;
        $userInfo->company_type = $request->companyType;
        $userInfo->company_category = $request->companyCategory;
        $userInfo->company_des = $request->companyDes;
        $userInfo->created_at = date('Y-m-d H:i:s');
        if (!$userInfo->save()) {
            DB::rollBack();
            return response(['status' => 'error', 'message' => "User details insert failed"]);
        }

        //Delete tem user
        $temUserInfo = TemUser::find($temUserInfo->id);
        if (!$temUserInfo->delete()) {
            DB::rollBack();
            return response(['status' => "error", 'message' => "Tempoary user delete failed"]);
        }

        DB::commit();
        return response(['status' => 'success', 'message' => "User account created successfully"]);

    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/');
    }
    public function logoutfromadmin(){
        $email=Auth::guard('admin')->user()->email;
        $user=All_user::where('email',$email)->first();
        Auth::guard('admin')->logout();
        Auth::login($user);
        return redirect('/');
    }
}
