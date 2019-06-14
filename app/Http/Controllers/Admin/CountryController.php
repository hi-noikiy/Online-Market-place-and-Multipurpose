<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Yajra\Datatables\Datatables;

class CountryController extends Controller
{
    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     $this->user = Auth::guard('admin')->user();
        //     if ($this->user->user_type != 1) {
        //         return redirect()->route('dashboard');
        //     }
        //     return $next($request);
        // });

    }

    public function index()
    {
        return view('_admin.country');
    }

    public function getCountries()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $getCountry = Country::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'id', 'name','status','created_at'])
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
            $btn .= '<button class="btn btn-xs btn-warning btn-sm" onclick="editCountry(' . $val->id . ')"><i class="glyphicon glyphicon-edit"></i> Edit</button>';
            $btn .= '<button class="btn btn-xs btn-danger btn-sm" onclick="deleteCountry(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
            return $btn;
        });

        return $datatables->make(true);
    }

    public function saveCountry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $country = new Country;
        $country->name = $request->name;
        $country->status = $request->status;
        $country->created_at = date('Y-m-d H:i:s');
        if ($country->save()) {
            return response(['status' => "success", 'message' => "Country Save Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Country Save Failed"]);
        }
    }

    public function GetCountry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $country = Country::find($request->id);
        if ($country) {
            return response(['status' => "success", 'message' => "Country Data Found", 'data' => $country]);
        } else {
            return response(['status' => "error", 'message' => "Country Data Not Found"]);
        }
    }

    public function updateCountry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $country = country::find($request->id);
        $country->name = $request->name;
        $country->status = $request->status;
        $country->updated_at = date('Y-m-d H:i:s');
        if ($country->save()) {
            return response(['status' => "success", 'message' => "Country Update Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Country Update Failed"]);
        }
    }

    public function deleteCountry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        //Check dependacy
        $is_publish_project = Project::where('country','=',$request->id)->first();
        if(!empty($is_publish_project)){
            return response(['status' => "error", 'message' => "Country already used to publish project"]);
        }        

        $country = Country::find($request->id);
        if ($country->delete()) {
            return response(['status' => "success", 'message' => "Country Deleted Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Country Deleted Failed"]);
        }
    }
}
