<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view due payment'])->only(['index']);
        $this->middleware(['permission:view full payment'])->only(['show']);
         
    }
    public function index()
    {
      
        $payment= Payment::where('payment_status' , 'Due Payment')->with('course', 'batch', 'student')->get();
        return view('admin.PaymentDues',compact('payment'));
    }
    public function show()
    {
        
        $payment= Payment::where('payment_status' , 'Full Payment')->with('course', 'batch', 'student')->get();
        return view('admin.PaymentFull',compact('payment'));
    }
}
 