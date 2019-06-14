<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Education;
use App\Qualification;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QualificationController extends Controller
{
    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     $this->user = Auth::user();
        //     if ($this->user->user_type != 1) {
        //         return redirect()->route('dashboard');
        //     }
        //     return $next($request);
        // });
    }

    public function index()
    {
        return view('_admin.qualification');
    }

    public function getQualifications()
    {        
        DB::statement(DB::raw('set @rownum=0'));
        $getCountry = Qualification::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'id', 'name','status','created_at'])
            ->orderBy('id', 'desc')
            ->get();

        $datatables = Datatables::of($getCountry);
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
            $btn .= '<button class="btn btn-xs btn-warning btn-sm" onclick="editQualification(' . $val->id . ')"><i class="glyphicon glyphicon-edit"></i> Edit</button>';
            $btn .= '<button class="btn btn-xs btn-danger btn-sm" onclick="deleteQualification(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
            return $btn;
        });

        return $datatables->make(true);
    }

    public function saveQualification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $qualification = new Qualification;
        $qualification->name = $request->name;
        $qualification->status = $request->status;
        $qualification->created_at = date('Y-m-d H:i:s');
        if ($qualification->save()) {
            return response(['status' => "success", 'message' => "Qualification Save Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Qualification Save Failed"]);
        }
    }

    public function getQualification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $qualification = Qualification::find($request->id);
        if ($qualification) {
            return response(['status' => "success", 'message' => "Qualification Data Found", 'data' => $qualification]);
        } else {
            return response(['status' => "error", 'message' => "Qualification Data Not Found"]);
        }
    }

    public function updateQualification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $qualification = Qualification::find($request->id);
        $qualification->name = $request->name;
        $qualification->status = $request->status;
        $qualification->updated_at = date('Y-m-d H:i:s');
        if ($qualification->save()) {
            return response(['status' => "success", 'message' => "Qualification Update Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Qualification Update Failed"]);
        }
    }

    public function deleteQualification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        //Check dependacy
        $is_publish_qualification = Education::where('qualification_id','=',$request->id)->first();
        if(!empty($is_publish_qualification)){
            return response(['status' => "error", 'message' => "Qualification already used to publish to education"]);
        }        

        $qualification = Qualification::find($request->id);
        if ($qualification->delete()) {
            return response(['status' => "success", 'message' => "Qualification Deleted Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Qualification Deleted Failed"]);
        }
    }


}
