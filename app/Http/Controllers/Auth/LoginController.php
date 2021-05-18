<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   

    // protected function sendLoginResponse(Request $request)
    // {
    //     $request->session()->regenerate();

    //     $this->clearLoginAttempts($request);
    //     $m = $this->guard()->user()->type;

    //     foreach ($m as $user_type) {

    //       if ($user_type == 'admin_teacher' || $user_type == 'admin') {
    //         return redirect('/admin_portal');
    //       } 

    //       else if ($user_type == 'teacher') {
    //         return redirect('/admin_portal');
    //       }

    //       else if ($user_type == 'student') {
    //         return redirect('/admin_portal');
    //       }
          
          

    //     }

    //     // if ($response = $this->authenticated($request, $this->guard()->user())) {
    //     //     return $response;
    //     // }

    //     // return $request->wantsJson()
    //     //             ? new JsonResponse([], 204)
    //     //             : redirect()->intended($this->redirectPath());
    // }
}
