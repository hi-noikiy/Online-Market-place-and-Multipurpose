<?php
namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use App\All_user;
use App\Freelancer;
use App\Pro;
use App\Customer;
use App\Review;
use App\PersonalNote;
use Mail;
use App\Mail\Pincode;
use App\Mail\ResetPin;

class UserController extends Controller
{
    public function login()
    {
        return view('_html.login');
    }

    public function createProfile()
    {
        return view('_html.userRegister');
    }

    public function user_registration()
    {
        if(Auth::guard('admin')->check()  || Auth::check())
        {
            return redirect()->back();
        }
        return view('_html.Register');
    }
    public function all_users(Request $request)
    {
        if (Auth::guard('admin')->check()  || Auth::check()) {
            return redirect()->back();
        }
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'name' => 'required'

        ]);
        $user = All_user::where('email', $request->email)->first();
        if ($user) {
            return 'You already have account';
        } else {
            $user = new All_user;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $password = $request->password;
            $data = Hash::make($password);
            $user->password = $data;
            $user->created_at = date('Y-m-d H:i:s');
            $user->save();
            $num = mt_rand(1000, 9000);
            Mail::to($request->email)->send(new Pincode($num, $user));
            for($i=2;$i<8;$i++){
                $u=new User;
                $u->name=$request->name;
                $u->email=$request->email;
                $u->mobile=$request->mobile;
                $u->user_type=$i;
                $u->user_sub_type=2;
                $u->status=1;
                $u->created_by_ip=\Request::ip();
                $u->created_at = date('Y-m-d H:i:s');
               
                $data=Hash::make($num);
                $u->password=$data;
                $u->save();
            }
            Auth::login($user);
            return Redirect::to('/');
        }
    }
    public function checkrole(Request $request)
    {
        $user = Auth::user();
        // if (!$user) {
        //     $user = Auth::guard('admin')->user();
        // }
        // return $user;
        $data = $request->data;
        if ($data == 'freelancer') {
            $check = User::where('email', $user->email)->where('user_type', 3)->first();

            if ($check) {
                $output = $this->build_role(true, 'Freelancer', $user->email);
                return $output;
            } else {
                $output = $this->build_role(false, 'Freelancer', $user->email);
                return $output;
            }
        }
        // if ($data == 'admin') {
        //     $check = User::where('email', $user->email)->where('user_type', 1)->first();
        //     if ($check) {
        //         $output = $this->build_role(true, 'Admin', $user->email);
        //         return $output;
        //     } else {
        //         $output = $this->build_role(false, 'Admin', $user->email);
        //         return $output;
        //     }
        // }
        if ($data == 'pro') {
            $check = User::where('email', $user->email)->where('user_type', 4)->first();

            if ($check) {
                $output = $this->build_role(true, 'Pro', $user->email);
                return $output;
            } else {
                $output = $this->build_role(false, 'Pro', $user->email);
                return $output;
            }
        }
        if ($data == 'customer') {
            $check = User::where('email', $user->email)->where('user_type', 2)->first();

            if ($check) {
                $output = $this->build_role(true, 'Customer', $user->email);
                return $output;
            } else {
                $output = $this->build_role(false, 'Customer', $user->email);
                return $output;
            }
        }
        if ($data == 'job_seeker') {
            $check = User::where('email', $user->email)->where('user_type', 5)->first();

            if ($check) {
                $output = $this->build_role(true, 'Job Seeker', $user->email);
                return $output;
            } else {
                $output = $this->build_role(false, 'Job Seeker', $user->email);
                return $output;
            }
        }
    }
    public function build_role($data, $type, $email)
    {
        if ($data == true) {
            $output = '<div  style="z-index:10" class="in-content">' .

                '<p class="text-justify">' . '<strong class="text-info">Dear user,</strong> your already have an account for' . $type . ' With the email ' . $email . '<h6> You need not to open a new accout to access any of our service</h6> <i> because we believe in simplicity with highest possible security</i>
                            . Enjoy our services with your account
                </p>' .
                '<input type="hidden" value="' . $type . '" id="type">' .
                '<input type="hidden" value="' . $email . '" id="email">' .
                '<h6>Your PIN</h6>' . '<h5 id="info" class="text-danger">PIN needed</h5>' .
                '<input type="password" placeholder="Your Pin" style="padding:10px;" id="pin">' . '<br>' .
                '<h6 style="cursor:pointer" onclick="changepin()">Change pin</h6>'.
                '<h6 style="cursor:pointer" onclick="resetpin()">Reset PIN</h6>'.
                '<br>'.
                '<a class="text-info btn" style="" onClick="custom_login()">Go to ' . $type . ' account </a>' .
                '<br>'.
                

                '</div>';
            return $output;
        } else {

            $output = '<div  style="z-index:10" class="in-content">' .
                '<h3 class="text-danger">Please open an acoount. You do not have an account for ' . $type . ' with the email ' . $email . '</h3>' .
                '<h5 class="text-success">We beleive not in best but on number one web security</h5>' .
                '<h4>Put a password for your ' . $type . ' account. You may chose your main a/c password or you can choose a different one</h4>' .
                '<input type="password" name="pass" id="pass" requird>' .
                '<label>Agreed with all terms and service related with ' . $type . ' account</label>' .
                '<input type="checkbox" name="agree" id="agree"  class="form-control" required>' .
                '<input type="hidden" value="' . $type . '" name="type" id="type">' .
                '<input type="hidden" value="' . $email . '" name="email" id="email">' .
                '<input class="btn btn-info" value="Confirm" onClick="create_an_account();">' .
                '</div>';
            return $output;
        }
    }

    public function custom_login(Request $request)
    {
        // if ($request->type == 'Admin') {
        //     $user_ty = 1;
        // }
        if ($request->type == 'Freelancer') {
            $user_ty = 3;
           
        }
        if ($request->type == 'Pro') {
            $user_ty = 4;
        }
        if ($request->type == 'Customer') {
            $user_ty = 2;
        }
        if ($request->type == 'Job Seeker') {
            $user_ty = 5;
        }
        $nuser = User::where('email', $request->email)->where('user_type', $user_ty)->first();
        if(Hash::check($request->pin, $nuser->password)){
            Auth::logout();
            Auth::guard('admin')->login($nuser);

           
            if ($user_ty == 3) {
                $freelancer=Freelancer::where('user_id',$nuser->id)->first();
                if(!$freelancer){
                    $freelancer = new Freelancer;
                    $freelancer->user_id = $nuser->id;
                    $freelancer->save();
                }
               
                return 'successfreelancer';
            }

            if ($user_ty == 4) {
                $pro = Pro::where('user_id', $nuser->id)->first();
                if (!$pro) {
                    $pro = new Pro;
                    $pro->user_id = $nuser->id;
                    $pro->save();
                }
                return 'successpro';
            }

            if ($user_ty == 2) {
                $customer = Customer::where('user_id', $nuser->id)->first();
                if (!$customer) {
                    $customer = new Customer;
                    $customer->user_id = $nuser->id;
                    $customer->save();
                }
                return 'successcustomer';
            }
        }
        else{
            return 'not successful';
        }
        
       
    }

    public function create_user_custom_ac(Request $request)
    {
        //  return 'hi';
        $user = Auth::user();
        // if (!$user) {
        //     $user = Auth::guard('admin')->user();
        // }
//        $type = $request->type;
        // return $type;
        $password = $request->password;
        $data = Hash::make($password);
        $newuser = new User;
        $newuser->name = $user->name;
        $newuser->password = $data;
        $newuser->mobile = $user->mobile;
        $newuser->email = $user->email;
        // if ($request->type == 'Admin') {
        //     $user_ty = 1;
        // }
        if ($request->type == 'Freelancer') {
            $user_ty = 3;
           
        }
        if ($request->type == 'Pro') {
            $user_ty = 4;
        }
        if ($request->type == 'Customer') {
            $user_ty = 2;
        }
        if ($request->type == 'Job Seeker') {
            $user_ty = 5;
        }

        $newuser->user_type = $user_ty;
        $newuser->status = 1;
        $newuser->created_by_ip = \Request::ip();
        $newuser->created_at = date('Y-m-d H:i:s');
        $newuser->save();
        if ($request->type == 'Freelancer') {
           $freelancer= new Freelancer;
           $freelancer->user_id=$newuser->id;
           $freelancer->save();
        }
        if ($request->type == 'Pro') {
           $pro= new Pro;
           $pro->user_id=$newuser->id;
           $pro->save();
        }
        if ($request->type == 'Customer') {
            $Customer= new Customer;
            $Customer->user_id=$newuser->id;
            $Customer->save();
        }
        // if (Auth::user()) {
        //     Auth::logout();
        // }

        // if (Auth::guard('admin')->user()) {
        //     Auth::guard('admin')->logout();
        // }
        Auth::logout();
        Auth::guard('admin')->login($newuser);


        if ($user_ty == 3) {
            return 'successfreelancer';
        }

        if ($user_ty == 4) {
            return 'successpro';
        }

        if ($user_ty == 2) {
            return 'successcustomer';
        }
    }
    public function resetpin(){
        $user=Auth::user();
        $data= Str::random(60);
        Session::put('str',$data);
        Mail::to($user->email)->send(new ResetPin($data,$user));
        return 'we have sent you an email';
    }
    public function resetconfirm($data){
        $str=Session::get('str');
        if($str==$data){
            Session::put('str','11');
            return view('_html.resetpin');
        }else{
            return 'Healthbute says <br>YOUR authentication run into a problem. please try again';
        }
    }
    public function resetpinsave(Request $request){
        $user = Auth::user();
        $users = User::where('email', $user->email)->get();
        $data = Hash::make($request->new_password);

        foreach ($users as $u) {
           
                $u->password = $data;
                $u->save();
                    
        }
        Session::flash('successmessage', 'YOUR PIN HAVE BEEN CHANGED SUCCESSFULLY');
        return redirect('/');
    }

    public function changepin(){
        return view('_html.changepin');
    }
    public function changepinsave(Request $request){
       $user= Auth::user();
       $users=User::where('email',$user->email)->get();
     
       
            foreach($users as $u){
                if (Hash::check($request->new_password, $u->password)){
                    $u->password = $request->new_password;
                    $u->save();
                }
               
           
            
            Session::flash( 'successmessage','YOUR PIN HAVE BEEN CHANGED SUCCESSFULLY');
           
        }
        Session::flash('dangermessage','Not successful');
        return redirect('/');
    }
    //Old code
    public function index()
    {
        return view('_dashboard.users');
    }
    public function save_profile_image(Request $request){
        $user=Auth::guard('admin')->user();
        if($request->type=='customer'){
            $customer=Customer::where('user_id',$user->id)->first();
            if ($request->hasFile('image')) {

                $file = $request->file('image');

                $filename = time() . '.' . $file->getClientOriginalExtension();

                $location = public_path('/uploads/user/');

                // Image::make($image)->save($location);
                $file->move($location, $filename);

                $customer->profile_image = $filename;
                $customer->save();
            }
            return redirect()->back();
        }
        if($request->type=='freelancer'){
            $freelancer=Freelancer::where('user_id',$user->id)->first();
            if ($request->hasFile('image')) {

                $file = $request->file('image');

                $filename = time() . '.' . $file->getClientOriginalExtension();

                $location = public_path('/uploads/user/');

                // Image::make($image)->save($location);
                $file->move($location, $filename);

                $freelancer->profile_image = $filename;
                $freelancer->save();
            }
            return redirect()->back();
        }
        if($request->type=='pro'){
            $pro=Pro::where('user_id',$user->id)->first();
            if ($request->hasFile('image')) {

                $file = $request->file('image');

                $filename = time() . '.' . $file->getClientOriginalExtension();

                $location = public_path('/uploads/user/');

                // Image::make($image)->save($location);
                $file->move($location, $filename);

                $pro->profile_image = $filename;
                $pro->save();
            }
            return redirect()->back();
        }
    }

    public function getUsers()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $getUsers = DB::table('users')
            ->SELECT([DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'id', 'name', 'mobile', 'email', 'user_type', 'user_sub_type', 'user_sub_type', 'status', 'created_at'])
            ->orderBy('id', 'desc')
            ->get();

        $datatables = Datatables::of($getUsers);
        // edit user type
        $datatables->editColumn('user_type', function ($val) {
            if ($val->user_type == 1) {
                $user_type = "Admin";
            } else if ($val->user_type == 2) {
                $user_type = "Customer";
            } else if ($val->user_type == 3) {
                $user_type = "Freelancer";
            } else if ($val->user_type == 4) {
                $user_type = "Pro";
            }
            return $user_type;
        });

        //Edit status value
        $datatables->editColumn('status', function ($val) {
            if ($val->status == 1) {
                $status = "Active";
            } else {
                $status = "Inactive";
            }
            return $status;
        });

        //Edit created_at value
        $datatables->editColumn('created_at', function ($val) {
            return date('Y-m-d', strtotime($val->created_at));
        });

        //Add action column
        $datatables->addColumn('action', function ($val) {
            $btn = "";
            $btn .= '<button class="btn btn-xs btn-warning btn-sm" onclick="editUser(' . $val->id . ')"><i class="glyphicon glyphicon-edit"></i> Edit</button>';
            $btn .= '<button class="btn btn-xs btn-danger btn-sm" onclick="deleteUser(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
            return $btn;
        });

        return $datatables->make(true);
    }

    public function getUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $category = User::find($request->id);
        if ($category) {
            return response(['status' => "success", 'message' => "Category Data Found", 'data' => $category]);
        } else {
            return response(['status' => "error", 'message' => "Category Data Not Found"]);
        }
    }

    public function updateUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'user_type' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->status = $request->status;
        $user->updated_by_ip = \Request::ip();
        $user->updated_at = date('Y-m-d H:i:s');
        if ($user->save()) {
            return response(['status' => "success", 'message' => "User Update Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "User Update Failed"]);
        }
    }
    public function deleteUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $user = User::find($request->id);
        if ($user->delete()) {
            return response(['status' => "success", 'message' => "Category Deleted Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Category Deleted Failed"]);
        }
    }

    public function userUpdateView(Request $request)
    {
        // $data = [
        //     'categories' => Category::getUserCategories()->get(),
        //     'countries' => Country::get(),
        //     'qualifications' => Qualification::where('status', '=', 1)->get(),
        //     'skills' => Skill::where('status', '=', 1)->get(),
        //     'info' => User::UserDetails()->where('users.id', '=', Auth::id())->first(),
        //     'edu_info' => Education::where('user_id', '=', Auth::id())->get(),
        // ];

        if (Auth::user()->user_type == 5) { //Job seeker
            return view('_html.job.jobSeekerProfile');
        }elseif (Auth::user()->user_type == 6) { //Company
            return view('_html.company.companyProfile');
        } else {
            return "Page not define";
        }
    }
    public function add_personal_note(Request $request)
    {
        $user=Auth::guard('admin')->user();
        $this->validate($request, [
            'note' => 'required',
        ]);
        $note=new PersonalNote;
        $note->user_id=$user->id;
        $note->note=$request->note;
        $note->save();
        return redirect()->back();
    }
    public function comming_soon(Request $request)
    {
        $data=$request->check;
        if($data == 'kceauth100'){
            Session::put('check','matul');
            return redirect('/');
        }else {
            return redirect()->back();
        }
    }


}
