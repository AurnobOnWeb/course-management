<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\course;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
  
class ManualEnrollmentsController extends Controller 
{
    public function __construct()
    {
        $this->middleware(['permission:view enroll'])->only(['index']);
        $this->middleware(['permission:enroll'])->only(['store']);
        
         
    }
    public function index(Request $request){
      
        $search= $request['search'] ?? '';
        if($search != ''){
            $student = Student::where('student_name' , 'LIKE' , "%$search%")->orWhere('student_number' , 'LIKE' , "%$search%")->get();
        }else{
            $student = Student::all();
        } 
        
        $course = course::latest()->get();
        $batch = Batch::latest()->get();
       return view('admin.enrollment',compact('student','search','course','batch'));
    }
    public function store( Request $request ){
         // validation rules For Payment Information
         $validatedData = $request->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'batch_id' => 'required',
            'course_price' => 'required',
            'special_discount' => 'required',
            'course_fee' => 'required',
            'payment' => 'required',
           
        ]);

        $currentDate = Carbon::now()->format('Y-m-d');
        //requested data as variable
        $course_fee= $validatedData['course_fee'];
        $payments= $validatedData['payment'];
        $course_id =$validatedData['course_id'];
        $batch_id = $validatedData['batch_id'];
        $student_id =$validatedData['student_id']; 

        $payment = new Payment();
        $payment->course_id = $course_id;
        $payment->batch_id = $batch_id;
        $payment->course_price = $validatedData['course_price'];
        $payment->special_discount = $validatedData['special_discount'];
        $payment->course_fee =  $course_fee;
        $payment->payment = $payments;
        $payment->payment_date = $currentDate;
        $payment->student_id = $student_id;  // Set the foreign key
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
         //when student saves course..  student count will increment in course Table :)
        course::where('id',$course_id)->increment('student_count',1);

        //when student saves course..  student count will increment in Batch Table also :)
        Batch::where('id',$batch_id)->increment('student_count',1);

          //when student saves info status unenrolled.. if he/she pays His/her status will updated to Enrolled :)
          Student::where('id', $student_id)->update(['status' => 'Enrolled']);
        return redirect()->route('enrollments')->with('massage','Student Info & Payment SuccessFully added');
    }
}