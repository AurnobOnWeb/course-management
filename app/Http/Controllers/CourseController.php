<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\Payment;
use Illuminate\Http\Request;

class CourseController extends Controller
{ 
    public function __construct()
{
    $this->middleware(['permission:view course'])->only(['index']);
    $this->middleware(['permission:create course'])->only(['create'],['store']);
    $this->middleware(['permission:edit course'])->only(['edit'],['update']);
    $this->middleware(['permission:delete course'])->only(['destroy']);
     
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {  
        $course = course::latest()->get();
       return view('admin.course',compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       
       return view('admin.courseAdd');
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
            'course_name' => 'required|unique:courses',
            'description' => 'required',
            'course_price' => 'required',
            'discount' => 'required',
            'discount_price' => 'required',
            'course_status' => 'required',
        ]);

        course::insert([
            'course_name' =>$request->course_name,
            'description' =>$request->description, 
            'course_price' =>$request->course_price, 
            'discount' =>$request->discount, 
            'discount_price' =>$request->discount_price, 
            'course_status' =>$request->course_status, 
        ]);
        return redirect()->back()->with('massage','Coureses SuccessFully added');
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
    public function edit($id )
    {
      
        $course = course::find($id);
       return view('admin.courseEdit',compact('course'));
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
            'course_name' => 'required',
            'description' => 'required',
            'course_price' => 'required',
            'discount' => 'required',
            'discount_price' => 'required',
            'course_status' => 'required',
        ]);

        $course = course::find($id);
        $course->course_name =$request->course_name;
        $course->description =$request->description;
        $course->course_price =$request->course_price;
        $course->discount =$request->discount;
        $course->discount_price =$request->discount_price;
        $course->course_status =$request->course_status;
        $course->save();
        return redirect()->route('course.index')->with('massage','Coureses SuccessFully Updated');
       
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = course::find($id);
        if (!is_null($course))
        $course->delete();
        Payment::where('course_id', $course->id)->delete();
        return redirect()->route('course.index')->with('message','Coureses SuccessFully Deleted');
          //when student Will delete her/his payment will removed also
       
    }
}
