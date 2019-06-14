<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
class DashboardController extends Controller
{
    public function index()
    {
        return false;
    }

    public function home()
    {
       $data=Session::get('check');
       if($data!= 'matul'){
        // 
        
         return view('welcome');
       }
        if (!Auth::guard('admin')->check() && !Auth::check()) {
            return view('_html.layouts.app');
        }
        elseif(Auth::check()){
          return view('_html.layouts.app');
        }
        elseif (Auth::guard('admin')->user()->user_type == 1) { //Admin
            return view('_admin.home');
        } 
        elseif(Auth::guard('admin')->user()->user_type==3){
          return Redirect::to( 'freelancer-dash');  
        }
        elseif(Auth::guard('admin')->user()->user_type==4){
          return Redirect::to( 'pro-dash');  
        }
        elseif(Auth::guard('admin')->user()->user_type==2){
          return Redirect::to( 'customer-dash');  
        }
        elseif(Auth::guard('admin')->user()->user_type==5){
          return Redirect::to('');  
        }
       
    }

    public function setting()
    {
        return view('_admin.setting');
    }
}
