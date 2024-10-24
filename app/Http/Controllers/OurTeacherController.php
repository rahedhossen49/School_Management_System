<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OurTeacherController extends Controller
{
    public function index(){
        return view('HomePage.Ourteacher');
    }

    // public function read(){
    //     $data['teachers'] = User::where('role','teacher')->latest()->get();
    //     return view('admin.teacher.table',$data);
    // }
    public function read()
{


//   $data['teachers'] = User::where('role','teacher')->latest()->get();

//     // Pass the $teachers variable to the view
//     return view('HomePage.Ourteacher', compact('teachers'));
}

}
