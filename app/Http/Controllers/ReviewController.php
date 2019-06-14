<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Helpers\GeneralHelper;

class ReviewController extends Controller
{
    public function get_review_num(Request $request){
       $review= GeneralHelper::get_total_review($request->item_id, $request->item_type);
       foreach($review as $review)
       {
            return $review;
            break;
       }
       
    }
}
