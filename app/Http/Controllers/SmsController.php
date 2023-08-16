<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request; 

class SmsController extends Controller
{
    public function __construct()
    {
    
        $this->middleware(['permission:message'])->only(['particularStudent']);
        $this->middleware(['permission:message'])->only(['batchSms']);
        $this->middleware(['permission:message'])->only(['allStudent']);
        $this->middleware(['permission:message'])->only(['courseSms']);
        $this->middleware(['permission:message'])->only(['particularTeacher']);
        $this->middleware(['permission:message'])->only(['allTeacher']);
        $this->middleware(['permission:message'])->only(['fetchStudentNumber']);

       
 
    }
        public function particularStudent(){
                $student = Student::latest()->get();
            return view('admin.particularStudent',compact('student'));
        }
        public function allStudent(){
                return view('admin.allStudent');
        }
        public function batchSms(){
            $course = course::latest()->get();
            $batch = Batch::latest()->get();
        return view('admin.batchSms',compact('course','batch'));
        }
        public function courseSms(){
            $course = course::latest()->get();
        return view('admin.courseSms',compact('course'));
        }
        public function particularTeacher(){
            $teacher = Teacher::latest()->get();
        return view('admin.particularTeacher',compact('teacher'));
        }
        public function allTeacher(){
        return view('admin.allTeacher');
        }
        public function fetchStudentNumber(Request $request)
        {
            $studentId = $request->input('student_id');

            // Fetch the student number from the database based on the student ID
            $student = Student::find($studentId);
            $studentNumber = $student ? $student->student_number : '';

            return response()->json($studentNumber);
            }
            public function fetchTeacherNumber(Request $request)
            {
                $teacherId = $request->input('teacher_id');
            
                // Fetch the teacher from the database based on the teacher ID
                $teacher = Teacher::find($teacherId);
            
                // Check if the teacher exists
                if ($teacher) {
                    $teacherNumber = $teacher->phone;
                    $teacherSalary = $teacher->salary;
                } else {
                    $teacherNumber = '';
                    $teacherSalary = '';
                }
            
                return response()->json([
                    'teacherNumber' => $teacherNumber,
                    'teacherSalary' => $teacherSalary
                ]);
            }
            
        }
