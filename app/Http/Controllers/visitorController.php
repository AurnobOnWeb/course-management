<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class visitorController extends Controller
{ 
    
    public function __construct()
    {
     
        $this->middleware(['permission:visitor'])->only(['visitorView']);
        $this->middleware(['permission:visitor'])->only(['visitorAdd']);
        $this->middleware(['permission:visitor'])->only(['visitorEdit']);
        $this->middleware(['permission:visitor'])->only(['updateVisitor']);
        $this->middleware(['permission:visitor'])->only(['deletevisitor']);
 
    }
    public function visitorView(Request $request)
    {
        $query = Visitor::with('course');
    
      
        $start_date = $request['start_date'] ?? '';
        $end_date = $request['end_date'] ?? '';
    
        if ( $start_date != '' && $end_date != '') {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('date', [$startDate, $endDate]);
        }
    
        $visitors = $query->get();
        $reports = [];
    
        if ( $start_date != '' && $end_date != '') {
            foreach ($visitors as $visitor) { 
                $courseNameValue = course::where('id', $visitor->intrested_course)->first('course_name');
                $courseName = $courseNameValue->course_name;
                $report = [
                     'visitor' => $visitor,
                    'courseName' => $courseName,
                ];
    
                $reports[] = $report;
            }
        } else {
            foreach ($visitors as $visitor) {
                $courseNameValue = course::where('id', $visitor->intrested_course)->first('course_name');
                $courseName = $courseNameValue->course_name;
    
                $report = [
                    'visitor' => $visitor,
                    'courseName' => $courseName,
                ];
    
                $reports[] = $report;
            }
        }
    
        return view('admin.visitorview', compact('reports'));
    }
    
    
    
        public function visitorAdd(){
            $course = course::latest()->get();
            return view('admin.visitoradd', compact('course'));
        }
        public function storeVisitor(Request $request){
            $request->validate([
                'name' => 'required|unique:visitors',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'note' => 'required',
                'intrested_course' => 'required'
            ]);
        // current date pick
            $currentDate = Carbon::now()->format('Y-m-d');
            visitor::insert([
                'name' =>$request->name,
                'address' =>$request->address, 
                'phone' =>$request->phone, 
                'email' =>$request->email, 
                'note' =>$request->note, 
                'intrested_course' =>$request->intrested_course, 
                'date' => $currentDate

            ]);
            return redirect()->back()->with('massage','Visitor SuccessFully added');
        }
        public function visitorEdit( $id){
            $course = course::latest()->get();
            $visitor = visitor::with('course')->find($id);
            $data =$visitor->course()->pluck("id")->toArray();
            return view('admin.visitoredit', compact('visitor','data','course'));
        }

        public function updateVisitor(Request $request, $id){
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'note' => 'required',
                'intrested_course' => 'required'
            ]);
             // current date pick
              $currentDate = Carbon::now()->format('Y-m-d');
            $visitor = visitor::find($id);
            $visitor->name =$request->name;
            $visitor->address =$request->address;
            $visitor->phone =$request->phone;
            $visitor->email =$request->email;
            $visitor->note =$request->note;
            $visitor->intrested_course =$request->intrested_course;
            $visitor->date =$currentDate;
            $visitor->save();
            return redirect()->route('visitorView')->with('massage','Visitor SuccessFully Updated');
        }
        public function deletevisitor($id){
        $visitor = visitor::find($id);
        if (!is_null($visitor))
        $visitor->delete();
        return redirect()->route('visitorView')->with('message','Visitor SuccessFully Deleted');
        }


}
