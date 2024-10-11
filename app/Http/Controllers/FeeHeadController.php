<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{
    public function index()
    {
             return view('admin.fee-head.fee-head');
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = new FeeHead();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('fee-head.create')->with('success', 'Fee Head Added Successfully');

    }

    public function read()
    {
        $data['feeHead'] = FeeHead::latest()->get();
        return view('admin.fee-head.fee-head_list', $data);
    }



    public function edit($id)
    {
        $data['feeHead'] = FeeHead::findOrFail($id);
        return view('admin.fee-head.edit_fee-head', $data);
    }



    public function update(Request $request){
        $data = FeeHead::findOrFail($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('fee-head.read')->with('success', 'Fee Head Updated Successfully');

    }


    public function delete($id)
    {
        $data = FeeHead::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Class Name Deleted Successfully');
    }
}
