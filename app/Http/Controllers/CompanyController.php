<?php

namespace App\Http\Controllers;

use App\Apply;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        return view('_html.company.companyDetails');
    }

    public function overView()
    {
        $data = [
            'jobHistory' => Project::getJobs()->where('projects.created_by', '=', Auth::id())->orderBy('projects.id', 'desc')->paginate(3),
            'appliedJob' => Apply::getCompanyAppliedJobList()->paginate(2),
            'invitationJob' => Apply::getCompanyInvitationJobs()->paginate(1),
        ];

        return view('_html.company.companyOverView', ['data' => $data]);
    }

    public function getJobHistoryAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['jobHistory'] = Project::getJobs()->where('projects.created_by', '=', Auth::id())->orderBy('projects.id', 'desc')->paginate(3);
            return view('_html.ajax.ajaxCompanyJobHistory', ['data' => $data]);
        }
    }
    
    public function getAppliedJobAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['appliedJob'] = Apply::getCompanyAppliedJobList()->paginate(2);
            return view('_html.ajax.ajaxCompanyAppliedJob', ['data' => $data]);
        }
    }
    
    public function getInvitationJobAjax(Request $request)
    {
        if ($request->ajax()) {
            $data['invitationJob'] =  Apply::getCompanyInvitationJobs()->paginate(1);
            return view('_html.ajax.ajaxCompanyInvitationJob', ['data' => $data]);
        }
    }

}
