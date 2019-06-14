<?php



namespace App\Helpers;
use App\Review; 
use App\View;
use Auth;
use DateTime;
class GeneralHelper
{
    //get active theme
    public static function get_global_view( $item_id, $item_type)
    {
        if (Auth::guard('admin')->check()) {
            $u = Auth::guard('admin')->user();
            $type = 1;
            $view = View::where('item_id', $item_id)->where('item_type', $item_type)->where('viewer_id', $u->id)->where('veiwer_type', 1)->first();
        } else {
            $u = Auth::user();
            $type = 0;
            $view = View::where('item_id', $item_id)->where('item_type', $item_type)->where('viewer_id', $u->id)->where('veiwer_type', 0)->first();
        }
        return $view;
    }
    public static function set_global_view($item_id,$item_type)
    {
        if(Auth::guard('admin')->check()){
            $u=Auth::guard('admin')->user();
            $type=1;
            $view = View::where('item_id', $item_id)->where('item_type', $item_type)->where('viewer_id', $u->id)->where('veiwer_type', 1)->first();
        }
        else{
            $u=Auth::user();
            $type=0;
            $view = View::where('item_id', $item_id)->where('item_type', $item_type)->where('viewer_id', $u->id)->where('veiwer_type', 0)->first();
        }
        if(count($view)==0)
        {
            $view=new View;
            $view->item_type=$item_type;
            $view->item_id=$item_id;
            $view->viewer_id=$u->id;
            $view->type=$type;
            $view->view=1;
            $view->scale_factor=0;
            $view->created_at = date('Y-m-d H:i:s');
            $view->save();

        }
        else{
            $num = $view->scale_factor;
            $num++;
            if ($num % 10 == 0) {
                $view->view++;
                $view->scale_factor = 0;
            } else {
                $view->scale_factor++;
            }
            $view->save();
        }
       return $view;
    }
    public static function set_total_review($item_id,$item_type,$num)
    {
        $last=Review::where('item_id',$item_id)->where('item_type',$item_type)->first();
        
        $last_count=Review::where('item_id', $item_id)->where('item_type', $item_type)->count();
        if($last_count==0)
        {
            $review = new Review;
            $review->item_id = $item_id;
            $review->item_type = $item_type;
            if (Auth::check()) {
                $review->giver_id = Auth::user()->id;
            } elseif (Auth::guard('admin')->check()) {
                $review->giver_id = Auth::guard('admin')->user()->id;
            }

            $review->giver_num = $num;
            $review->number = $num;
            $review->save();
        }
        else{
            $review = new Review;
            $review->item_id = $item_id;
            $review->item_type = $item_type;
            if (Auth::check()) {
                $review->giver_id = Auth::user()->id;
            } else if (Auth::guard('admin')->check()) {
                $review->giver_id = Auth::guard('admin')->user()->id;
            }

            $review->giver_num = $num;
            $review->save();
            $count_review = where('item_id', $item_id)->where('item_type', $item_type)->count();
            $t = ($last->number * $last_count) + $num;
            $review->number = $t / $count_review;
            $review->save();
        }
        
        return $review;

    }
    public static function get_total_review($item_id,$item_type)
    {
        $review=Review::where('item_id',$item_id)->where('item_type',$item_type)->get();
        return $review;
    }
    public static function get_delivery_time($created_at,$delivery_time){
        $date = new DateTime($created_at);
       // $date->add(new DateInterval("P7D"));
         $str='+'.$delivery_time.' day';
     //  return $str;
        $date->modify($str);
        return $date;
    }
    public static function notification($proposals,$orders,$user)
    {
        $nofication=array();
        if(!$proposals)
        {
            
        }
    }
    public static function ago($created_at){
        $time = strtotime($created_at);
        $date = date('Y-m-d H:i:s', $time);
        $date = date_create($date);
        $nowdate = date("Y-m-d H:i:s");
        $nowdate = date_create($nowdate);
        $diff = date_diff($nowdate, $date);

        if ($diff->s > 0 && $diff->i < 1  && $diff->h <= 0 && $diff->d <= 0 && $diff->m <= 0 && $diff->y <= 0) {
            $timestring = 'just now';
        } elseif ($diff->i >= 1  && $diff->h <= 0 && $diff->d <= 0 && $diff->m <= 0 && $diff->y <= 0) {
            $timestring = $diff->i . 'm  ago';
        } elseif ($diff->i >= 1  && $diff->h >= 0 && $diff->d <= 0 && $diff->m <= 0 && $diff->y <= 0) {
            $timestring = $diff->h . 'h    ' . $diff->i . 'm ago';
        } elseif ($diff->h >= 0 && $diff->d >= 0 && $diff->m <= 0 && $diff->y <= 0) {
            $timestring = $diff->d . 'd  ' . $diff->h . 'h ago';
        } elseif ($diff->d >= 0 && $diff->m >= 0 && $diff->y <= 0) {
            $timestring = $diff->m . 'months  ' . $diff->d . 'days ago';
        } elseif ($diff->m >= 0 && $diff->y >= 0) {
            $timestring = $diff->y . ' year ' . $diff->m . ' months ago';
        }
        return $timestring;
    }
}