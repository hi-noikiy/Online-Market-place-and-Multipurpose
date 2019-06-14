<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index()
    {
        $data = [
            'courses' => Courses::where('status', '=', 1)->paginate(3),
        ];

        return view('_html.courses.courses', ['data' => $data]);
    }

    public function coursesAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['courses'] = Courses::where('status', '=', 1)->paginate(3);
            return view('_html.ajax.ajaxCourses', ['data' => $data]);
        }
    }

    public function coursesDetails($id)
    {
        if (!Auth::check()) {
            return redirect()->route('Login');
        }

        $data = Courses::where('status', '=', 1)->find(base64_decode(urldecode($id)));
        return view('_html.courses.coursesDetails', ['data' => $data]);
    }
}
