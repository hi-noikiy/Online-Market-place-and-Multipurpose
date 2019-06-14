<?php

namespace App\Http\Controllers\admin;

use Validator;
use App\Project;
use App\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        return view('_admin.category');
    }

    public function getCategories()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $getCategories = Category::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'id', 'name', 'slug', 'icon', 'created_by', 'created_at', 'type', 'status'])
            ->orderBy('id', 'desc')
            ->get();
        $datatables = Datatables::of($getCategories);

        //Edit status value
        $datatables->editColumn('status', function ($val) {
            if ($val->status == 1) {
                $status = "Active";
            } else {
                $status = "Inactive";
            }
            return $status;
        });

        //Type value replace
        $datatables->editColumn('type', function ($val) {
            return getAdminCategoryName($val->type);
        });

        //Edit created_at value
        $datatables->editColumn('created_at', function ($val) {
            return date('Y-m-d', strtotime($val->created_at));
        });

        //Add action column
        $datatables->addColumn('action', function ($val) {
            $btn = "";
            $btn .= '<button class="btn btn-xs btn-warning btn-sm" onclick="editCategory(' . $val->id . ')"><i class="glyphicon glyphicon-edit"></i> Edit</button>';
            $btn .= '<button class="btn btn-xs btn-danger btn-sm" onclick="deleteCategory(' . $val->id . ')"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
            return $btn;
        });

        return $datatables->make(true);
    }

    public function saveCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'icon' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $category = new Category;
        $category->name = $request->name;
        $category->slug = strtolower($request->slug);
        $category->icon = $request->icon;
        $category->type = $request->type;
        $category->status = $request->status;
        $category->created_by = Auth::id();
        $category->created_by_ip = \Request::ip();
        $category->created_at = date('Y-m-d H:i:s');
        if ($category->save()) {
            return response(['status' => "success", 'message' => "Category Save Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Category Save Failed"]);
        }
    }

    public function GetCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $category = Category::find($request->id);
        if ($category) {
            return response(['status' => "success", 'message' => "Category Data Found", 'data' => $category]);
        } else {
            return response(['status' => "error", 'message' => "Category Data Not Found"]);
        }
    }

    public function updateCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'icon' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        //Check exist slug name
        $existSlug = Category::select('id')
            ->where([
                ['slug', '=', $request->slug],
                ['id', '!=', $request->id],
            ])->first();

        if (!empty($existSlug)) {
            return response(['status' => "error", 'message' => "Duplicate Slug name found"]);
        }

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug = strtolower($request->slug);
        $category->icon = $request->icon;
        $category->type = $request->type;
        $category->status = $request->status;
        $category->updated_by = Auth::id();
        $category->updated_by_ip = \Request::ip();
        $category->updated_at = date('Y-m-d H:i:s');
        if ($category->save()) {
            return response(['status' => "success", 'message' => "Category Update Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Category Update Failed"]);
        }
    }

    public function deleteCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        //Check dependancy
        $is_publish_project = Project::where('category_id', '=', $request->id)->first();
        if (!empty($is_publish_project)) {
            return response(['status' => "error", 'message' => "Category already used to publish project"]);
        }

        $category = Category::find($request->id);
        if ($category->delete()) {
            return response(['status' => "success", 'message' => "Category Deleted Successfully"]);
        } else {
            return response(['status' => "error", 'message' => "Category Deleted Failed"]);
        }
    }
}
