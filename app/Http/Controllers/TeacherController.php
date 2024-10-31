<?php

namespace App\Http\Controllers;

use App\Models\AssignTeacherToClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teacher.form');
    }


    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'required|unique:users,mobile_no',
            'dob' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->email = $request->email;
        $user->mobile_no = $request->mobile_no;
        $user->dob = $request->dob;
        $user->password = Hash::make($request->password);
        $user->role = 'teacher';
        $user->save();
        return redirect()->back()->with('success', 'Teacher Added Successfully');

    }


    public function read(){
        $data['teachers'] = User::where('role','teacher')->latest()->get();
        return view('admin.teacher.table',$data);
    }

    public function edit($id){

        $data['teacher'] = User::find($id);
        return view('admin.teacher.edit_form',$data);
    }

    public function update(Request $request, $id) {

        $teacher = User::find($id);

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_no' => 'required|unique:users,mobile_no,' . $id,
        ]);

        $teacher->name = $request->name;
        $teacher->father_name = $request->father_name;
        $teacher->mother_name = $request->mother_name;
        $teacher->email = $request->email;
        $teacher->mobile_no = $request->mobile_no;
        $teacher->dob = $request->dob;
        $teacher->update();
        return redirect()->back()->with('success', 'Teacher Updated Successfully');
    }


    public function delete($id){
        $teacher = User::find($id);
        $teacher->delete();
        return redirect()->back()->with('success', 'Teacher Deleted Successfully');
    }



    public function login(){
        return view('teacher.login');
    }


    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::guard('teacher')->user()->role != 'teacher') {
                Auth::guard('teacher')->logout();
                return redirect()->route('teacher.login')->with('error', "Unauthorize User. Access denied");
            }
            return redirect()->route('teacher.dashboard');
        } else {
            return redirect()->route('teacher.login')->with('error', "Something Went Wrong");
        }
    }



    public function dashboard(){

        return view('teacher.dashboard');
    }


    public function logout(){

        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login')->with('success','Logged Out Successfully!');
    }
    public function myClass(){
        $teacher_id = Auth::guard('teacher')->user()->id;

        // Assuming you're assigning class based on teacher_id, not class_id
        $data['assign_class'] = AssignTeacherToClass::where('teacher_id', $teacher_id)
            ->with(['teacher', 'subject', 'class']) // Eager load teacher, subject, and class relationships
            ->get();

        return view('teacher.my_class', $data);
    }

}
