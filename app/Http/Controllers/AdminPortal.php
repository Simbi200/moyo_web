<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Notification;
use App\Models\Result;
use App\Models\Subject;
use App\Models\About;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminPortal extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function changePassword(Request $request)
    {

    //  return $validated = $request->validate([
    //     'password' => 'required|min:10',
    //     'body' => 'required',
    // ]);

      if ($request->input('password') == $request->input('password_confirmation')  ) {

        if (Auth::user()->update([
          'password' => Hash::make($request->input('password')),
        ])){
          Session::flash('message', 'Password changed successfuly');
          Session::flash('alert-class', 'alert-success'); 
        }else {
          Session::flash('message', 'Failed to change password'); 
          Session::flash('alert-class', 'alert-danger'); 
        }
        
        // return back();
      } else {
        Session::flash('message', 'Failed to change password'); 
        Session::flash('alert-class', 'alert-danger'); 

      }
      return back() ;

    }

    public function myProfile()
    {
      return view('admin_myprofile');

    }

    public function adminContent()
    {

        $notificationPub = Notification::where('type', '=', 'public')
            ->where('expire', '>=', date('Y-m-d'))
            ->orderBy('updated_at', 'desc')
            ->get();
        $notCountPub = Notification::where('type', '=', 'public')
            ->where('expire', '>=', date('Y-m-d'))
            ->orderBy('updated_at', 'desc')
            ->count();

        $notificationPvt = Notification::where('type', '=', 'parents')
            ->where('expire', '>=', date('Y-m-d'))
            ->orderBy('updated_at', 'desc')
            ->get();
        $notCountPvt = Notification::where('type', '=', 'parents')
            ->where('expire', '>=', date('Y-m-d'))
            ->orderBy('updated_at', 'desc')
            ->count();

      $about = About::get();

        return view('admin_content', [
            'notificationPub' => $notificationPub,
            'notificationPvt' => $notificationPvt,
            'about' => $about,
        ]);

    }

    public function adminEditNotification(Request $request, $id)
    {
      $notification = Notification::findOrFail($id);
        $notification->update([
            'subject' => ucwords($request->input('subject')),
            'notification' => $request->input('notification'),
            'expire' => $request->input('expires-on'),
        ]);
        return back();
    }

    public function editAboutSection(Request $request, $id)
    {
      $about = About::findOrFail($id);
        $about->update([
            'title' => ucwords($request->input('title')),
            'text' => $request->input('text'),
        ]);
        return back();
    }

    public function adminDeleteAboutSection($id)
    {
      About::findOrFail($id)
      ->delete();
        return back();
    }

    public function addAboutUsContent(Request $request)
    {
        $section = About::create([
            'text' => ucwords($request->input('text')),
            'title' => $request->input('title'),
        ]);
        return back();

    }

    public function adminAddNotification(Request $request)
    {

        $notification = Notification::create([
            'subject' => ucwords($request->input('subject')),
            'notification' => $request->input('notification'),
            'type' => $request->input('type'),
            'expire' => $request->input('expires-on'),

        ]);

        return back();

    }

    public function adminCreateExam(Request $request)
    {
        $open = $request->input('open');

        $exam = Exam::create([
            'term' => $request->input('term'),
            'year' => $request->input('year'),
            'release' => false,
            'type' => $request->input('type'),

        ]);
        return back();

    }

    public function releaseExams(Request $request, $exam_id)
    {

        $exam = Exam::findOrFail($exam_id);
        $exam->update([
            'release' => $request->release,
        ]);

        return back();

    }

    public function adminExamView()
    {

        $exams = Exam::orderBy('year', 'desc')
            ->orderBy('term', 'desc')
            ->orderBy('type', 'desc')
            ->get();
        return view('admin_exams', ['exams' => $exams]);

    }

    public function adminPortalView()
    {
        $student_count = User::where('type', '=', 'student')
            ->get()
            ->count();

        $staff_count = User::where('type', '<>', 'student')
            ->get()->
            count();

        return view('admin_portal', [
            'student_count' => $student_count,
            'staff_count' => $staff_count,
        ]);
    }

    public function adminViewStaff($id)
    {
        $user = User::findOrFail($id);
        return view('admin_staff_info', [
            'staff' => $user,
            'subjects' => $user->studentSubjects,
        ]);
    }

    public function adminViewStudent($id)
    {
        $user = User::findOrFail($id);

        return view('admin_student_info', [
            'student' => $user,
            'subjects' => $user->studentSubjects]);
    }

    public function getAdminEditStudentView($id)
    {
        $user = User::findOrFail($id);

        return view('admin_edit_student', [
            'user' => $user,
            'subjects' => $user->studentSubjects,
            'count' => $user->studentSubjects->count(),
        ]);
    }

    public function adminEditStudent(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'f_name' => ucwords($request->f_name),
            'l_name' => ucwords($request->l_name),
            'form' => $request->form,
            'joined_on' => $request->join,
            'dob' => $request->dob,

        ]);

        $this->updateSubject($user, 'agri', 'Agriculture', $request);
        $this->updateSubject($user, 'bio', 'Biology', $request);
        $this->updateSubject($user, 'chem', 'Chemistry', $request);
        $this->updateSubject($user, 'chic', 'Chichewa', $request);
        $this->updateSubject($user, 'comp', 'Computer Studies', $request);
        $this->updateSubject($user, 'eng', 'English', $request);
        $this->updateSubject($user, 'geog', 'Geography', $request);
        $this->updateSubject($user, 'math', 'Mathematics', $request);
        $this->updateSubject($user, 'phy', 'Physics', $request);
        $this->updateSubject($user, 'soc', 'Social & Development Studies and Life Skills', $request);
        return redirect()->route('admin_students');
    }

    public function addStudent(Request $request)
    {

        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $dob = $request->input('dob');
        $sex = 'F';
        $type = 'student';
        $form = $request->input('form');
        $join = $request->input('join');
        $password = null;
        $username = null;


        $password = Hash::make('12345678');

        $user = User::create([
            'f_name' => ucwords($f_name),
            'l_name' => ucwords($l_name),
            'form' => $form,
            'dob' => $dob,
            'sex' => 'F',
            'type' => 'student',
            'joined_on' => $join,
            'password' => $password,
        ]);

        $user->fill([
            'username' => $l_name . $f_name . $user->id]);
        $user->save();

        $this->attachSubjectToUser($user, 'agri', 'Agriculture', $request);
        $this->attachSubjectToUser($user, 'bio', 'Biology', $request);
        $this->attachSubjectToUser($user, 'chem', 'Chemistry', $request);
        $this->attachSubjectToUser($user, 'chic', 'Chichewa', $request);
        $this->attachSubjectToUser($user, 'comp', 'Computer Studies', $request);
        $this->attachSubjectToUser($user, 'eng', 'English', $request);
        $this->attachSubjectToUser($user, 'geog', 'Geography', $request);
        $this->attachSubjectToUser($user, 'math', 'Mathematics', $request);
        $this->attachSubjectToUser($user, 'phy', 'Physics', $request);
        $this->attachSubjectToUser($user, 'soc', 'Social & Development Studies and Life Skills', $request);
        return back();

    }

    public function adminDeleteStudent($id)
    {
        User::findOrFail($id)
            ->delete();
        Result::where('user_id', '=', $id)
            ->delete();

        // $this->meesage('message','Customer deleted successfully!');
        return redirect()->back();
    }

    public function adminDeleteAnnouncement($id)
    {
        $not = Notification::findOrFail($id);
        $not->delete();
        // $this->meesage('message','Customer deleted successfully!');
        return redirect()->back();
    }

    public function adminDeleteStaff($id)
    {

      User::findOrFail($id)
            ->delete();       
        // $this->meesage('message','Customer deleted successfully!');
        return redirect()->back();
    }

    public function adminEditStaff(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill([
            'f_name' => ucwords($request->f_name),
            'l_name' => ucwords($request->l_name),
            'position' => ucwords($request->position),
            'sex' => $request->sex,
            'type' => $request->type,
            'bio' => $request->bio,
            'joined_on' => $request->join]);
        $user->save();
        return redirect()->back();
    }

    public function adminViewAllStaff()
    {
        $users = User::where('type', '<>', 'student')
            ->get();

        return view('admin_all_staff', [
            'users' => $users,
        ]);
    }

    public function adminViewAllStudents()
    {
        $students = User::where('type', '=', 'student')
            ->get();

        foreach ($students as $student) {
            $student['subjests'] = $student->studentSubjects;
        }
        // echo($students);
        return view('admin_all_students', [
            'students' => $students,
        ]);
    }

    public function addStaff(Request $request)
    {
        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $sex = $request->input('sex');
        $type = $request->input('type');
        $position = $request->input('position');
        $join = $request->input('join');
        $password = null;
        $username = null;


        if ($request->input('type') != 'support') {
            $password = Hash::make('12345678');
            $username = $l_name . $f_name;
        }

        $staff = User::create([
            'f_name' => ucwords($f_name),
            'l_name' => ucwords($l_name),
            'position' => ucwords($position),
            'sex' => $sex,
            'type' => $type,
            'joined_on' => $join,
            'username' => $username,
            'password' => $password,
        ]);

        if ($staff->type == 'teacher' || $staff->type == 'admin_teacher') {
            $this->attachSubjectToTeacher($staff, $request);
        }
        return redirect()->back();

    }

    public function updateSubject($user, $subShort, $subjectName, $request)
    {

        $subjectId;
        $linkedSubjects = $user->studentSubjects()->get();
        $subjects = Subject::where('subject', '=', $subjectName)->get();
        $subjectLinked = false;
        $inputRequest = isset($request->$subShort);

        foreach ($subjects as $subject) {
            $subjectId = $subject->id;
        }

        foreach ($linkedSubjects as $linkedSubject) {
            if ($linkedSubject->id == $subjectId) {
                $subjectLinked = true;
            }
        }

        if ($inputRequest && !$subjectLinked) {

            $user->studentSubjects()->attach($subjectId);

        } elseif (!$inputRequest && $subjectLinked) {

            $user->studentSubjects()->detach($subjectId);

        }

    }

    public function attachSubjectToUser($user, $subShort, $subjectName, $request)
    {
        if (isset($request->$subShort)) {
            $subjects = Subject::where('subject', '=', $subjectName)->get();
            foreach ($subjects as $subject) {
                $user->studentSubjects()->attach($subject->id);
            }
        }
    }

    public function attachSubjectToTeacher($user, $request)
    {
        $f1sub1 = 'f1sub1';
        $f1sub2 = 'f1sub2';
        $f2sub1 = 'f2sub1';
        $f2sub2 = 'f2sub2';
        $f3sub1 = 'f3sub1';
        $f3sub2 = 'f3sub2';
        $f4sub1 = 'f4sub1';
        $f4sub2 = 'f4sub2';

        if (isset($request->$f1sub1)) {
            $subN = $request->input($f1sub1);
            $subjects = Subject::where('subject', '=', $request->input($f1sub2))->get();
            foreach ($subjects as $subject) {
                $user->subjectsTeacher()->attach($subject->id, ['class' => 1]);
            }

        }
        if (isset($request->$f1sub2)) {
            $subjects = Subject::where('subject', '=', $request->input($f1sub2))->get();
            foreach ($subjects as $subject) {
                $user->subjectsTeacher()->attach($subject->id, ['class' => 1]);
            }

        }

        if (isset($request->$f2sub1)) {
            $subjects = Subject::where('subject', '=', $request->input($f2sub1))->get();
            foreach ($subjects as $subject) {
                $user->subjectsTeacher()->attach($subject->id, ['class' => 2]);
            }

        }
        if (isset($request->$f2sub2)) {
            $subjects = Subject::where('subject', '=', $request->input($f2sub2))->get();
            foreach ($subjects as $subject) {
                $user->subjectsTeacher()->attach($subject->id, ['class' => 2]);
            }

        }

        if (isset($request->$f3sub1)) {
            $subjects = Subject::where('subject', '=', $request->input($f3sub1))->get();
            foreach ($subjects as $subject) {
                $user->subjectsTeacher()->attach($subject->id, ['class' => 3]);
            }

        }
        if (isset($request->$f3sub2)) {
            $subjects = Subject::where('subject', '=', $request->input($f3sub2))->get();
            foreach ($subjects as $subject) {
                $user->subjectsTeacher()->attach($subject->id, ['class' => 3]);
            }

            

        }

        if (isset($request->$f4sub1)) {
            $subjects = Subject::where('subject', '=', $request->input($f4sub1))->get();
            foreach ($subjects as $subject) {
                $user->subjectsTeacher()->attach($subject->id, ['class' => 4]);
            }

        }
        if (isset($request->$f4sub2)) {
            $subjects = Subject::where('subject', '=', $request->input($f4sub2))->get();
            foreach ($subjects as $subject) {
                $user->subjectsTeacher()->attach($subject->id, ['class' => 4]);
            }

        }

    }
}
