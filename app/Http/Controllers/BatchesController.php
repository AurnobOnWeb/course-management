<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\course;
use App\Models\Payment;
use App\Models\Teacher;
use Illuminate\Http\Request;

class BatchesController extends Controller
{
 
    public function __construct()
    {
        $this->middleware(['permission:view batch'])->only(['index']);
        $this->middleware(['permission:create batch'])->only(['create'],['store']);
        $this->middleware(['permission:edit batch'])->only(['edit'],['update']);
        $this->middleware(['permission:delete batch'])->only(['destroy']);
         
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $batch= Batch::with('course', 'teacher')->where('batch_status', '=' , 'Active')->get();
        return view('admin.batches',compact('batch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
       
        $course = course::latest()->get();
        $teacher = Teacher::latest()->get();
       return view('admin.batchesAdd',compact('course','teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'batch_name' => 'required',
            'batch_code' => 'required',
            'course_id' => 'required',
            'teacher_id' => 'required',
            'hours' => 'required',
            'week_day' => 'required',
            'time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'batch_status' => 'required',
            'student_limit' => 'required',

        ]);
        $array =$request->week_day;
        $string = implode(',', $array);

        Batch::insert([
            'batch_name' =>$request->batch_name,
            'batch_code' =>$request->batch_code, 
            'course_id' =>$request->course_id, 
            'hours' =>$request->hours, 
            'week_day' => $string, 
            'time' =>$request->time, 
            'teacher_id' =>$request->teacher_id, 
            'start_date' =>$request->start_date, 
            'end_date' =>$request->end_date, 
            'batch_status' =>$request->batch_status, 
            'student_limit' =>$request->student_limit, 

        ]);
        $course_id = $request->course_id;
        course::where('id',$course_id)->increment('batch_count',1);
        return redirect()->back()->with('massage','Batch SuccessFully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $courses = course::latest()->get();
        $teachers = Teacher::latest()->get();
        $batch= Batch::with('course', 'teacher')->find($id);
        $data =$batch->course()->pluck("id")->toArray();
        $data2 =$batch->teacher()->pluck("id")->toArray();
        $string= $batch->week_day;
        $array = explode(',', $string);
        return view('admin.batchesEdit',compact('batch','courses','teachers','data','data2','array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'batch_name' => 'required',
            'batch_code' => 'required',
            'course_id' => 'required',
            'hours' => 'required',
            'week_day' => 'required',
            'time' => 'required',
            'teacher_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'batch_status' => 'required',
            'student_limit' => 'required',

        ]);
        $array =$request->week_day;
        $string = implode(',', $array);

        $batch = Batch::find($id);
        $batch->batch_name =$request->batch_name;
        $batch->batch_code =$request->batch_code;
        $batch->course_id =$request->course_id;
        $batch->hours =$request->hours;
        $batch->time =$request->time;
        $batch->week_day =$string;
        $batch->teacher_id =$request->teacher_id;
        $batch->start_date =$request->start_date;
        $batch->end_date =$request->end_date;
        $batch->batch_status =$request->batch_status;
        $batch->student_limit =$request->student_limit;
        $batch->save();
        return redirect()->route('batches.index')->with('massage','Batch SuccessFully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = Batch::find($id);
        $batch->delete();
        $course_id = $batch->course_id;
        course::where('id',$course_id)->decrement('batch_count',1);
        Payment::where('batch_id', $batch->id)->delete();
        return redirect()->route('batches.index')->with('message','Batch Information SuccessFully Deleted');
    }
}
