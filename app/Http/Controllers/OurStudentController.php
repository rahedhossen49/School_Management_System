<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurStudentController extends Controller
{
    public function index(){
        return view('HomePage.OurStudent');
    }
}
