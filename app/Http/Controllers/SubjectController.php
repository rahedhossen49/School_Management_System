<?php

namespace App\Http\Controllers;

use App\Models\subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function index()
    {
      return view('admin.subject.form');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);


        $subject = new subject();
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->save();
        return redirect()->back()->with('success', 'Subject Added Successfully');

    }


    public function read(){

        $data['subjects'] = subject::latest()->get();
        return view('admin.subject.table', $data);

    }




    public function delete($id)
    {
        $subject = subject::find($id);
        $subject->delete();
        return redirect()->back()->with('success', 'Subject Deleted Successfully');
    }

    public function edit($id)
    {

        $data['subject'] = subject::find($id);
        return view('admin.subject.edt_form', $data);


    }

    public function update(Request $request,$id){

        $subject = subject::find($id);
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->update();
        return redirect()->route('subject.read')->with('success', 'Subject Updated Successfully');
    }

}
