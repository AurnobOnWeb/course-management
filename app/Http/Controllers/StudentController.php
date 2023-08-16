<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\course;
use App\Models\Batch;
use App\Models\Payment;
use App\Models\Student;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Return_;
 
class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view student'])->only(['index'],['__invoke']);
        $this->middleware(['permission:create student'])->only(['create'],['store']);
        $this->middleware(['permission:edit student'])->only(['edit'],['update']);
        $this->middleware(['permission:delete student'])->only(['destroy']);
         
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $student = Student::where('status', 'Enrolled')->get();
       return view('admin.student',compact('student'));

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = course::latest()->get();
        $batch = Batch::latest()->get();
       return view('admin.studentAdd',compact('course','batch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation rules For student Information
        $validatedData = $request->validate([
            'student_name' => 'required|unique:students',
            'qualification' => 'required',
            'dob' => 'required',
            'parent_name' => 'required',
            'student_number' => 'required',
            'parent_number' => 'required',
            'address' => 'required',
            'student_email' => 'required|unique:students',
            'image' => 'required|mimes:jpeg,png,jpg,gif',

        ]);
          //  array to string of board exam
        $array =$request->board_exam;
        $string = implode(',', $array);
        //storing student Image
        $image =$request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('backend/assets/images', $imageName);
       
        //  Storing student Nid/cirtificate 
        $nid =$request->nid;
        $nidName = time().'b.'.$nid->getClientOriginalExtension();
        $request->nid->move('backend/assets/images', $nidName);
            
       //  Storing student Nid/cirtificate 
       $cirtificate =$request->cirtificate;
       $cirtificateName = time().'a.'.$cirtificate->getClientOriginalExtension();
       $request->cirtificate->move('backend/assets/images', $cirtificateName);

        // Create a new student instance and save the student information
        $student = new Student();

        $student->student_name = $validatedData['student_name'];
        $student->qualification = $validatedData['qualification'];
        $student->dob = $validatedData['dob'];
        $student->parent_name = $validatedData['parent_name'];
        $student->student_number = $validatedData['student_number'];
        $student->parent_number = $validatedData['parent_number'];
        $student->address = $validatedData['address'];
        $student->student_email = $validatedData['student_email'];
        $student->image =$imageName;
        $student->status = 'Unenrolled';
        $student->nid =  $nidName;
        $student->board_exam =$string;
        $student->board_name =$request->board_name;
        $student->cirtificate = $cirtificateName;
        $student->reg_ssc =$request->reg_ssc;
        $student->roll_ssc = $request->roll_ssc;

        $student->save();
     // Saved Student data
     
    
     // Checking If payment Needed
              $checkboxValue = $request->input('myCheckbox') ? 1 : 0;
         if($checkboxValue == 1){
            return redirect()->back()->with('massage','Student Info SuccessFully addedss');
         
         }else{
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
    
        //requested data as variable
        $course_fee= $validatedData['course_fee'];
        $payments= $validatedData['payment'];
        $course_id =$validatedData['course_id'];
        $batch_id = $validatedData['batch_id']; 
        
        $payment = new Payment();
        $payment->course_id = $course_id;
        $payment->batch_id = $batch_id;
        $payment->course_price = $validatedData['course_price'];
        $payment->special_discount = $validatedData['special_discount'];
        $payment->course_fee =  $course_fee;
        $payment->payment = $payments;
        $payment->payment_date = $currentDate;
        $payment->student_id = $student->id; // Set the foreign key
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
          Student::where('id', $student->id)->update(['status' => 'Enrolled']);
        return redirect()->back()->with('massage','Student Info & Payment SuccessFully added');
            
         }
       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $student = Student::find($id);
       return view('admin.studentshow',compact('student'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $string= $student->board_exam;
        $array = explode(',', $string);
       return view('admin.studentEdit',compact('student','array'));
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
       
        // validation rules For student Information
        $validatedData = $request->validate([
            'student_name' => 'required',
            'qualification' => 'required',
            'dob' => 'required',
            'parent_name' => 'required',
            'student_number' => 'required',
            'parent_number' => 'required',
            'address' => 'required',
            'student_email' => 'required',
        ]);
               //  array to string of board exam
               $array =$request->board_exam;
               $string = implode(',', $array);
           
         $student = Student::find($id);
         $student->student_name = $validatedData['student_name'];
         $student->qualification = $validatedData['qualification'];
         $student->dob = $validatedData['dob'];
         $student->parent_name = $validatedData['parent_name'];
         $student->student_number = $validatedData['student_number'];
         $student->parent_number = $validatedData['parent_number'];
         $student->address = $validatedData['address'];
         $student->student_email = $validatedData['student_email'];
         $image =$request->image;
         if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('backend/assets/images', $imageName);
            $student->image = $imageName;
         }
        
         //  Storing student Nid/cirtificate 
         $nid =$request->nid;
         if($nid){
           $nidName = time().'b.'.$nid->getClientOriginalExtension();
           $request->nid->move('backend/assets/images', $nidName);
           $student->nid =  $nidName;
        }
         $student->board_exam =$string;
         $student->board_name =$request->board_name;

         $cirtificate =$request->cirtificate;
         if($cirtificate){
           $cirtificateName = time().'a.'.$cirtificate->getClientOriginalExtension();
           $request->cirtificate->move('backend/assets/images', $cirtificateName);
           $student->cirtificate =  $cirtificateName;
        }
        
         $student->reg_ssc =$request->reg_ssc;
         $student->roll_ssc = $request->roll_ssc;
         $student->save();
         if($student->status =='Enrolled'){
            return redirect()->route('student.index')->with('massage','Student Information SuccessFully Updated');
         }else{
            return redirect()->route('resources.unenrollStudent')->with('massage','Student Information SuccessFully Updated');
         }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $course_id = $student->course_id;
        $batch_id = $student->batch_id;
        if($student->status == "Enrolled"){
            $student->delete();
            //when student Will delete her/his payment will removed also
            Payment::where('student_id', $student->id)->delete();
        //when student Delete ..  student count will decrement in course Table :)
          course::where('id',$course_id)->decrement('student_count',1);

        //when student Delete ..  student count will decrement in Batch Table also :)
        Batch::where('id',$batch_id)->decrement('student_count',1);

            return redirect()->route('student.index')->with('message','Student And His/Her Payment Information SuccessFully Deleted');
        }elseif ($student->status == "Unenrolled") {
            $student->delete();
            return redirect()->route('resources.unenrollStudent')->with('message','Unenrolled Student Information SuccessFully Deleted');
            
        }
        
       
    }
    public function __invoke()
{
       
        $student = Student::where('status', 'Unenrolled')->get();
       return view('admin.UnenrolledStudent',compact('student'));

}
}