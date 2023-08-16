<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\TeacherSalary as ModelsTeacherSalary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherSalary extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:teacher salary'])->only(['index']);
        $this->middleware(['permission:teacher salary'])->only(['storeSalary']);
        $this->middleware(['permission:teacher salary'])->only(['updateSalary']);
        $this->middleware(['permission:teacher salary'])->only(['deleteSalary']);

         
    }
    public function index(Request $request)
    {   //first search
        $teacher_name = $request['teacher_name'] ?? '';
        $start_date = $request['start_date'] ?? '';
        $end_date = $request['end_date'] ?? '';
        //second search
        $payment_month = $request['payment_month'] ?? '';
        $dates = $request['dates'] ?? '';
    
        if ($teacher_name !== '' && $start_date !== '' && $end_date !== '') {
            $teacherSalary = ModelsTeacherSalary::whereBetween('payment_date', [$start_date, $end_date])
                ->whereHas('teachers', function ($query) use ($teacher_name) {
                    $query->where('name', 'like', '%' . $teacher_name . '%');
                })
                ->with('teachers')
                ->get();
        
            $teacher = Teacher::latest()->get();
            $data = $teacherSalary->pluck('id')->toArray();
        
            return view('admin.salarySheet', compact('teacher', 'teacherSalary', 'data'));
        }elseif($payment_month !== '' && $dates !== '' ){
            $teacherSalary = ModelsTeacherSalary::where('payment_month', $payment_month)
            ->whereYear('payment_date', $dates) // Compare the year of payment_date
            ->with('teachers')
            ->get();
        
        $teacher = Teacher::latest()->get();
        $data = $teacherSalary->pluck('id')->toArray();
        
        return view('admin.salarySheet', compact('teacher', 'teacherSalary', 'data'));
            
        } else {
            $teacherSalary = ModelsTeacherSalary::with('teachers')
                ->when($teacher_name !== '', function ($query) use ($teacher_name) {
                    $query->whereHas('teachers', function ($query) use ($teacher_name) {
                        $query->where('name', 'like', '%' . $teacher_name . '%');
                    });
                })
                ->latest()
                ->get();
        
            $teacher = Teacher::latest()->get();
            $data = $teacherSalary->pluck('id')->toArray();
        
            return view('admin.salarySheet', compact('teacher', 'teacherSalary', 'data'));
        }
        
    }
    
    public function storeSalary(Request $request){
        $request->validate([
            'teacher_id' => 'required',
            'allowances' => 'required',
            'deductions' => 'required',
            'deductions_reason' => 'required',
            'bonuses' => 'required',
            'overTime_hour' => 'required',
            'overTime_CostPer' => 'required',
            'total_salary' => 'required',
            'payment_method' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'payment_month' => 'required',
        ]);
         // current date pick
         $currentDate = Carbon::now()->format('Y-m-d');
        
         // Store salary
         ModelsTeacherSalary::insert([
            'teacher_id' =>$request->teacher_id,
            'allowances' =>$request->allowances, 
            'deductions' =>$request->deductions, 
            'deductions_reason' =>$request->deductions_reason, 
            'bonuses' =>$request->bonuses, 
            'overTime_hour' =>$request->overTime_hour, 
            'overTime_CostPer' =>$request->overTime_CostPer,
            'total_salary' =>$request->total_salary, 
            'payment_method' =>$request->payment_method, 
            'start_date' =>$request->start_date, 
            'end_date' =>$request->end_date, 
            'payment_month' =>$request->payment_month,
            'payment_date' => $currentDate
        ]);
        return redirect()->back()->with('massage','Teachers salary SuccessFully added');
    }

    public function updateSalary($id ,Request $request){
 $request->validate([
            'allowances' => 'required',
            'deductions' => 'required',
            'deductions_reason' => 'required',
            'bonuses' => 'required',
            'overTime_hour' => 'required',
            'overTime_CostPer' => 'required',
            'total_salary' => 'required',
            'payment_method' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'payment_month' => 'required',
        ]);
           // current date pick
           $currentDate = Carbon::now()->format('Y-m-d');


    $teacherSalary = ModelsTeacherSalary::find($id); // Replace $id with the actual ID of the record you want to update
    $teacherSalary->allowances = $request->allowances;
    $teacherSalary->deductions = $request->deductions;
    $teacherSalary->deductions_reason = $request->deductions_reason;
    $teacherSalary->bonuses = $request->bonuses;
    $teacherSalary->overTime_hour = $request->overTime_hour;
    $teacherSalary->overTime_CostPer = $request->overTime_CostPer;
    $teacherSalary->total_salary = $request->total_salary;
    $teacherSalary->payment_method = $request->payment_method;
    $teacherSalary->start_date = $request->start_date;
    $teacherSalary->end_date = $request->end_date;
    $teacherSalary->payment_month = $request->payment_month;
    $teacherSalary->payment_date = $currentDate;
    $teacherSalary->save();

    return redirect()->back()->with('massage','Teachers salary SuccessFully Updated');

    }
    public function deleteSalary($id){
        $teacherSalary = ModelsTeacherSalary::find($id);
        $teacherSalary->delete();
        return redirect()->back()->with('message','Salary Information SuccessFully Deleted');
    }
}
