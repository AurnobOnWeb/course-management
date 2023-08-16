@extends('admin.layouts.template')
@section('title')
Course Report | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Course Based Payment Report </h5>
                <p>Search By Name & start to End <br> if Start date date and end date Has no data it will show you nothing</p>
            </div>

            <div class="card-body">
 
                <div class="table-responsive">
                     <div class="center"  style="margin: auto;  padding: 10px;">
                        <form >
                            <div class="form-group col-lg-9">
                                <div class="input-group mb-3 ">
                                    <input type="search" name="course_name" required value="{{ $course_name }}" class="form-control" placeholder="Search By name " style="margin-right: 20px">
                                    <input  onfocus="(this.type='date')" value="{{ $start_date }}"  required id="date" type="text" name="start_date" value="" class="form-control textbox-n" placeholder="From"  style="margin-right: 20px">
                                    <input  onfocus="(this.type='date')" value="{{ $end_date }}" required  id="date" type="text" name="end_date" value="" class="form-control textbox-n" placeholder="To"  style="margin-right: 20px">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Go!</button>
                                    </div>
                                    <a href="{{ route('courseReport') }}" class="btn btn-info" style="margin-left: 20px ;color:white;">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if(session()->has('massage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session()->get('massage') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if(session()->has('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong> {{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                 
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>Course_name</th>
                                <th>student count</th>
                                <th>Batch Count</th>
                                <th>Discounted course price</th>
                                <th>Special discount Student</th>
                                <th>Estimate Earnings</th>
                                <th>Full payments</th>
                                <th>Dues</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                          
                           <tr> <td>{{ $report['course']->course_name }}</td>
                                <td>{{ $report['studentCount'] }}</td>
                               <td>{{ $report['course']->batch_count }}</td> 
                                <td>{{ $report['discountedCoursePrice'] }}</td>
                                <td>{{ $report['specialDiscountCount'] }}</td>

                                <td>{{ $report['totalEstimatedEarnings'] }}</td>
                                <td>{{ $report['fullPayments'] }}</td>
                                <td>{{ $report['dues'] }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  

                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end fixed header  -->
    <!-- ============================================================== -->
</div>
@endsection
