<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Announcements;
use App\Models\AssignSubjectToClass;
use App\Models\AssignTeacherToClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('student.login');
    }


  public function authentication(Request $request){
if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {

    if (Auth::user()->role != 'student') {
        Auth::logout();
        return redirect()->route('student.login')->with('error', "Unauthorize User. Access denied");
    }
    return redirect()->route('student.dashboard');
} else {
    return redirect()->route('student.login')->with('error', "Something Went Wrong");
}
  }


  public function dashboard(){

    $data['announcement'] = Announcements::where('type','student')->latest()->limit(1)->get();
    return view('student.dashboard',$data);
  }


  public function mySubject(){

    $class_id = Auth::guard('web')->user()->class_id;
    $data['my_subject'] = AssignTeacherToClass::where('class_id',$class_id)->with('subject','teacher')->get();
    return view('student.my_subject',$data);
  }

  public function logout(){
    Auth::logout();
    return redirect()->route('student.login')->with('error','Logout Successful');

  }





 public function changePassword(){

    return view('student.change_password');
 }
 public function updatePassword(Request $request)
 {
     // Validation rules
     $request->validate([
         'old_password'=> 'required',
         'new_password'=> 'required',
         'password_confirmation'=>'required|same:new_password',
     ]);

     // Get old and new passwords
     $old_password = $request->old_password;
     $new_password = $request->new_password;

     // Find the authenticated user
     $user = User::find(Auth::user()->id);

     // Check if old password matches
     if (Hash::check($old_password, $user->password)) {
         $user->password = $new_password;
         $user->update();

         return redirect()->back()->with('success', 'Password Changed Successfully');

     } else {
         // Set session error message
         return redirect()->back()->with('error', 'Old Password is incorrect');
     }
 }










}
