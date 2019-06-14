<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = DB::table('projects')
            ->join('locations', 'projects.location', '=', 'locations.id')
            ->Select('projects.title', 'projects.end_date', 'projects.job_price', 'projects.job_type', 'locations.name')
            ->where('title', 'LIKE', '%' . $request->keyword . "%")
            ->paginate(10);

        return view('/_html/searchResult', compact('search'));

    }
}
