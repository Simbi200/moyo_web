<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Notification;
use App\Models\Result;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use PDF;

class ParentPortalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('parent');
    }

    // Generate PDF
    public function creaXtePDF()
    {
        // retreive all records from db
        $data = Result::all();

        // share data to view
        view()->share('employee', $data);
        $pdf = PDF::loadView('parent_results', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    public function createPDF(Request $request)
    {

        $user = Auth::user();
        $exams = Exam::where('release', '=', true)
            ->orderBy('year', 'desc')
            ->orderBy('term', 'desc')
            ->orderBy('type', 'desc')
            ->get();

        $res = Result::where('exam_id', '=', $request->input('exam'))
            ->where('user_id', '=', $user->id)
            ->get();

        $user->studentSubjects;
        $user->examResult;
        $data =  [
            'user' => $user,
            'exams' => $exams,
            'results' => $res,
            'curent_exam' => $request->input('exam'),
        ];

        view()->share('results', $data);
        $pdf = PDF::loadView('pdf_view',  $data);
        return $pdf->download('pdf_file.pdf');

    }

    public function parentGetResults(Request $request)
    {

        // $validated = $request->validate([
        //   'exam' => 'required',
        // ]);
        $user = Auth::user();
        $exams = Exam::where('release', '=', true)
            ->orderBy('year', 'desc')
            ->orderBy('term', 'desc')
            ->orderBy('type', 'desc')
            ->get();

        $res = Result::where('exam_id', '=', $request->input('exam'))
            ->where('user_id', '=', $user->id)
            ->get();

        $user->studentSubjects;
        $user->examResult;

        // return $res;

        return view('parent_results', [
            'user' => $user,
            'exams' => $exams,
            'results' => $res,
            'curent_exam' => $request->input('exam'),
        ]);
    }

    public function parentSelectResults()
    {
        $exams = Exam::where('release', '=', true)
            ->orderBy('year', 'desc')
            ->orderBy('term', 'desc')
            ->orderBy('type', 'desc')
            ->get();

        return view('parent_results_select', [
            'exams' => $exams,
        ]);
    }

    public function parentNotifications()
    {
        $notification = Notification::orderBy('updated_at', 'desc')->get();
        return view('parent_notifications', [
            'notifications' => $notification,
        ]);

    }

    public function homepage()
    {
        $user = Auth::user();
        return view('parent_portal', [
            'user' => $user,
        ]);
    }

}
