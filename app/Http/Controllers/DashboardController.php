<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\course;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

  public function __construct()
  {
      $this->middleware(['permission:view dashboard'])->only(['data']);
  }

  public function data(){

    $allcourse = course::count();
    $activecourse = course::where('course_status', '=', 'Active')->count();
    $inactivecourse = course::where('course_status', '=', 'Inactive')->count();

    $allbatch = Batch::count();
    $activebatch = Batch::where('batch_status', '=', 'Active')->count();
    $inactivebatch  = Batch::where('batch_status', '=', 'Finished')->count();
    $activeteacher = Teacher::where('teacher_status', '=', 'Active')->count();
    $inactiveteacher = Teacher::where('teacher_status', '=', 'inactive')->count();
    $allstudent = Student::count();
   $enrollstudent = Student::where('status', '=', 'Enrolled')->count();
    $fullpayment = Payment::where('payment_status', '=', 'Full Payment')->count();
    $duepayment = Payment::where('payment_status', '=', 'Due Payment')->count();
    $totalEstimatedEarnings = Payment::sum('course_fee');
    $totalearned = Payment::sum('payment');
    $totaldue =  $totalEstimatedEarnings - $totalearned ; 
 
    return view('admin.dashboard' , compact('allcourse','activecourse','inactivecourse','allbatch','activebatch',
    'inactivebatch','activeteacher','inactiveteacher','allstudent','enrollstudent','fullpayment','duepayment',
  'totalEstimatedEarnings','totalearned','totaldue'));
  }

}
