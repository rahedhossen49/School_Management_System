<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classes;
use App\Models\subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\AssignSubjectToClass;
use App\Models\AssignTeacherToClass;

class AssignTeacherToClassController extends Controller
{

    public function index()
    {
        $data['classes'] = Classes::all();
        $data['teachers'] = User::where('role', 'teacher')->get();
        $data['latest_teacher'] = User::where('role', 'teacher')->latest()->first();

        if ($data['teachers']->isEmpty()) {
            Log::info('No teachers found in the database.');
        }

        return view('admin.assign_teacher.form', $data);
    }




    public function findSubject(Request $request)
    {
       $class_id = $request->class_id;
       $subjects = AssignSubjectToClass::with('subject')->where('class_id', $class_id)->get();
       return response()->json([
        'status'=>true,
        'subjects'=>$subjects
       ]);
    }


    public function store(Request $request)
    {
       $request->validate([
        'class_id'=>'required',
        'teacher_id'=>'required',
        'subject_id'=>'required',
       ]);



           AssignTeacherToClass::updateOrCreate([

            'class_id'=>$request->class_id,
            'subject_id'=>$request->subject_id

           ],
        [ 'class_id'=>$request->class_id,
          'subject_id'=>$request->subject_id,
          'teacher_id'=>$request->teacher_id,
        ]
        );
        return redirect()->route('assign-teacher.create')->with('success','Teacher Assigned Successfuly');

    }


    public function read( Request $request)
    {
        $data['classes'] = Classes::all();
       $assign_teachers  = AssignTeacherToClass::with(['class', 'subject', 'teacher']);
       if ($request->class_id) {
          $assign_teachers->where('class_id',$request->class_id);
       }
       $assign_teachers = $assign_teachers->latest()->get();
        $data['assign_teachers'] = $assign_teachers;

        return view('admin.assign_teacher.list', $data);

    }


    public function delete($id)
    {
        $res = AssignTeacherToClass::find($id);
        $res->delete();
        return redirect()->back()->with('success','Record Deleted Successfuly');
    }


    public function edit($id)
    {
          $res =  AssignTeacherToClass::find($id);
          $data['assign_teacher'] = $res;
          $data['subjects'] = AssignSubjectToClass::with('subject')->where('class_id',$res->class_id)->get();
          $data['classes'] = Classes::all();
          $data['teachers'] = User::where('role', 'teacher')->latest()->get();
          return view('admin.assign_teacher.edit_form',$data);

    }


    public function update(Request $request, $id)
    {

        $res = AssignTeacherToClass::find($id);
        $res->class_id = $request->class_id;
        $res->subject_id = $request->subject_id;
        $res->teacher_id = $request->teacher_id;
        $res->update();
        return redirect()->route('assign-teacher.read')->with('success','Record Updated Successfuly');


    }
}
