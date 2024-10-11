<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{

    public function index()
    {
        return view('admin.academic_year');
    }



    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required'
        ]);

        $data = new AcademicYear();
        $data->year = $request->year;
        $data->save();

        return redirect()->route('academic-year.create')->with('success', 'Academic Year Added Successfully'); // Redirect to the create page

    }

    public function read()
    {
        $data['academic_year'] = AcademicYear::get();
        return view('admin.academic_year_list', $data);
    }

    public function delete($id)
    {
        $data = AcademicYear::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Academic Year Deleted Successfully');
    }

    public function edit($id)
    {
        $data['academic_year'] = AcademicYear::findOrFail($id);
        return view('admin.edit_academic_year', $data);
    }


    public function update(Request $request){


        $data = AcademicYear::findOrFail($request->id);
        $data->year = $request->year;
        $data->update();
        return redirect()->route('academic-year.read')->with('success', 'Academic Year Updated Successfully');

    }

}
