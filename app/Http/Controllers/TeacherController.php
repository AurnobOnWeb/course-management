<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class TeacherController extends Controller
{   public function __construct()
    {
        $this->middleware(['permission:view teacher'])->only(['index']);
        $this->middleware(['permission:create teacher'])->only(['create'],['store']);
        $this->middleware(['permission:edit teacher'])->only(['edit'],['update']);
        $this->middleware(['permission:delete teacher'])->only(['destroy']);
         
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $teacher = Teacher::latest()->get();
       return view('admin.teacher',compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.teacherAdd');
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
            'name' => 'required|unique:teachers',
            'qualifications' => 'required',
            'department' => 'required',
            'expert' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'joining' => 'required',
            'salary' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
            'cv' => 'required|mimes:pdf',
            'teacher_status' => 'required',

        ]);
        //storing Image
        $image =$request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('backend/assets/images', $imageName);
        //Storing Cv
        $cv =$request->cv;
        $cvName = time().'.'.$cv->getClientOriginalExtension();
        $request->cv->move('backend/assets/cv', $cvName);
        // Insertion
        Teacher::insert([
            'name' =>$request->name,
            'Qualifications' =>$request->qualifications, 
            'department' =>$request->department, 
            'expert' =>$request->expert, 
            'phone' =>$request->phone, 
            'email' =>$request->email, 
            'address' =>$request->address,
            'dob' =>$request->dob, 
            'joining' =>$request->joining, 
            'salary' =>$request->salary, 
            'teacher_status' =>$request->teacher_status, 
            'image' =>$imageName, 
            'cv' =>$cvName, 
        ]);
        return redirect()->back()->with('massage','Teachers SuccessFully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $teacher = Teacher::find($id);
       return view('admin.TeachermoreInfo',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   
        $teacher = Teacher::find($id);
       return view('admin.teacherEdit',compact('teacher'));
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
            'name' => 'required',
            'qualifications' => 'required',
            'department' => 'required',
            'expert' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'joining' => 'required',
            'salary' => 'required',
            'teacher_status' => 'required',
        ]);
        
         $teacher = Teacher::find($id);
         $teacher->name =$request->name;
         $teacher->Qualifications =$request->qualifications;
         $teacher->department =$request->department;
         $teacher->expert =$request->expert;
         $teacher->phone =$request->phone;
         $teacher->email =$request->email;
         $teacher->address =$request->dob;
         $teacher->joining =$request->joining;
         $teacher->salary =$request->salary;
         $teacher->teacher_status =$request->teacher_status;
          //Updating Image
         $image =$request->image;
         if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('backend/assets/images', $imageName);
            $teacher->image = $imageName;
         }
           //Updating Cv
         $cv =$request->cv;
         if($cv){
            $cvName = time().'.'.$cv->getClientOriginalExtension();
            $request->cv->move('backend/assets/cv', $cvName);
            $teacher->cv = $cvName;
         }
         $teacher->save();
         return redirect()->route('teacher.index')->with('massage','Teacher Information SuccessFully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->route('teacher.index')->with('message','Teacher Information SuccessFully Deleted');
    }
}
