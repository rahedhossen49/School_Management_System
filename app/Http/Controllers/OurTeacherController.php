<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurTeacherController extends Controller
{
    public function index(){
        return view('HomePage.Ourteacher');
    }


    // public function index()
    // {
    //     // Fetch all teachers for the navigation
    //     $teachers = ::all();
    //     return view('teachers.index', compact('teachers'));
    // }
}
