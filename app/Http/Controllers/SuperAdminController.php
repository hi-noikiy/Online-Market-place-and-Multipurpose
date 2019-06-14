<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use App\SuperAdmin;
use Auth;
use App\Admin;
use App\All_user;

use App\TaskList;
use App\AdminMessageToUser;
use App\User;
use App\Question;
use App\Review;
use App\ChoreCategory;
use App\JobCategory;
use App\Permission;
use App\Manager;
use App\ManagerActivity;
use DB;
use Mail;
use App\Mail\AdminMessage;
use App\Mail\ManagerVerification;
class SuperAdminController extends Controller
{
 
   public function index(){
      return view('_admin.home');
   }
   public function tasklist(){
      $task_list=TaskList::all();
      return view('_admin.tasklist')->with('task_list',$task_list);
   }
   public function SetQuestion(){
      $question=Question::all();
      return view('_admin.question')->with('questions',$question);
   }
   public function add_question(Request $request){
      $this->validate($request,[
         'question' =>'required|min:5'
      ]);
      $question=new Question;
      $question->question=$request->question;
      $question->save();
      return redirect()->back();
   }
   public function question_search(Request $request){
      $data=$request->value;
      if($data==null){
         return null;
      }
      $questions=Question::where('question','like','%'.$data.'%')->get();
      $output='';
      foreach($questions as $question){
         $output.='<h6>'.$question->question.'</h6>';
      }
      return $output;
   }
   public function message_to_user(){
      $message=AdminMessageToUser::orderBy('created_at', 'desc')->paginate(3);
      return view('_admin.message_to_user')->with('messages',$message);
   }
   public function send_message(Request $request){
      $this->validate($request,[
         'message'=>'required'
      ]);
      if($request->customer !=null){
          $message= new AdminMessageToUser;
          $message->message=$request->message;
          $message->user_type=2;
          $message->admin_id=Auth::guard('master')->user()->id;
          $message->save();
          $user=User::where('user_type',2)->get();
           Mail::to($user)->send(new AdminMessage($message,3));
      }
      if($request->freelancer !=null){
          $message= new AdminMessageToUser;
          $message->message=$request->message;
          $message->user_type=3;
          $message->admin_id=Auth::guard('master')->user()->id;
          $message->save();
          $user=User::where('user_type',3)->get();
           Mail::to($user)->send(new AdminMessage($message,3));
      }
      if($request->pro !=null){
          $message= new AdminMessageToUser;
          $message->message=$request->message;
          $message->user_type=4;
          $message->admin_id=Auth::guard('master')->user()->id;
          $message->save();
           $user=User::where('user_type',4)->get();
           Mail::to($user)->send(new AdminMessage($message,4));
      }
      // if($request->pro !=null){
      //     $message= new AdminMessageToUser;
      //     $message->message=$request->message;
      //     $message->user_type=5;
      //     $message->admin_id=Auth::guard('master')->user()->id;
      //     $message->save();
      //      $user=App\User::where('user_type',5)->get();
      //      Mail::to($user)->send(new AdminMessage($message,4));
      // }
      if($request->company !=null){
          $message= new AdminMessageToUser;
          $message->message=$request->message;
          $message->user_type=6;
          $message->admin_id=Auth::guard('master')->user()->id;
          $message->save();
           $user=User::where('user_type',6)->get();
           Mail::to($user)->send(new AdminMessage($message,5));
      }
      if($request->customer !=null && $request->freelancer!=null && $request->pro!=null && $request->company !=null && $request->candidate !=null){
          $message= new AdminMessageToUser;
          $message->message=$request->message;
          $message->user_type=7;
          $message->admin_id=Auth::guard('master')->user()->id;
          $message->save();
           $user=User::where('user_type',7)->get();
           Mail::to($user)->send(new AdminMessage($message,7));
      }
      if($request->candidate !=null){
          $message= new AdminMessageToUser;
          $message->message=$request->message;
          $message->user_type=8;
          $message->admin_id=Auth::guard('master')->user()->id;
          $message->save();
           $user=User::where('user_type',8)->get();
           Mail::to($user)->send(new AdminMessage($message,8));
      }
     
      return redirect()->back();
   }
   public function create_manager(){
      return view('_admin.create_manager');
   }
   public function save_manager(Request $request){
      $this->validate($request,[
         'name'=>'required',
         'email'=>'required|email',
         'password'=>'required|min:6',
         'mobile'=>'required',
         'birthday'=>'required',
         'gender'=>'required',
         'address'=>'required'
      ]);
      $admin=new Admin;
      $admin->name=$request->name;
      $admin->email=$request->email;
      $data=Hash::make($request->password);
      $admin->password=$data;
      $admin->address=$request->address;
      $admin->mobile=$request->mobile;
      $admin->gender=$request->gender;
      $admin->birthday=$request->birthday;
      $admin->age=2;
      $admin->ip='0.0.0.0';
      $admin->status=1;
      $a=SuperAdmin::find(Auth::guard('master')->user()->id)-> admin;
      $admin->created_by_email=$a->email;
      $admin->save();
      $token = mt_rand(1000, 9000);
      Mail::to($admin)->send(new ManagerVerification($token));
      $manager= new Manager;
      $manager->admin_id=$admin->id;
      $manager->super_admin_id=Auth::guard('master')->user()->id;
      $manager->pin=$token;
      $manager->answer='no answer till now';
      $manager->question_id=-10;
      $manager->save();
      return redirect('manager_ground');
   }
   public function permission(){
      $task_list=TaskList::all();
      return view('_admin.permission')->with('task_list',$task_list);
   }
   public function change_permission(Request $request){
     
      $per = Permission::where('permission_tag',$request->tag )->where('manager_id', $request->manager_id)->first();
      // print_r($per); 
      // exit();
      if($per!=null){
         $per->delete();
      }else{
         $per=new Permission;
         $per->permission_tag=$request->tag;
         $per->manager_id=$request->manager_id;
         $per->save();
      }
      return redirect()->back();
   }
   public function manager_ground(){
      $managers=Manager::paginate(9);
      return view('_admin.manager_ground')->with('managers',$managers);
   }
   public function deleteadmin($id){
      $manager=Manager::find($id);
      $admin= Manager::find($id)->admin;
      $manager->delete();
      $admin->delete();
      return redirect()->back();
   }
   public function edit_manager(Request $request,$id){
      $manager=Manager::find($id);
      $admin=Manager::find($id)->admin;
      if($request->name != null){
         $admin->name=$request->name;
      }
      if($request->email != null){
         $admin->email=$request->email;
      }
      if($request->address != null){
         $admin->address=$request->address;
      }
      if($request->gender != null){
         $admin->gender=$request->gender;
      }
      if($request->mobile != null){
         $admin->mobile=$request->mobile;
      }
      if($request->status != null){
         $manager->status=$request->status;
      }
      if($request->password != null){
         $data=Hash::make($request->password);
         $admin->password=$data;
      }
      if($request->pin==true){
         $token = mt_rand(1000, 9000);
         Mail::to($request->email)->send(new ManagerVerification($token));
         $manager->pin = $token;
      }
      $admin->save();
      $manager->save();
      return redirect()->back();
   }
   public function see_activities($id){
      $manager=Manager::find($id);
      return view('_admin.see_activities')->with('manager',$manager);
   }
   public function Get_see_activities(){
      $activity=ManagerActivity::query();
      return Datatables::of( $activity)
         ->setRowId('id')
         ->editColumn('status', function ($val) {
            if ($val->status == 1) {
               return 'Marked';
            } else {
               return 'Normal';
            }
         })

         ->addColumn('action', function ($val) {
            // $url = url('manage_manager_activity/' . $val->id);
            $btn = "";
            if($val->status=0){
            $btn .= '<button class="btn btn-xs btn-warning btn-sm" onclick="mark(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Mark</a>';
            }else{
            $btn .= '<button class="btn btn-xs btn-success btn-sm" onclick="unmark(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Unmark</a>';
            }
           
            $btn .= '<button class="btn btn-xs btn-danger btn-sm"  onclick="delete_freelancer_pro_category(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Send Manager Notification to explain about this action</button>';
            return $btn;
         })
         ->make(true);
   }
   public function manage_general_user(){
      return view('_admin.manage_general_user');
   }
   public function get_manage_general_user(){
      $user= All_user::query();
      return Datatables::of($user)
         ->setRowId('id')
         ->editColumn('status', function ($val) {
            if ($val->status == 1) {
               return 'Active';
            } elseif($val->status==2) {
               return 'Inactive';
            }else{
               return 'Suspend';
            }
         })

         ->addColumn('action', function ($val) {
            $url = url('send_email_to_user/' . $val->id);
            $url_active = url('user_active/' . $val->id);
            $url_deactive = url('user_deactive/' . $val->id);
            $url_suspend = url('user_suspend/' . $val->id);
            $btn = "";
            $btn .= '<a class="btn btn-xs btn-success btn-sm" href="' . $url . '" > Send Email</a>';
            $btn .= '<a class="btn btn-xs btn-success btn-sm" href="' .  $url_active . '" > Active</a>';
            $btn .= '<a class="btn btn-xs btn-warning btn-sm" href="' .  $url_deactive . '" > Deactive</a>';
            $btn .= '<a class="btn btn-xs btn-secondary btn-sm" href="' . $url_suspend . '" > Suspend</a>';
            $btn .= '<button class="btn btn-xs btn-danger btn-sm"  onclick="delete_general_user(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
            return $btn;
         })
         ->make(true);
   }
   public function review_control(){
      return view('_admin.review_control');
   }
   public function get_review_data(){
       $review=Review::query();
       return Datatables::of($review)
       ->setRowId('id')
       ->editColumn('giver_id', function ($val) {
            $user=User::find($val->giver_id);
            return $user->email;
        })
       ->addColumn('action', function ($val) {
            $btn = "";
           
            $btn .= '<button class="btn btn-xs btn-danger btn-sm" onclick="deletereview(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
            return $btn;
        })
       ->make(true);
   }
   public function delete_review(Request $request){
      $review = Review::find($request->id);
      $review->delete();
      return 'success';
   }
   public function freelancer_pro_category(){
      return view('_admin.freelancer_pro_category');
   }
   public function getfeelancerProdata(){
      $category=JobCategory::query();
      return Datatables::of($category)
       ->setRowId('id')
       ->editColumn('status', function ($val) {
           if($val->status==1){
              return 'Active';
           }else{
              return 'Deactivated';
           }
        })
      
       ->addColumn('action', function ($val) {
            $url=url('edit_freelancer_pro_category/'.$val->id);
            $btn = "";          
            $btn .= '<a class="btn btn-xs btn-warning btn-sm" href="'.$url.'" ><i class="glyphicon glyphicon-remove"></i> Edit</a>';
            $btn .= '<button class="btn btn-xs btn-danger btn-sm"  onclick="delete_freelancer_pro_category(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
            return $btn;
        })
      ->make(true);
   }
   public function freelancer_pro_category_save(Request $request){
      $this->validate($request,[
         'name'=>'required'
      ]);
      $category=new JobCategory;
      $category->name=$request->name;
      $category->status=1;
      if($request->hasFile('icon')){
         $file=$request->file('icon');
         $filename=time().'.'.$file->getClientOriginalExtension();
         $location=public_path('/admin_upload/category/');
         $file->move($location,$filename);
         $category->icon=$filename;

      }
      $category->save();
      return redirect()->back();
   }
   public function freelancer_pro_category_edit_save(Request $request){
       $category=JobCategory::find($request->id);
      if($request->name){
         $category->name=$request->name;
      }
      if($request->hasFile('icon')){
         $file=$request->file('icon');
         $filename=time().'.'.$file->getClientOriginalExtension();
         $location=public_path('/admin_upload/category/');
         $file->move($location,$filename);
         $category->icon=$filename;
      }
      $category->save();
      return redirect('Category/freelancer_pro');
   }
   public function delelte_freelancer_category(){
      $category = JobCategory::find($request->id);
      $category->delete();
      return 'success';
   }
   public function video_category(){

   }
   public function job_category(){

   }
   public function chore_category(){
      
     return view('_admin.chore_category');
   }
   public function getChoreCategory(){
      $category=ChoreCategory::query();
      return Datatables::of($category)
       ->setRowId('id')
       ->editColumn('status', function ($val) {
           if($val->status==1){
              return 'Active';
           }else{
              return 'Deactivated';
           }
        })
      
       ->addColumn('action', function ($val) {
            $url=url('edit_chore_category/'.$val->id);
            $btn = "";          
            $btn .= '<a class="btn btn-xs btn-warning btn-sm" href="'.$url.'" ><i class="glyphicon glyphicon-remove"></i> Edit</a>';
            $btn .= '<button class="btn btn-xs btn-danger btn-sm"  onclick="delete_chore_category(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
            return $btn;
        })
      ->make(true);

   }
   public function save_chore_category(Request $request){
      $this->validate($request,[
         'name'=>'required'
      ]);
      $category=new ChoreCategory;
      $category->name=$request->name;
      $category->status=1;
      if($request->hasFile('icon')){
         $file=$request->file('icon');
         $filename=time().'.'.$file->getClientOriginalExtension();
         $location=public_path('/admin_upload/category/');
         $file->move($location,$filename);
         $category->icon=$filename;

      }
      $category->save();
      return redirect()->back();
   }
   public function delete_chore_category(Request $request){
      $review = ChoreCategory::find($request->id);
      $review->delete();
      return 'success';
   }
   public function chore_category_edit_save(Request $request){
      $category=ChoreCategory::find($request->id);
      if($request->name){
         $category->name=$request->name;
      }
      if($request->hasFile('icon')){
         $file=$request->file('icon');
         $filename=time().'.'.$file->getClientOriginalExtension();
         $location=public_path('/admin_upload/category/');
         $file->move($location,$filename);
         $category->icon=$filename;
      }
      $category->save();
      return redirect('Category/Chore');

   }
}
