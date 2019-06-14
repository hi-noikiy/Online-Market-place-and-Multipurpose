<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

class DashController extends Controller

{



	public function index() {
		if(Auth::guard('admin')->user()->user_type==3){
			return view('_html.freelancer.freelancer_dashboard');
		}
		else{
			return redirect()->back();
		}
		
	}


	public function index1() {
		if(Auth::guard('admin')->user()->user_type==4){
			return view('_html/pro/pro_dashboard');
		}
		else{
			return redirect()->back();
		}
		
	}


	public function index2() {
		if(Auth::guard('admin')->user()->user_type==2){
			return view('_html/customer/customer_dashboard');
		}
		else{
			return redirect()->back();
		}
		
	}
    //
}
