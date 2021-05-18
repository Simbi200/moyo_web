<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ParentPortalController;
use App\Http\Controllers\TeacherPortalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPortal;



Route::get('/parent_portal', [ParentPortalController::class, 'homepage']);

Route::get('/parent_results', [ParentPortalController::class, 'parentSelectResults']);

Route::post('/parent_result', [ParentPortalController::class, 'parentGetResults']);

Route::get('/parent_notifications', [ParentPortalController::class, 'parentNotifications']);

Route::get('/results/pdf', [ParentPortalController::class, 'createPDF']);


/**
 * teachers portal routes
 */
Route::get('/teacher_portal', [TeacherPortalController::class, 'homepage']);

Route::get('/teacher_results', [TeacherPortalController::class, 'viewEnterResultsPage']);

Route::get('/teacher_results', [TeacherPortalController::class, 'viewEnterResultsPage']);

// Route::post('/storeGrade', [TeacherPortalController::class, 'storeStudentGrade']);
Route::post('/storeGrade/{form}/{subject_id}/{exam_id}', [TeacherPortalController::class, 'storeStudentGrade']);



/**
 * public routes
 */
Route::get('/', function () {return view('adhome');});

Route::get('/', [MainController::class, 'home']);

Route::get('/staff', [MainController::class, 'index']);

Route::get('/staffinfo/{id}', [MainController::class, 'user']);

Route::get('/noticeboard', [MainController::class, 'noticeboard']);

Route::get('/about', [MainController::class, 'aboutUs']);

Route::get('/contact', function () {return view('contact');});



/**
 * admin portal routes
 */

Route::delete('/adminDeleteAnnouncement/{id}', [AdminPortal::class, 'adminDeleteAnnouncement']);

Route::get('/admin_content', [AdminPortal::class, 'adminContent']);

Route::get('/admin_myprofile', [AdminPortal::class, 'myProfile']);

Route::post('/admin_add_notification', [AdminPortal::class, 'adminAddNotification']);

Route::post('/admin_edit_notification/{id}', [AdminPortal::class, 'adminEditNotification']);

Route::get('/admin_results', function () {return view('adminresults');});

Route::post('/admin_releaseExams/{exam_id}', [AdminPortal::class, 'releaseExams']);

Route::get('/admin_portal', [AdminPortal::class, 'adminPortalView']);

Route::post('/addAboutUsContent', [AdminPortal::class, 'addAboutUsContent']);

Route::post('/changePassword', [AdminPortal::class, 'changePassword']);

Route::post('/editAboutSection/{id}', [AdminPortal::class, 'editAboutSection']);

Route::delete('/adminDeleteAboutSection/{id}', [AdminPortal::class, 'adminDeleteAboutSection']);

Route::get('/admin_exams', [AdminPortal::class, 'adminExamView']);

Route::post('/adminCreateExam', [AdminPortal::class, 'adminCreateExam']);

Route::get('/admin_add_student', function () {return view('admin_add_student');});

Route::get('/admin_student_info/{id}', [AdminPortal::class, 'adminViewStudent']);

Route::get('/admin_staff_info/{id}', [AdminPortal::class, 'adminViewStaff']);

Route::get('/admin_edit_student/{id}', [AdminPortal::class, 'getAdminEditStudentView'])->name('student.edit');

Route::get('/admin_staff', [AdminPortal::class, 'adminViewAllStaff']);

Route::get('/admin_students', [AdminPortal::class, 'adminViewAllStudents'])->name('admin_students');

Route::get('/admin_staff', [AdminPortal::class, 'adminViewAllStaff'])->name('admin_staff');

Route::post('/adminAddStaff', [AdminPortal::class, 'addStaff']);

Route::patch('/admin_edit_student/{id}', [AdminPortal::class, 'adminEditStudent'])->name('studentupdate');

Route::delete('/adminDeleteStaff/{id}', [AdminPortal::class, 'adminDeleteStaff']);

Route::post('/adminAddStudent', [AdminPortal::class, 'addStudent']);

Route::patch('/adminEditStaff/{id}', [AdminPortal::class, 'adminEditStaff']);

Route::delete('/adminDeleteStudent/{id}', [AdminPortal::class, 'adminDeleteStudent']);



Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
  ]);

// Route::get('/home', [HomeController::class, 'index'])->name('home');
