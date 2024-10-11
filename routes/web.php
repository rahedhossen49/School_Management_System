<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FeeHeadController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FeeStructerController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\AssignSubjectToClassController;
use App\Http\Controllers\AssignTeacherToClassController;
use App\Http\Controllers\TimestableController;

Route::get('/', function () {
    return view('welcome');
});

// * Student validation login


Route::group(['prefix' => 'student'], function () {


    Route::group(['middleware' => 'guest'], function () {

        // guest
        Route::get('login', [UserController::class, 'index'])->name('student.login');
        Route::post('authentication', [UserController::class, 'authentication'])->name('student.authentication');
    });

    Route::group(['middleware' => 'auth'], function () {

        // auth
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('student.dashboard');
        Route::get('logout', [UserController::class, 'logout'])->name('student.logout');
        Route::get('change-password', [UserController::class, 'changePassword'])->name('student.changePassword');
        Route::post('update-password', [UserController::class, 'updatePassword'])->name('student.updatePassword');
        Route::get('my-subject', [UserController::class, 'mySubject'])->name('student.mySubject');
    });
});


// *  Teacher Route


Route::group(['prefix' => 'teacher'], function () {

    Route::group(['middleware' => 'teacher.guest'], function () {
        Route::get('login', [TeacherController::class, 'login'])->name('teacher.login');
        Route::post('authenticate', [TeacherController::class, 'authenticate'])->name('teacher.authenticate');
    });

       Route::group(['middleware' => 'teacher.auth'], function () {

        Route::get('dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
        Route::get('my-class', [TeacherController::class, 'myClass'])->name('teacher.my-class');
        Route::get('logout', [TeacherController::class, 'logout'])->name('teacher.logout');
    });

});

//*  admin route

Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {

        Route::get('login', [AdminController::class, 'index'])->name('admin.login');
        Route::get('register', [AdminController::class, 'register'])->name('admin.register');
        Route::post('login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    });
    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('form', [AdminController::class, 'form'])->name('admin.form');
        Route::get('table', [AdminController::class, 'table'])->name('admin.table');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

        // * Acamedic Year Manegment

        Route::get('academic-year/create', [AcademicYearController::class, 'index'])->name('academic-year.create');
        Route::post('academic-year/store', [AcademicYearController::class, 'store'])->name('academic-year.store');
        Route::get('academic-year/read', [AcademicYearController::class, 'read'])->name('academic-year.read');
        Route::get('academic-year/delete/{id}', [AcademicYearController::class, 'delete'])->name('academic-year.delete');
        Route::get('academic-year/edit/{id}', [AcademicYearController::class, 'edit'])->name('academic-year.edit');
        Route::post('academic-year/update', [AcademicYearController::class, 'update'])->name('academic-year.update');




        // * Time Table Manegment

        Route::get('timetable/create', [TimestableController::class, 'index'])->name('timetable.create');
        Route::post('timetable/store', [TimestableController::class, 'store'])->name('timetable.store');
        Route::get('timetable/read', [TimestableController::class, 'read'])->name('timetable.read');
        Route::get('timetable/delete/{id}', [TimestableController::class, 'delete'])->name('timetable.delete');
        Route::get('timetable/edit/{id}', [TimestableController::class, 'edit'])->name('timetable.edit');
        Route::post('timetable/update', [TimestableController::class, 'update'])->name('timetable.update');




      // *  Announcment

      Route::get('announcements/create', [AnnouncementsController::class, 'index'])->name('announcements.create');
      Route::post('announcements/store', [AnnouncementsController::class, 'store'])->name('announcements.store');
      Route::get('announcements/read', [AnnouncementsController::class, 'read'])->name('announcements.read');
      Route::get('announcements/delete/{id}', [AnnouncementsController::class, 'delete'])->name('announcements.delete');
      Route::get('announcements/edit/{id}', [AnnouncementsController::class, 'edit'])->name('announcements.edit');
      Route::post('announcements/update{id}', [AnnouncementsController::class, 'update'])->name('announcements.update');




        // * class Manegment

        Route::get('class/create', [ClassesController::class, 'index'])->name('class.create');
        Route::post('class/store', [ClassesController::class, 'store'])->name('class.store');
        Route::get('class/read', [ClassesController::class, 'read'])->name('class.read');
        Route::get('class/edit/{id}', [ClassesController::class, 'edit'])->name('class.edit');
        Route::get('class/delete/{id}', [ClassesController::class, 'delete'])->name('class.delete');
        Route::post('class/update', [ClassesController::class, 'update'])->name('class.update');


        // * Subject

        Route::get('subject/create', [SubjectController::class, 'index'])->name('subject.create');
        Route::post('subject/store', [SubjectController::class, 'store'])->name('subject.store');
        Route::get('subject/read', [SubjectController::class, 'read'])->name('subject.read');
        Route::get('subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
        Route::get('subject/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete');
        Route::post('subject/update/{id}', [SubjectController::class, 'update'])->name('subject.update');





        // *Assaign Subject

        Route::get('assignsubject/create', [AssignSubjectToClassController::class, 'index'])->name('assignsubject.create');
        Route::post('assignsubject/store', [AssignSubjectToClassController::class, 'store'])->name('assignsubject.store');
        Route::get('assignsubject/read', [AssignSubjectToClassController::class, 'read'])->name('assignsubject.read');
        Route::get('assignsubject/edit/{id}', [AssignSubjectToClassController::class, 'edit'])->name('assignsubject.edit');
        Route::get('assignsubject/delete/{id}', [AssignSubjectToClassController::class, 'delete'])->name('assignsubject.delete');
        Route::post('assignsubject/update/{id}', [AssignSubjectToClassController::class, 'update'])->name('assignsubject.update');



 // * Teacer assign Manegment

Route::get('assign-teacher/create', [AssignTeacherToClassController::class, 'index'])->name('assign-teacher.create');
Route::get('findSubject', [AssignTeacherToClassController::class, 'findSubject'])->name('findSubject');
Route::post('assign-teacher/store', [AssignTeacherToClassController::class, 'store'])->name('assign-teacher.store');
 Route::get('assign-teacher/read', [AssignTeacherToClassController::class, 'read'])->name('assign-teacher.read');
 Route::get('assign-teacher/edit/{id}', [AssignTeacherToClassController::class, 'edit'])->name('assign-teacher.edit');
 Route::get('assign-teacher/delete/{id}', [AssignTeacherToClassController::class, 'delete'])->name('assign-teacher.delete');
 Route::post('assign-teacher/update{id}', [AssignTeacherToClassController::class, 'update'])->name('assign-teacher.update');


        // * Teacer Manegment
 Route::get('teacher/create', [TeacherController::class, 'index'])->name('teacher.create');
 Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
 Route::get('teacher/read', [TeacherController::class, 'read'])->name('teacher.read');
 Route::get('teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
 Route::get('teacher/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
 Route::post('teacher/update{id}', [TeacherController::class, 'update'])->name('teacher.update');


        // * FeeHead Manegment

        Route::get('fee-head/create', [FeeHeadController::class, 'index'])->name('fee-head.create');
        Route::post('fee-head/store', [FeeHeadController::class, 'store'])->name('fee-head.store');
        Route::get('fee-head/read', [FeeHeadController::class, 'read'])->name('fee-head.read');
        Route::get('fee-head/edit/{id}', [FeeHeadController::class, 'edit'])->name('fee-head.edit');
        Route::get('fee-head/delete/{id}', [FeeHeadController::class, 'delete'])->name('fee-head.delete');
        Route::post('fee-head/update', [FeeHeadController::class, 'update'])->name('fee-head.update');


        // * Fee Structure

        Route::get('fee-structure/create', [FeeStructerController::class, 'index'])->name('fee-structure.create');
        Route::post('fee-structure/store', [FeeStructerController::class, 'store'])->name('fee-structure.store');
        Route::get('fee-structure/read', [FeeStructerController::class, 'read'])->name('fee-structure.read');
        Route::get('fee-structure/edit/{id}', [FeeStructerController::class, 'edit'])->name('fee-structure.edit');
        Route::get('fee-structure/delete/{id}', [FeeStructerController::class, 'delete'])->name('fee-structure.delete');
        Route::post('fee-structure/update/{id}', [FeeStructerController::class, 'update'])->name('fee-structure.update');



        // * Student Routes

        Route::get('student/create', [StudentController::class, 'index'])->name('student.create');
        Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
        Route::get('student/read', [StudentController::class, 'read'])->name('student.read');
        Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::get('student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
        Route::post('student/update/{id}', [StudentController::class, 'update'])->name('student.update');



        Route::get('clear',function (){
            Artisan::call('optimize:clear');
            return redirect()->back()->with('success',"Successfuly cache cleared.");
        })->name('cache.clear');
    });
});
