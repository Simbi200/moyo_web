<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Result;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class TeacherPortalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher');
    }

    public function homepage()
    {
        return view('teacher_portal');
    }

    public function viewEnterResultsPage()
    {

        $students = User::where('type', '=', 'student')
            ->get();

        $exams = Exam::where('release', '=', false)
            ->get();

        $results = Result::get();

        foreach ($students as $student) {
            $student['subjects'] = $student->studentSubjects;
        }

        return view('teacher_results', [
            'students' => $students,
            'exams' => $exams,
            'results' => $results,
        ]);
    }

    public function storeStudentGrade(Request $request, $form, $subject_id, $exam_id)
    {
        $grade;
        $remark;
        $teacher_id = Auth::user()->id;

        $students = User::where('form', '=', $form)
            ->get();

        foreach ($students as $student) {
            $id = $form . '-' . $subject_id . '-' . 'id' . $student->id;

            if (isset($request->$id)) {

                $markX = $form . '-' . $subject_id . '-' . 'mark' . $student->id;
                $remarkX = $form . '-' . $subject_id . '-' . 'remark' . $student->id;
                if (isset($request->$markX)) {
                    if ($form < 3) {
                        if ($request->input($markX) < 39) {
                            $grade = 'F';
                            $remark = 'Fail';
                        } else if ($request->input($markX) >= 40 && $request->input($markX) < 58) {
                            $grade = 'D';
                            $remark = 'Pass';
                        } else if ($request->input($markX) >= 58 && $request->input($markX) < 69) {
                            $grade = 'C';
                            $remark = 'Credit';
                        } else if ($request->input($markX) >= 69 && $request->input($markX) < 80) {
                            $grade = 'B';
                            $remark = 'Credit';
                        } else if ($request->input($markX) >= 80 && $request->input($markX) <= 100) {
                            $grade = 'A';
                            $remark = 'Distinction';
                        }

                    } else if ($form < 3) {
                        if ($request->input($markX) < 39) {
                            $grade = 9;
                            $remark = 'Fail';
                        } else if ($request->input($markX) >= 40 && $request->input($markX) < 46) {
                            $grade = 8;
                            $remark = 'Pass';
                        } else if ($request->input($markX) >= 46 && $request->input($markX) < 52) {
                            $grade = 7;
                            $remark = 'Pass';
                        } else if ($request->input($markX) >= 52 && $request->input($markX) < 58) {
                            $grade = 6;
                            $remark = 'Credit';
                        } else if ($request->input($markX) >= 58 && $request->input($markX) < 64) {
                            $grade = 5;
                            $remark = 'Credit';
                        } else if ($request->input($markX) >= 64 && $request->input($markX) <70) {
                            $grade = 4;
                            $remark = 'Credit';
                        } else if ($request->input($markX) >= 70 && $request->input($markX) <76) {
                            $grade = 3;
                            $remark = 'Credit';
                        } 
                        else if ($request->input($markX) >= 76 && $request->input($markX) <80) {
                            $grade = 2;
                            $remark = 'Distinction';
                        }
                        else if ($request->input($markX) >= 80 && $request->input($markX) <= 100) {
                            $grade = 1;
                            $remark = 'Distinction';
                        }
                    }

                }

                $res = Result::where('exam_id', '=', $exam_id)
                    ->where('user_id', '=', $student->id)
                    ->where('subject_id', '=', $subject_id)
                    ->get();

                if (isset($request->$markX) && isset($request->$remarkX)) {

                    if ($res && $res->count() > 0) {
                        $res[0]->update([
                            'result' => $request->input($markX),
                            'remark' => $request->input($remarkX),
                        ]);

                    } else {

                        $result = Result::create([
                            'exam_id' => $exam_id,
                            'user_id' => $student->id,
                            'subject_id' => $subject_id,
                            'teacher_id' => $teacher_id,
                            'result' => $request->input($markX),
                            'remark' => $request->input($remarkX),
                        ]);

                    }
                } else if (isset($request->$markX) && !isset($request->$remarkX)) {
                    if ($res && $res->count() > 0) {
                        $res[0]->update([
                            'result' => $request->input($markX),
                        ]);
                    }
                } else if (!isset($request->$markX) && isset($request->$remarkX)) {
                    if ($res && $res->count() > 0) {
                        $res[0]->update([
                            'remark' => $request->input($remarkX),
                        ]);
                    }

                } else {
                    # code...
                }

            }}
        return back();
    }

}
