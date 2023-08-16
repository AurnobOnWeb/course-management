<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
  public function invoice( $id ,Request $request){

    $payment= Payment::with('course', 'batch', 'student')->find($id);
    $due = $payment->course_fee - $payment->payment;
    return view('admin.invoice',compact('payment','due'));
  }
}
