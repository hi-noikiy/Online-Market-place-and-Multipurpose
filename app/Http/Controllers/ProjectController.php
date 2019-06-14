<?php

namespace App\Http\Controllers;

use App\Skill;
use Validator;
use App\Country;
use Illuminate\Support\Facades\Redirect;
use App\Project;
use App\Category;
use App\Location;
use App\Qualification;
use App\Job;
use App\FreelancerProjectProposal;
use App\ProProjectProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\FreelancerOrderReport;
use App\ProFreeOrder;
use App\SingleProjectComment;
use App\File;
class ProjectController extends Controller
{
    public function index()
    {
        

        $response = [
            'locations' => Location::get(),
            'categories' => Category::get(),
            'projects' => Job::where('jobpro',0)->paginate(15),
        ];

        return view('_html.project.project', ['response' => $response]);
    }
    public function personal_order($id){
        $id=base64_decode(urldecode($id));
        return view( '_html.freelancer.personal_order')->with('id',$id);
    }

    public function indexAjax(Request $request)
    {
        if ($request->ajax()) {
            $urlToArray = explode("/", url()->current());
            $key = count($urlToArray) - 2;
            $freelancer_type = 0;
            if ($urlToArray[$key] == 'Freelancer') {
                $freelancer_type = 1;
            } else if ($urlToArray[$key] == 'Pro') {
                $freelancer_type = 2;
            }

            $where = [
                ['pro.user_type', '=', $freelancer_type],
            ];

            //Search filter apply
            if (!empty($request->keyword)) {
                $where[] = ['pro.title', 'like', "%{$request->keyword}%"];
            }

            if (!empty($request->category)) {
                $where[] = ['pro.category_id', '=', $request->category];
            }

            if (!empty($request->experience)) {
                if ($request->experience >= 4) {
                    $where[] = ['pro.experience', '>=', $request->experience];
                } else {
                    $where[] = ['pro.experience', '=', $request->experience];
                }
            }

            if (!empty($request->location)) {
                $where[] = ['pro.location', '=', $request->location];
            }

            if (!empty($request->budgetFrom)) {
                $where[] = ['pro.budget', '>=', $request->budgetFrom];
            }

            if (!empty($request->budgetTo)) {
                $where[] = ['pro.budget', '=<', $request->budgetTo];
            }

            // dd($where);

            $response = [
                'projects' => DB::table('projects as pro')->select('pro.id', 'pro.title', 'pro.budget', 'pro.experience')
                    ->addSelect('loc.name as location', 'country.name as country', 'users.name as user_name', 'cat.name as category')
                    ->join('categories as cat', 'pro.category_id', '=', 'cat.id')
                    ->leftJoin('locations as loc', 'pro.location', '=', 'loc.id')
                    ->leftJoin('countries as country', 'pro.country', '=', 'country.id')
                    ->join('users', 'pro.created_by', '=', 'users.id')
                    ->where($where)
                    ->where('pro.type', '=', 1)
                    ->orderBy('pro.id', 'desc')
                    ->paginate(2),
            ];

            return view('_html.ajax.ajaxProject', ['response' => $response]);

        }
    }

