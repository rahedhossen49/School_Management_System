<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Classes;
use App\Models\FeeHead;
use App\Models\FeeStructer;
use Illuminate\Http\Request;

class FeeStructerController extends Controller
{

    public function index()
    {
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        $data['fee_heads'] = FeeHead::all();
        return view('admin.fee-structure.fee-structure', $data);
    }

    public function store(Request $request)
    {


        $request->validate([
            'academic_year_id' => 'required',
            'class_id' => 'required',
            'fee_head_id' => 'required',
        ]);

        FeeStructer::create($request->all());


        return redirect()->route('fee-structure.create')->with('success', 'Fee Structure Added Successfully');
    }



    public function read(Request $request)
    {
        $feeStructures = FeeStructer::query()->with('FeeHead','AcademicYear','Classes')->latest();
       if ($request->filled('class_id')){
        $feeStructures->where('class_id',$request->get('class_id'));
       }
       if ($request->filled('academic_year_id')){
        $feeStructures->where('academic_year_id',$request->get('academic_year_id'));
       }
        $data['feeStructure'] = $feeStructures->get();
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        return view('admin.fee-structure.fee-structure_list', $data);
    }


    public function edit($id)
    {
        $data['fee'] = FeeStructer::findOrFail($id);
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        $data['fee_heads'] = FeeHead::all();
        return view('admin.fee-structure.edit_fee-structure', $data);
    }


    public function update(Request $request, $id) {
        $fee = FeeStructer::findOrFail($id);

        $fee->class_id = $request->class_id;
        $fee->academic_year_id = $request->academic_year_id;
        $fee->fee_head_id = $request->fee_head_id;
        $fee->january = $request->january;
        $fee->february = $request->february;
        $fee->march = $request->march;
        $fee->april = $request->april;
        $fee->may = $request->may;
        $fee->june = $request->june;
        $fee->july = $request->july;
        $fee->august = $request->august;
        $fee->september = $request->september;
        $fee->october = $request->october;
        $fee->november = $request->november;
        $fee->december = $request->december;
        $fee->save();
        return redirect()->route('fee-structure.read')->with('success', 'Fee Structure Updated Successfully');
    }



    public function delete($id)
    {
        $data = FeeStructer::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Fee Structure Deleted Successfully');
    }


}