<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\About;
use App\Models\User;

class MainController extends Controller
{
 

    public function aboutUs()
    {
        $about = About::all();
        return view('about', [
            'about' => $about,
        ]);

    }

    public function index()
    {
        $staff = User::all();
        return view('staff', [
            'staff' => $staff,
        ]);

    }

    public function home()
    {

        $notifications = Notification::where('type', '=', 'public')->get();
        $notCount = Notification::where('type', '=', 'public')->count();
        return view('adhome', [
            'notifications' => $notifications,
            'notCount' => $notCount,
        ]);

    }

    public function user($id)
    {
        $user = User::findOrFail($id);

        return ['data' => $user];

    }
}
