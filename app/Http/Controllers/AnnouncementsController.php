<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{

    public function index()
    {
      return view('admin.announcement.form');
    }


    public function store(Request $request)
    {
        $request->validate([
            'message'=>'required',
            'type'=>'required',
        ]);

        $announcements = new Announcements();
        $announcements->message = $request->message;
        $announcements->type = $request->type;
        $announcements->save();
        return redirect()->back()->with('success', 'Announcement Broadcast Created Successfully');
    }



    public function read()
    {
        $data['announcements'] = Announcements::latest()->get();
        return view('admin.announcement.list', $data);
    }


    public function edit($id)
    {
       $data['announcements'] = Announcements::find($id);
       return view('admin.announcement.edit_form', $data);
    }


    public function update(Request $request, $id)
    {
        $announcements =  Announcements::find($id);
        $announcements->message = $request->message;
        $announcements->type = $request->type;
        $announcements->update();
        return redirect()->back()->with('success', 'Announcement Broadcast Updated Successfully');
    }




    public function delete($id){

        $student = Announcements::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success', 'Announcement Broadcast Deleted Successfully');
       }

}
