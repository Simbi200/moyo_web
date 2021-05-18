<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class ParentMiddleware
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
        if (Auth::user()->type == 'student') {
            return $next($request);
        } else if (Auth::user()->type == 'admin' || Auth::user()->type == 'admin_teacher') {
            return redirect('/admin_content');
        } else if (Auth::user()->type == 'teacher') {
            return redirect('/teacher_results');
        } else {
            return redirect('/');

        }
        // }

    }
}
