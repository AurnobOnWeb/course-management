<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request; 


class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:completed batch'])->only(['batchFinishedReport']);
        $this->middleware(['permission:course report'])->only(['courseReport']);
        $this->middleware(['permission:batch report'])->only(['batchReport']);

    }
    public function courseReport(Request $request)
    {
       
    
        $query = course::query();

        $course_name = $request['course_name'] ?? '';
        $start_date = $request['start_date'] ?? '';
        $end_date = $request['end_date'] ?? '';

            if ($course_name != '' && $start_date != '' && $end_date != '' ) {
                   $courseName = $request->input('course_name');
                   $query->where('course_name', 'like', '%' . $courseName . '%');
                   $startDate = $request->input('start_date');
                   $endDate = $request->input('end_date');
                   $query->whereHas('payments', function ($query) use ($startDate, $endDate) {
                       $query->whereBetween('payment_date', [$startDate, $endDate]);
                   });
                    }


       $courses = $query->get();
        $reports = [];

    if($course_name != '' && $start_date != '' && $end_date != '' ){
        foreach ($courses as $course) {
            $discountedCoursePrice = $course->discount_price;

            $specialDiscountCount = Payment::where('course_id', $course->id)->whereBetween('payment_date', [$startDate, $endDate])->where('special_discount', '!=', 0)->count('special_discount');
            $studentCount = Payment::where('course_id', $course->id)->whereBetween('payment_date', [$startDate, $endDate])->count('student_id');
            $totalEstimatedEarnings = Payment::whereBetween('payment_date', [$startDate, $endDate])->sum('course_fee');
            $fullPayments = Payment::where('course_id', $course->id)->whereBetween('payment_date', [$startDate, $endDate])->sum('payment');
            $dues = $totalEstimatedEarnings - $fullPayments;
            
            $report = [
                'course' => $course,
                'studentCount' => $studentCount,
                'discountedCoursePrice' => $discountedCoursePrice,
                'specialDiscountCount' => $specialDiscountCount,
                'totalEstimatedEarnings' => $totalEstimatedEarnings,
                'fullPayments' => $fullPayments,
                'dues' => $dues,
            ];
    
            $reports[] = $report;
        }
    }else{
        foreach ($courses as $course) {
            $discountedCoursePrice = $course->discount_price;
            $specialDiscountCount = Payment::where('course_id', $course->id)->where('special_discount', '!=', 0)->count('special_discount');
            $studentCount = Payment::where('course_id', $course->id)->count('student_id');
            $totalEstimatedEarnings = Payment::where('course_id', $course->id)->sum('course_fee');
            $fullPayments = Payment::where('course_id', $course->id)->sum('payment');
            $dues = $totalEstimatedEarnings - $fullPayments;
            
            $report = [
                'course' => $course,
                'studentCount' => $studentCount,
                'discountedCoursePrice' => $discountedCoursePrice,
                'specialDiscountCount' => $specialDiscountCount,
                'totalEstimatedEarnings' => $totalEstimatedEarnings,
                'fullPayments' => $fullPayments,
                'dues' => $dues,
            ];
    
            $reports[] = $report;
        }

    }
    
        return view('admin.courseReport', compact('reports','course_name','start_date','end_date'));
    }



    public function batchReport(Request $request)
    {
   
        $courses = Course::latest()->get();
        $query = Batch::query();
        
        $course_id = $request['course_id'] ?? '';
        $batch_ids = $request['batch_id'] ?? '';
        $batch_ids = $request['batch_id'] ?? [];
        $batch_name = '';
        
        if (!empty($batch_ids)) {
            $batc = Batch::find($batch_ids[0]); // Assuming you only want to retrieve the batch name for the first batch ID
            
            if ($batc) {
                $batch_name = $batc->batch_name;
            }
        }
        $start_date = $request['start_date'] ?? '';
        $end_date = $request['end_date'] ?? '';
    
        if ($batch_name != '' && $start_date != '' && $end_date != '') {
            $query->where('batch_name', 'like', '%' . $batch_name . '%')
                  ->whereHas('payments', function ($paymentQuery) use ($start_date, $end_date) {
                      $paymentQuery->whereBetween('payment_date', [$start_date, $end_date]);
                  });
        }
    
        $batch = $query->get();
        $reports = [];
    
        foreach ($batch as $batches) {
            foreach ($batches->course as $coursess) {
                 $discountedCoursePrice = $coursess->discount_price;
            }
    
            $specialDiscountCount = Payment::where('batch_id', $batches->id)
                ->when($start_date != '' && $end_date != '', function ($query) use ($start_date, $end_date) {
                    $query->whereBetween('payment_date', [$start_date, $end_date]);
                })
                ->where('special_discount', '!=', 0)
                ->count('special_discount');
    
            $studentCount = Payment::where('batch_id', $batches->id)
                ->when($start_date != '' && $end_date != '', function ($query) use ($start_date, $end_date) {
                    $query->whereBetween('payment_date', [$start_date, $end_date]);
                })
                ->count('student_id');
    
            $totalEstimatedEarnings = Payment::where('batch_id', $batches->id)
            ->when($start_date != '' && $end_date != '', function ($query) use ($start_date, $end_date) {
                $query->whereBetween('payment_date', [$start_date, $end_date]);
            })
            ->sum('course_fee');
    
            $fullPayments = Payment::where('batch_id', $batches->id)
                ->when($start_date != '' && $end_date != '', function ($query) use ($start_date, $end_date) {
                    $query->whereBetween('payment_date', [$start_date, $end_date]);
                })
                ->sum('payment');
    
            $dues = $totalEstimatedEarnings - $fullPayments;
    
            $report = [
                'batches' => $batches,
                'studentCount' => $studentCount,
                'discountedCoursePrice' => $discountedCoursePrice,
                'specialDiscountCount' => $specialDiscountCount,
                'totalEstimatedEarnings' => $totalEstimatedEarnings,
                'fullPayments' => $fullPayments,
                'dues' => $dues,
            ];
    
            $reports[] = $report;
        }
    
        return view('admin.batchReport', compact('reports',  'courses', 'batch'));
    }
    

    public function batchFinishedReport(){
  
        $batch= Batch::with('course', 'teacher')->where('batch_status', '=' , 'Finished')->get();
        return view('admin.batchFinishedReport',compact('batch'));
    }
    public function checkBatchStatus()
    {
        $batches = Batch::all();

        return response()->json(json_encode($batches));

    }

    public function updateStatus(Request $request, $id)
    {
        $batch = Batch::findOrFail($id);
        $currentDate = Carbon::now()->format('Y-m-d');
        if ($batch->end_date < $currentDate) {
            $batch->batch_status = 'Finished';
            $batch->save();
        }

        return response()->json(['status' => 'success']);
    }
    }
    

