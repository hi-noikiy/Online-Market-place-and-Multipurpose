<?php

namespace App\Http\Controllers;

use App\ApplyScholarship;
use App\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ScholarShipController extends Controller
{
    public function index()
    {
        $data = [
            'scholarShip' => Scholarship::getScholarShip()->paginate(3),
        ];

        return view('_html.scholarShip.scholarShip', ['data' => $data]);
    }

    public function readAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['scholarShip'] = Scholarship::getScholarShip()->paginate(3);
            return view('_html.ajax.ajaxScholarShip', ['data' => $data]);
        }
    }

    public function scholarShipDetails($id)
    {
        if (!Auth::check()) {
            return redirect()->route('Login');
        }

        $data = ScholarShip::whereDate('end_date', '>=', date('Y-m-d'))->find(base64_decode(urldecode($id)));
        return view('_html.scholarShip.scholarShipDetails', ['data' => $data]);
    }

    public function applyScholarship(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'email' => 'required|email',
            'cover_letter' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        //Check already apply
        $isApply = ApplyScholarship::where([
            ['user_id', '=', Auth::id()],
            ['scholarship_id', '=', $request->id],
        ])->first();

        if (!empty($isApply)) {
            return response()->json(['status' => 'error', 'message' => "You have already applied this scholarship"]);
        }

        $applyScholarship = new ApplyScholarship;
        $applyScholarship->user_id = Auth::id();
        $applyScholarship->scholarship_id = $request->id;
        $applyScholarship->status = 1; //Applied
        $applyScholarship->created_at = date('Y-m-d H:i:s');

        if ($applyScholarship->save()) {
            return response()->json(['status' => "success", 'message' => "ScholarShip have applied successfully"]);
        } else {
            return response()->json(['status' => "error", 'message' => "ScholarShip have applied failed"]);
        }
    }
}
