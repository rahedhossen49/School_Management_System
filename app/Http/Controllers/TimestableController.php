<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Classes;
use App\Models\subject;
use App\Models\Timestable;
use Illuminate\Http\Request;

class TimestableController extends Controller
{

    public function index()
    {
        $data['days'] = Day::all();
        $data['classes'] = Classes::all();
        $data['subjects'] = subject::all();
        return view('admin.timetable.create',$data);
    }

    public function store(Request $request)
    {
        $class_id = $request->class_id;
        $subject_id = $request->subject_id;

        foreach ($request->timetable as $timetable) {

            $day_id = $timetable['day_id'];
            $start_time = $timetable['start_time'];
            $end_time = $timetable['end_time'];
            $room_no = $timetable['room_no'];

            // Only update if the start time is provided
            if ($start_time != null) {
                Timestable::updateOrCreate(
                    [
                        'class_id' => $class_id,
                        'subject_id' => $subject_id,
                        'day_id' => $day_id,
                    ],
                    [
                        'class_id' => $class_id,
                        'subject_id' => $subject_id,
                        'day_id' => $day_id,
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                        'room_no' => $room_no,
                    ]
                );
            }
        }

        return redirect()->route('timetable.create')->with('success', 'Timetable Created Successfully');
    }



    public function read(Request $request)
    {
        $data['classes'] = Classes::all();
        $data['subjects'] = subject::all();
        $tabletimes = Timestable::with('class','subject','day');
        if($request->class_id){
            $tabletimes->where('class_id',$request->class_id);
        }

        if($request->subject_id){
            $tabletimes->where('subject_id',$request->subject_id);
        }
        $data['timetables'] = $tabletimes->get();
        return view('admin.timetable.list',$data);
    }




    public function delete( $id)
    {
        $data =Timestable::find($id);
        $data->delete();
        return redirect()->route('timetable.read')->with('success', 'Timetable Deleted Successfully');
    }
}