    public function post_a_proposal(Request $request)
    {
        $user=Auth::guard('admin')->user();
        $proposal= new FreelancerProjectProposal;
        $proposal->user_id=$user->id;
        $proposal->gig_id=$request->gig_id;
        $proposal->project_id=$request->project_id;
        $proposal->description=$request->description;
        $proposal->price=$request->price;
        $proposal->delivery_time=$request->delivery;
        $proposal->status=0;
        $proposal->created_at = date('Y-m-d H:i:s');
        $proposal->save();
       
        Session::flash('requestmessage','Proposal Sent');
        return redirect()->back();
    }
    public function post_a_job_proposal( Request $request){
        $user = Auth::guard('admin')->user();
        $proposal = new ProProjectProposal;
        $proposal->user_id = $user->id;
        $proposal->gig_id = $request->gig_id;
        $proposal->project_id = $request->project_id;
        $proposal->description = $request->description;
        $proposal->price = $request->price;
        $proposal->delivery_time = $request->delivery;
        $proposal->status = 0;
        $proposal->created_at = date('Y-m-d H:i:s');
        $proposal->save();
        Session::flash('requestmessage', 'Proposal Sent');
        return redirect()->back();
    }
    public function projectCreate()
    {
        // $data = [
        //     'categories' => Category::getUserCategories()->get(),
        //     'countries' => Country::get(),
        //     'qualifications' => Qualification::where('status', '=', 1)->get(),
        //     'skills' => Skill::where('status', '=', 1)->get(),
        // ];

        // return view('_html.project.projectCreate', ['data' => $data]);
        $project=0;
        return view('_html.customer.create_job')->with('flag',$project);
    }
    public function single_project_details($id)
    {
        $id=base64_decode(urldecode($id));
        $proposal= FreelancerProjectProposal::find($id);
        $project=Job::where('id',$proposal->project_id)->first();
        return view('_html.freelancer.single_project_details')->with('proposal',$proposal)->with('project',$project);

    }
    public function delivery($proposal)
    {
        return view('_html.freelancer.delivery')->with('proposal',$proposal);
    }
    public function delivery_save(Request $request,$proposal)
    {
        $id = base64_decode(urldecode($proposal));
        $proposal = FreelancerProjectProposal::find($id);
        $order=ProFreeOrder::where('freelancer_type',0)
                            ->where('proposal_id', $proposal->id)->first();
        $order->status=4;
        $order->save();                    
        $delivery = new FreelancerOrderReport;
        $delivery->comment=$request->description;
        $delivery->seller_id=Auth::guard('admin')->user()->id;
        $delivery->customer_id=$order->customer_id;
        $delivery->freelancer_type=0;
        $delivery->type=0;
        $delivery->order_id=$order->id;
        $delivery->status=0;
        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $location = public_path('/uploads/file/');

            // Image::make($image)->save($location);
            $file->move($location, $filename);
          
            $f=new File;
            
            $f->file = $filename;
            $f->item_type=0;
            $f->item_id=$delivery->id;
            $f->save();
        }
        $delivery->save();
        return redirect('/');

    }
    public function project_cancel($proposal)
    {
        $id = base64_decode(urldecode($proposal));
        $proposal = FreelancerProjectProposal::find($id);
       // return $proposal->id;
        $order = ProFreeOrder::where('freelancer_type', 0)
            ->where('proposal_id', $proposal->id)->first();
        $order->status = 4; //dispute opened
        $order->save();  
        $report = new FreelancerOrderReport;
        $report->seller_id = Auth::guard('admin')->user()->id;
        $report->freelancer_type = 0;
        $report->customer_id = $order->customer_id;
        $report->type=2;
        $report->order_id=$order->id;
        $report->save();
        return redirect('/');   
    }
    public function extend_time(Request $request,$proposal)
    {
        $id = base64_decode(urldecode($proposal));
        $proposal = FreelancerProjectProposal::find($id);
        $order = ProFreeOrder::where('freelancer_type', 0)
            ->where('proposal_id', $proposal->id)->first();
        $order->status = 4; //dispute opened
        $order->save();
        $report = new FreelancerOrderReport;
        $report->type=1;
        $report->extension_day=$request->day;
        $report->seller_id = Auth::guard('admin')->user()->id;
        $report->customer_id = $order->customer_id;
        $report->freelancer_type = 0;
        $report->order_id = $order->id;
        $report->comment=$request->extension;
        $report->save();
        return redirect('/');
    }
    public function add_commnet(Request $request)
    {
        $this->validate($request, [
           'comment' => 'required',
        ]);
        $comment=new SingleProjectComment;
        $comment->sender=$request->sender;
        $comment->order_id=$request->order;
        
        $comment->comment=$request->comment;
       
        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $location = public_path('/uploads/file/');

            // Image::make($image)->save($location);
            $file->move($location, $filename);
            
            $comment->file=$filename;
        }else 
        {
            $comment->file=-10;
        }
        $comment->save();
        $order=ProFreeOrder::find($request->order);
        $report = new FreelancerOrderReport;
        $report->type = 4;
        $report->order_id = $request->order;
        $report->seller_id=Auth::guard('admin')->user()->id;
        $report->customer_id=$order->customer_id;
        $report->freelancer_type=0;
        $report->save();
        return redirect()->back();
    }

   public function test(){
    //   $a= FreelancerProjectProposal::where('id',1)->freelancerproposal;
    // //  $a=$a->freelancerproposal;
    //   return $a;
    $num=\csrf_token();
    return $num;
   }
}
