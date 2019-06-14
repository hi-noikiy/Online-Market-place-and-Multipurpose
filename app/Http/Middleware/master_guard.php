<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Hash;
use App\SuperAdmin;
use Auth;

class master_guard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('master')->user();

        $token = \csrf_token();
        if($user!=null){
                $admin = SuperAdmin::find($user->id)->admin;
            if (Hash::check($token, $user->confirm_code_2)) {
                if ($user->random_code_1 == null && $admin->status == 1) {
                // return 'matul';
                    return $next($request);
                }
            }
        }
       
        return redirect('/adminLogin/kkccppss/99mm');
      // print_r('hi');
      
    }
}
