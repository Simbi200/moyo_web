<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // foreach (Auth::user()->type as $type) {
        if (Auth::user()->type == 'teacher' || Auth::user()->type == 'admin_teacher') {
            return $next($request);
        }else if (Auth::user()->type == 'student') {
          return redirect('/parent_results_select');          
        }else if (Auth::user()->type == 'admin' || Auth::user()->type == 'admin_teacher') {
          return redirect('/admin_content');          
        }else{
          return redirect('/');
        }
        // }


    }
}
