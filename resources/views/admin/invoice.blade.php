@extends('admin.layouts.template')
@section('title')
Invoice | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Invoice Of Enrollment </h2>
                <p class="pageheader-text">Press CTRL+P To Print the Invoice</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link">Payment</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Enrollment Invoice</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            @foreach($settings as $setting)  
            <div class="card">
                <div class="card-header p-4">
                     <a class="pt-2 d-inline-block" href="">{{ $setting->institute_name }} </a>
                   
                    <div class="float-right"> <h3 class="mb-0">Invoice</h3>
                    {{ 
                    date_format(now() , "d-M-y") }}</div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h5 class="mb-3">From:</h5>                                            
                            <h3 class="text-dark mb-1">{{ $setting->institute_name }} </h3>
                         
                            <div>{{ $setting->address }}  </div>
                            <div>{{ $setting->institute_email }} </div>
                            <div>{{ $setting->contact_number }} </div>
                        </div>
                        @foreach($payment->student as $students)
                            
                        
                        <div class="col-sm-6">
                            <h5 class="mb-3">To:</h5>
                            <h3 class="text-dark mb-1">{{ $students->student_name }}</h3>                                            
                            <div>{{ $students->address }}</div>
                            <div>{{ $students->parent_number }}</div>
                            <div>{{ $students->student_email }}</div>
                            <div>{{ $students->student_number }}</div>
                        </div>
                        @endforeach
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                  
                                    <th>Course Name</th></th>
                                    <th class="right">Batch Name</th>
                                    <th class="center">Batch Start </th>
                                    <th class="center">End date </th>
                                    <th class="center">Course Price</th>
                                    <th class="center">Discount</th>
                                    <th class="center">Course Fee</th>
                                    <th class="center">Paid</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="center">1</td>
                                    @foreach($payment->course as $courses)
                                    <td class="left strong">{{ $courses->course_name }}</td>
                                    @endforeach
                                    @foreach($payment->batch as $batches)
                                    <td class="left">{{ $batches->batch_name }}</td>
                                    <td class="right">{{ $batches->start_date }}</td>
                                    <td class="right">{{ $batches->end_date }}</td>
                                    @endforeach
                                    <td class="right">  {{ $payment->course_price }} tk</td>
                                    <td class="right">{{ $payment->special_discount }} %</td>
                                    <td class="right">{{ $payment->course_fee }} tk</td>
                                    <td class="right">  {{ $payment->payment }} tk</td>
                                  
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <div class="col-lg-3 col-sm-3 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        
                                        <td class="left">
                                            <strong class="text-dark">Due</strong>
                                        </td>
                                        <td class="right">
                                            <strong class="text-dark"> {{ $due }} tk</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="left">
                                            <strong class="text-dark">Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong class="text-dark"> {{ $payment->payment }} tk</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <p class="mb-0">{{ $setting->institute_name }} -- {{ $user->name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection