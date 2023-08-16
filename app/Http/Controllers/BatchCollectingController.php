<?php

namespace App\Http\Controllers;
use App\Models\course;
use App\Models\Batch;
use Illuminate\Http\Request;

class BatchCollectingController extends Controller
{


    public function getBatch(Request $request, $course)
    {
        $batches = Batch::where('course_id', $course)->get();
        $course = course::find($course); 

        return response()->json([
            'batches' => $batches,
            'price' => $course->discount_price
        ]);
    }
}
 
