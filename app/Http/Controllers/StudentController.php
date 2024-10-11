<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classes;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        return view('admin.student.student',$data);
    }




    public function store(Request $request)
    {
        $request->validate([
            'academic_year_id' => 'required',
            'class_id' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'required|unique:users,mobile_no',
            'admission_date' => 'required',
            'dob' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->academic_year_id = $request->academic_year_id;
        $user->class_id = $request->class_id;
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->email = $request->email;
        $user->mobile_no = $request->mobile_no;
        $user->admission_date = $request->admission_date;
        $user->dob = $request->dob;
        $user->password = Hash::make($request->password);
        $user->role = 'student';
        $user->save();

        return redirect()->back()->with('success', 'Student Added Successfully');
    }


   public function read(Request $request){

    $query = User::with('studentClass','StudentacademicYear')->where('role','student')->latest('id');
    if ($request->filled('academic_year_id')) {
        $query->where('academic_year_id',$request->get('academic_year_id'));
    }
    if ($request->filled('class_id')) {
        $query->where('class_id',$request->get('class_id'));
    }
    $students = $query->get();
    $data['students'] = $students;
    $data['academic_year'] = AcademicYear::all();
    $data['classes'] = Classes::all();
    return view('admin.student.student_list',$data);
   }


   public function edit($id){

 $data['student'] = User::findOrFail($id);
 $data['classes'] = Classes::all();
 $data['academic_years'] = AcademicYear::all();
  return view('admin.student.edit_student',$data);
}



 public function update(Request $request, $id){
    $request->validate([
        'email' => 'required|email|unique:users,email,' . $id,
        'mobile_no' => 'required|unique:users,mobile_no,' . $id,
    ]);

    $user = User::findOrFail($id);
    $user->academic_year_id = $request->academic_year_id;
    $user->class_id = $request->class_id;
    $user->name = $request->name;
    $user->father_name = $request->father_name;
    $user->mother_name = $request->mother_name;
    $user->email = $request->email;
    $user->mobile_no = $request->mobile_no;
    $user->admission_date = $request->admission_date;
    $user->dob = $request->dob;
    $user->update();
    return redirect()->back()->with('success','Student Updated Successfully');
 }


   public function delete($id){

    $student = User::findOrFail($id);
    $student->delete();
    return redirect()->back()->with('success','Student Deleted Successfully');

   }
}
