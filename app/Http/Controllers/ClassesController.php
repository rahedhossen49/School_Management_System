<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        return view('admin.class.class');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = new Classes();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('class.create')->with('success', 'Class Name Added Successfully'); // Redirect to the create page

    }


    public function read()
    {
        $data['class'] = Classes::get();
        return view('admin.class.class_list', $data);
    }


    public function edit($id)
    {
        $data['class'] = Classes::findOrFail($id);
        return view('admin.class.edit_class', $data);
    }



    public function update(Request $request){
        $data = Classes::findOrFail($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('class.read')->with('success', 'Class Name Updated Successfully');

    }


    public function delete($id)
    {
        $data = Classes::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Class Name Deleted Successfully');
    }





}
