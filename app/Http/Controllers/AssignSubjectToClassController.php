<?php

namespace App\Http\Controllers;

use App\Models\AssignSubjectToClass;
use App\Models\classes;
use App\Models\subject;
use Illuminate\Http\Request;

class AssignSubjectToClassController extends Controller
{

    public function index()
    {

        $data['classes'] = classes::all();
        $data['subjects'] = subject::all();
        return view('admin.assign_subject.form',$data);
    }



    public function store(Request $request)
    {
       $request->validate([
        'class_id' => 'required',
        'subject_id' => 'required',

       ]);

       $class_id = $request->class_id;
       $subject_id = $request->subject_id;
       foreach ($subject_id as  $subject_id) {
           AssignSubjectToClass::updateOrCreate([

            'class_id'=>$class_id,
            'subject_id'=>$subject_id

           ],
        [ 'class_id'=>$class_id,
          'subject_id'=>$subject_id
        ]
        );
       }

       return redirect()->route('assignsubject.read')->with('success','Subject assigned successfully');
    }


    public function read(Request $request)
    {
    $query = AssignSubjectToClass::with('class','subject');
    if ($request->filled('class_id')){
        $query->where('class_id',$request->get('class_id'));
       }
    $data['assign_subjects'] = $query->get();
     $data['classes'] = classes::all();

     return view('admin.assign_subject.table',$data);
    }


    public function delete($id)
    {

        $res = AssignSubjectToClass::find($id);
        $res->delete();
        return redirect()->route('assignsubject.read')->with('success','Subject deleted successfully');

    }



    public function edit($id)
    {
        $data['assign_subjects'] = AssignSubjectToClass::find($id);
        $data['classes'] = classes::all();
        $data['subjects'] = subject::all();
        return view('admin.assign_subject.edit_from',$data);
    }


    public function update(Request $request,$id)
    {
         $data = AssignSubjectToClass::find($id);
         $data->class_id = $request->class_id;
         $data->subject_id = $request->subject_id;
         $data->update();
         return redirect()->route('assignsubject.read')->with('success','Subject updated successfully');
    }
}
