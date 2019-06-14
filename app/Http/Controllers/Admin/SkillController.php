<?php

namespace App\Http\Controllers\Admin;

use App\Skill;
use Validator;
use App\Project;
use App\UserInfo;
use App\SkillDetails;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
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
        return view('_admin.skill');
    }

    public function getSkills()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $getCountry = Skill::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'id', 'name', 'status', 'created_at'])
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
            $btn .= '<button class="btn btn-xs btn-warning btn-sm" onclick="editSkill(' . $val->id . ')"><i class="glyphicon glyphicon-edit"></i> Edit</button>';
            $btn .= '<button class="btn btn-xs btn-danger btn-sm" onclick="deleteSkill(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
            return $btn;
        });

        return $datatables->make(true);
    }

    public function saveSkill(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $skill = new Skill;
        $skill->name = $request->name;
        $skill->status = $request->status;
        $skill->created_at = date('Y-m-d H:i:s');
        if ($skill->save()) {
            return response(['status' => "success", 'message' => "Skill Save Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Skill Save Failed"]);
        }
    }

    public function getSkill(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $skill = Skill::find($request->id);
        if ($skill) {
            return response(['status' => "success", 'message' => "Skill Data Found", 'data' => $skill]);
        } else {
            return response(['status' => "error", 'message' => "Skill Data Not Found"]);
        }
    }

    public function updateSkill(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $skill = Skill::find($request->id);
        $skill->name = $request->name;
        $skill->status = $request->status;
        $skill->updated_at = date('Y-m-d H:i:s');
        if ($skill->save()) {
            return response(['status' => "success", 'message' => "Skill Update Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Skill Update Failed"]);
        }
    }

    public function deleteSkill(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        //Check dependacy
        // $check_skill_details =  SkillDetails::where('skill_id', $request->id);
        // $check_user_details =  UserInfo::whereRaw('JSON_CONTAINS(skill_id, "' . $request->id . '")');
        $is_publish_skill = Project::whereRaw('JSON_CONTAINS(skill_ids, "' . $request->id . '")')
        // ->union($check_skill_details)
        // ->union($check_user_details)
        ->first();
        if (!empty($is_publish_skill)) {
            return response(['status' => "error", 'message' => "Skill already used"]);
        }

        $skill = Skill::find($request->id);
        if ($skill->delete()) {
            return response(['status' => "success", 'message' => "Skill Deleted Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Skill Deleted Failed"]);
        }
    }

}
