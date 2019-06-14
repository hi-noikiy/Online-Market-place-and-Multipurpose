<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Session;
use Validator;
use Mail;
use App\Admin;
use App\SuperAdmin;
use App\Freelancer;
use App\Review;
use App\Pro;
use App\Customer;
use App\User;
use App\Gig;
use App\FreelancerProjectProposal;
use DB;
use Auth;
use App\Mail\Confirm_code_1;
use App\Mail\Confirm_code_2;
use App\Mail\IpConfirm;
use App\All_user;

class AdminController extends Controller
{
   public function login(){
       if(!Auth::guard('master')->check()){
            return view('_admin.login');
       }else{
         return redirect( '/super_admin_dashboard');
       }
   }
   public function submission(Request $request){
        // return $request;
        $this->validate($request,[
        'name'=>'required',
        'email'=>'required|email',
        'secondary_email'=>'required|email',
        'password'=>'required|min:6',
        'mobile'=>'required',
        'birthday'=>'required'
      ]);
      $admin=Admin::where('email',$request->email)->first();
      if($admin){
          if($admin->status==0){
              return 'Prove this is you!!. We have received some activities for that we locked down this only for the original owner ';
          }
          $super_admin=SuperAdmin::where('secondary_email',$request->secondary_email)->first();
          if($request->mobile== $admin->mobile && $request->birthday==$admin->birthday && $super_admin->secondary_email==$request->secondary_email){
           
                if (Hash::check( $request->password, $admin->password)){
                     $data = Hash::make($request->password);
                    $ip = \Request::ip();
                    if($admin->ip!=null && $admin->ip==$ip){
                   
                      $token=\csrf_token();
                      $super_admin->random_code_1=Hash::make($data);
                      $super_admin->random_code_2=Hash::make($token);
                      $super_admin->save();
                        Mail::to($request->email)->send(new Confirm_code_1($super_admin->random_code_1, $admin));
                        Mail::to($request->secondary_email)->send(new Confirm_code_2($super_admin->random_code_2,  $super_admin));
                      return view('_admin.confirm_login')->with('secondary_eamil',$request->secondary_email);   


                    }else{ 
                        $admin->status=0;
                        $admin->save();
                        $token=\csrf_token();
                        $token=Hash::make($token);
                       
                        Session::put('ip',$ip);
                        Mail::to($request->email)->send(new IpConfirm($token, $admin));
                        return redirect()->back()->withInput();

                    }
                }
                return '<h5>Password does not match</h5>';
          }
          return '<h2>info did not match</h2>';
      }
      return '<h2>No Account</h2>';

   }
   public function submisson_confirm(Request $request){
        $super_admin = SuperAdmin::where('secondary_email', $request->secondary_eamil)->first();
        if($super_admin->random_code_1==$request->code_1  && $super_admin->random_code_2==$request->code_2){
            $super_admin->confirm_code_1= $super_admin->random_code_1;
            $super_admin->confirm_code_2=$super_admin->random_code_2;
            $super_admin->random_code_1=null;
            $super_admin->random_code_2=null;
            $super_admin->save();
            Auth::guard('master')->login($super_admin);
            return redirect('/super_admin_dashboard');
        }else{
            return '<h3><strong>Does not</strong> match</h3>
              <p> Go back and try again</p>';
        }

   }
   public function ipmatch(Request $request){
     $token=$request->token;
     $admin_id=$request->id;
      $session_token=\csrf_token();
      if(Hash::check( $session_token, $token)){
          $admin_id=base64_decode($admin_id);
          $admin=Admin::find($admin_id);
          $admin->status=1;
          $admin->ip=Session::get('ip');
          $admin->save();
          return redirect( '/adminLogin/kkccppss/99mm');
      }
   }
   public function user_active($id){
     $user=All_user::find($id);
     $user->status=1;
     $user->save();
     return redirect()->back();
   }
   public function user_deactive($id){
     $user=All_user::find($id);
     $user->status=2;
     $user->save();
     return redirect()->back();
   }
   public function user_suspend($id){
     $user=All_user::find($id);
     $user->status=3;
     $user->save();
     return redirect()->back();
   }
   public function user_delete(Request $request){
      $user=All_user::find($request->id);
      $user->delete();
      return 'success';
   } 
   public function manage_customer(){

   }
   public function manage_freelancer(){
     return view('_admin.user.manage_feelancer');
   }
   public function get_freelancer(){
    $user = DB::table('users')->select(['id', 'name','email'])->where('user_type',3);
    return Datatables::of($user)
      ->setRowId('id')
      ->addColumn('action', function ($val) {
        $url=url('manage_singe_freelancer/'.$val->id);
        $btn = "";

        $btn .= '<a href="'.$url.'" class="btn btn-xs btn-success btn-sm" ><i class="glyphicon glyphicon-add"></i> Details</a>';
        return $btn;
      })
    
      ->make(true);
   }
   public function singlefreelancermanage($id){
     $user=User::find($id);
     $freelancer=Freelancer::where('user_id',$user->id)->first();
     $review_given=Review::where('item_type',3)->where('giver_id',$user->id)->paginate(15);
     $gig=Gig::where('type',0)->where( 'freelancer_id',$freelancer->id)->paginate(15);
     $proposal= FreelancerProjectProposal::where('user_id',$user->id)->paginate(10);
     return view('_admin.user.single_freelancer')->with('user',$user)
                                                  ->with('freelancer',$freelancer)
                                                  ->with('proposals',$proposal)
                                                  ->with('review_givens',$review_given)
                                                 
                                                  ->with('gigs',$gig);
   }
   
   public function adminLogOut(){
    // Auth::guard('master')->logout();
    Session::flush();
     return redirect()->back();
   }

}
