<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Batch;
use App\Models\course;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;

class PaymentController extends Controller 
{   
    public function __construct()
    {
        $this->middleware(['permission:view all payment'])->only(['index']);
        $this->middleware(['permission:edit payment'])->only(['edit'],['update']);
        $this->middleware(['permission:delete payment'])->only(['destroy']);
         
    }
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $payment= Payment::with('course', 'batch', 'student')->get();
      
        return view('admin.AllPayment',compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
      
       $payment= Payment::with('course', 'batch', 'student')->find($id);

       return view('admin.singlePayment',compact('payment'));
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
        $batches = Batch::latest()->get();
        $payment= Payment::with('course', 'batch', 'student')->find($id);
        $data =$payment->course()->pluck("id")->toArray();
        $data2 =$payment->batch()->pluck("id")->toArray();
        return view('admin.paymentEdit',compact('payment','courses','batches','data','data2'));
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
           // validation rules For Payment Information
           $validatedData = $request->validate([
            'course_id' => 'required',
            'batch_id' => 'required',
            'course_price' => 'required',
            'special_discount' => 'required',
            'course_fee' => 'required',
            'payment' => 'required',
           
        ]);

          // current date pick
          $currentDate = Carbon::now()->format('Y-m-d');
          // Create a new payment instance and save the payment information with the foreign key
          $course_fee= $validatedData['course_fee'];
          $payments= $validatedData['payment'];
          $course_id =$validatedData['course_id'];
          $batch_id = $validatedData['batch_id'];
          
        $payment = Payment::find($id);
        $payment->course_id = $course_id;
        $payment->batch_id = $batch_id;
        $payment->course_price = $validatedData['course_price'];
        $payment->special_discount = $validatedData['special_discount'];
        $payment->course_fee =  $course_fee;
        $payment->payment = $payments;
        $payment->payment_date = $currentDate;
        if ($course_fee == $payments) {
            $payment->payment_status = 'Full Payment';
        } elseif ($course_fee > $payments) {
            // Add logic for when the payment  less than the course fee
            $payment->payment_status = 'Due Payment';
        } else {
            // Add logic for when the payment is excced than the course fee
            $payment->payment_status = 'Over payment';
        }
        $payment->save();
         //when student saves course..  student count will increment in course Table :)Payment update time no Change of student count because it already counted
       // course::where('id',$course_id)->increment('student_count',1);

        //when student saves course..  student count will increment in Batch Table also :) Payment update time no Change of student count because it already counted
       // Batch::where('id',$batch_id)->increment('student_count',1);

          //when student saves info status unenrolled.. if he/she pays His/her status will updated to Enrolled :) Payment update time no Change of Status
        //  Student::where('id', $student->id)->update(['status' => 'Enrolled']);

        return redirect()->route('payment.index')->with('massage','Payment Information SuccessFully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $course_id = $payment->course_id;
        $batch_id = $payment->batch_id;
        $student_id = $payment->student_id;
        $payment->delete();
        Student::where('id', $student_id)->update(['status' => 'Unenrolled']);
        //when student Delete ..  student count will decrement in course Table :)
        course::where('id',$course_id)->decrement('student_count',1);

        //when student Delete ..  student count will decrement in Batch Table also :)
        Batch::where('id',$batch_id)->decrement('student_count',1);
        return redirect()->back()->with('message','Payment Information SuccessFully Deleted');
    }
}
