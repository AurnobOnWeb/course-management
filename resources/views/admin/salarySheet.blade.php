@extends('admin.layouts.template')
@section('title')
Particular Teacher Sms | @foreach($settings as $setting) {{ $setting->institute_name }} @endforeach
@endsection
@section('content')

<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Particular Teacher Sms <div class="float-right" style="color:white;">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                            Add Salary
                        </button>

                    </div>
                </h5>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <div class="center" style="margin: auto;  padding: 10px;">
                        <form>
                            <div class="form-group col-lg-12">
                                <div class="input-group mb-3 ">
                                    <input type="search" name="teacher_name" required value="" class="form-control" placeholder="Search By name " style="margin-right: 20px">
                                    <input onfocus="(this.type='date')" required id="date" type="text" name="start_date" value="" class="form-control textbox-n" placeholder="From" style="margin-right: 20px">
                                    <input onfocus="(this.type='date')" required id="date" type="text" name="end_date" value="" class="form-control textbox-n" placeholder="To" style="margin-right: 20px">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Go!</button>
                                    </div>
                                    <a href="{{ route('teacherSalary') }}" class="btn btn-info" style="margin-left: 20px ;color:white;">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="center" style="margin: auto;  padding: 10px;">
                        <form>
                            <div class="form-group col-lg-9">
                                <div class="input-group mb-4 ">
                                    <select class="form-control" id="payment_month" name="payment_month" style="margin-right: 20px">
                                        <option value="">Select Payment Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                    <select class="form-control" id="date" name="dates" style="margin-right: 20px">
                                        <option value="">Select Payment Year</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                   
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Go!</button>
                                    </div>
                                    <a href="{{ route('teacherSalary') }}" class="btn btn-info" style="margin-left: 20px ;color:white;">Reset</a>
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
                                <th>Teacher Name</th>
                                <th>Teacher Phone</th>
                                <th>Base salary</th>
                                <th>Allowances</th>
                                <th>Deductions</th>
                                <th>Deductions Reason</th>
                                <th>Bonuses</th>
                                <th>overTime hour</th>
                                <th>overTime CostPer</th>
                                <th>total salary</th>
                                <th>payment Method</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Payment Date</th>
                                <th>Payment Month</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teacherSalary as $teacherSalarys)
                            <tr>
                                @foreach($teacherSalarys->teachers as $teacherss)
                                <td>{{ $teacherss->name }}</td>
                                <td>{{ $teacherss->phone }}</td>
                                <td>{{ $teacherss->salary }}</td>
                                @endforeach
                                <td>{{ $teacherSalarys->allowances }}</td>
                                <td>{{ $teacherSalarys->deductions }}</td>
                                <td>{{ $teacherSalarys->deductions_reason }}</td>
                                <td>{{ $teacherSalarys->bonuses }}</td>
                                <td>{{ $teacherSalarys->overTime_hour }}</td>
                                <td>{{ $teacherSalarys->overTime_CostPer }}</td>
                                <td>{{ $teacherSalarys->total_salary }}</td>
                                <td>{{ $teacherSalarys->payment_method }}</td>
                                <td>{{ $teacherSalarys->start_date }}</td>
                                <td>{{ $teacherSalarys->end_date }}</td>
                                <td> {{ $teacherSalarys->payment_date }} </td>
                                <td>{{ $teacherSalarys->payment_month }} </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2{{$teacherSalarys->id  }}" style="margin-bottom: 5px;"><i class="fas fa-trash" aria-hidden="true"></i>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal5{{$teacherSalarys->id  }}"><i class="fas fa-trash" aria-hidden="true"></i>
                                        Delete
                                    </button></td>
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



<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Fill all the information to Send Sms</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="validationform" action="{{ route('storeSalary') }}" method="post" data-parsley-validate="" novalidate="">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select id="teacher-select" class="selectpicker form-control" name="teacher_id" data-live-search="true" data-hide-disabled="true">
                                <option value="" disabled selected>Teacher Name</option>
                                @foreach($teacher as $teachers)
                                <option value="{{ $teachers->id }}">{{ $teachers->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('student_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="teacher-number" type="text" placeholder="Teacher Number" class="form-control" disabled>
                            <span class="text-danger">
                                @error('student_number')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher salary</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="teacher-salary" type="text" placeholder="Teacher_Salary" class="form-control" disabled>
                            <span class="text-danger">
                                @error('Teacher_Salary')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Allowances</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="allowances" type="text" name="allowances" value="{{  old('allowances')}}" placeholder="Allowances" class="form-control">
                            <span class="text-danger">
                                @error('allowances')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Deductions</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="deductions" type="text" name="deductions" value="{{  old('deductions')}}" placeholder="Deductions" class="form-control" required>
                            <span class="text-danger">
                                @error('deductions')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Deductions Reason</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="deductions_reason" type="text" name="deductions_reason" value="{{  old('deductions_reason')}}" placeholder="Deductions Reason" class="form-control">
                            <span class="text-danger">
                                @error('deductions_reason')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Bonuses</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="bonuses" type="text" name="bonuses" value="{{  old('bonuses')}}" placeholder="Bonuses" class="form-control">
                            <span class="text-danger">
                                @error('bonuses')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Over Time total Hour</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="overTime_hour" type="text" name="overTime_hour" value="{{  old('overTime_hour')}}" placeholder="Over Time total Hour" class="form-control">
                            <span class="text-danger">
                                @error('overTime_hour')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Over Time Cost Per Hour</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="overTime_CostPer" type="text" name="overTime_CostPer" value="{{  old('overTime_CostPer')}}" placeholder="Over Time Cost Per Hour" class="form-control">
                            <span class="text-danger">
                                @error('overTime_CostPer')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Total Salary</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="total_salary" type="text" name="total_salary" value="{{  old('total_salary')}}" placeholder="Total Salary" class="form-control">
                            <span class="text-danger">
                                @error('total_salary')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Payment Method</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" id="payment_method" name="payment_method">
                                <option value="">Select Payment Method</option>
                                <option value="Cash">Cash</option>
                                <option value="Mobile Banking">Mobile Banking</option>
                                <option value="Bank">Bank</option>

                            </select>
                            <span class="text-danger">
                                @error('payment_method')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Start Date</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="start_date" type="date" value="{{  old('start_date')}}" name="start_date" placeholder="Start Date" class="form-control">
                            <span class="text-danger">
                                @error('start_date')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">End Date</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="end_date" type="date" value="{{  old('end_date')}}" name="end_date" placeholder="End Date" class="form-control">
                            <span class="text-danger">
                                @error('end_date')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Payment Month</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" id="payment_month" name="payment_month">
                                <option value="">Select Payment Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            <span class="text-danger">
                                @error('payment_month')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Add salary </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


@foreach($teacherSalary as $teacherSalarys)
<div class="modal fade" id="myModal5{{ $teacherSalarys->id }}">
    <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete This Data?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Are You Sure ? To Delete
            </div>   
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              
                    <a href="{{ route('deleteSalary', $teacherSalarys->id) }}" type="submit" class="btn btn-primary">Delete</a>
               
            </div>
        </div>
    </div>
</div>
@endforeach




@foreach($teacherSalary as $teacherSalarys)

<div class="modal fade" id="myModal2{{ $teacherSalarys->id }}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="validationform" action="{{ route('updateSalary', $teacherSalarys->id) }}" method="post" data-parsley-validate="" novalidate="">
                @csrf
                @method('put')
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select id="teacher-select" class="selectpicker form-control" name="teacher_id" data-live-search="true" data-hide-disabled="true " disabled>
                                <option value="" disabled selected>Teacher Name</option>
                                @foreach($teacher as $teachers)
                                <option value="{{ $teachers->id }}" @if (in_array( $teachers->id , $data)) selected @endif>{{ $teachers->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('student_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            @foreach($teacherSalarys->teachers as $teacherss)
                            <input id="teacher-number" value="{{ $teacherss->phone  }}" type="text" placeholder="Teacher Number" class="form-control" disabled>
                            @endforeach
                            <span class="text-danger">
                                @error('student_number')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher salary</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            @foreach($teacherSalarys->teachers as $teacherss)
                            <input id="teacher-salary" value="{{ $teacherss->salary  }}" type="text" placeholder="Teacher_Salary" class="form-control" disabled>
                            @endforeach
                            <span class="text-danger">
                                @error('Teacher_Salary')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Allowances</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="allowances" type="text" name="allowances" value="{{$teacherSalarys->allowances}}" placeholder="Allowances" class="form-control">
                            <span class="text-danger">
                                @error('allowances')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Deductions</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="deductions" type="text" name="deductions" value="{{ $teacherSalarys->deductions}}" placeholder="Deductions" class="form-control" required>
                            <span class="text-danger">
                                @error('deductions')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Deductions Reason</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="deductions_reason" type="text" name="deductions_reason" value="{{  $teacherSalarys->deductions_reason}}" placeholder="Deductions Reason" class="form-control">
                            <span class="text-danger">
                                @error('deductions_reason')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Bonuses</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="bonuses" type="text" name="bonuses" value="{{  $teacherSalarys->bonuses}}" placeholder="Bonuses" class="form-control">
                            <span class="text-danger">
                                @error('bonuses')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Over Time total Hour</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="overTime_hour" type="text" name="overTime_hour" value="{{ $teacherSalarys->overTime_hour}}" placeholder="Over Time total Hour" class="form-control">
                            <span class="text-danger">
                                @error('overTime_hour')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Over Time Cost Per Hour</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="overTime_CostPer" type="text" name="overTime_CostPer" value="{{  $teacherSalarys->overTime_CostPer}}" placeholder="Over Time Cost Per Hour" class="form-control">
                            <span class="text-danger">
                                @error('overTime_CostPer')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Total Salary</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="total_salary" type="text" name="total_salary" value="{{  $teacherSalarys->total_salary}}" placeholder="Total Salary" class="form-control">
                            <span class="text-danger">
                                @error('total_salary')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Payment Method</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" id="payment_method" name="payment_method">
                                <option value="">Select Payment Method</option>
                                <option value="Cash" {{ $teacherSalarys->payment_method =='Cash' ? 'selected' : '' }}>Cash</option>
                                <option value="Mobile Banking" {{ $teacherSalarys->payment_method =='Mobile Banking' ? 'selected' : '' }}>Mobile Banking</option>
                                <option value="Bank" {{ $teacherSalarys->payment_method =='Bank' ? 'selected' : '' }}>Bank</option>

                            </select>
                            <span class="text-danger">
                                @error('payment_method')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Start Date</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="start_date" type="date" value="{{ $teacherSalarys->start_date}}" name="start_date" placeholder="Start Date" class="form-control">
                            <span class="text-danger">
                                @error('start_date')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">End Date</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="end_date" type="date" value="{{ $teacherSalarys->end_date}}" name="end_date" placeholder="End Date" class="form-control">
                            <span class="text-danger">
                                @error('end_date')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Payment Month</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" id="payment_month" name="payment_month">
                                <option value="">Select Payment Month</option>
                                <option value="January" {{ $teacherSalarys->payment_month =='January' ? 'selected' : '' }}>January</option>
                                <option value="February" {{ $teacherSalarys->payment_month =='February' ? 'selected' : '' }}>February</option>
                                <option value="March" {{ $teacherSalarys->payment_month =='March' ? 'selected' : '' }}>March</option>
                                <option value="April" {{ $teacherSalarys->payment_month =='April' ? 'selected' : '' }}>April</option>
                                <option value="May" {{ $teacherSalarys->payment_month =='May' ? 'selected' : '' }}>May</option>
                                <option value="June" {{ $teacherSalarys->payment_month =='June' ? 'selected' : '' }}>June</option>
                                <option value="July" {{ $teacherSalarys->payment_month =='July' ? 'selected' : '' }}>July</option>
                                <option value="August" {{ $teacherSalarys->payment_month =='August' ? 'selected' : '' }}>August</option>
                                <option value="September" {{ $teacherSalarys->payment_month =='September' ? 'selected' : '' }}>September</option>
                                <option value="October" {{ $teacherSalarys->payment_month =='October' ? 'selected' : '' }}>October</option>
                                <option value="November" {{ $teacherSalarys->payment_month =='November' ? 'selected' : '' }}>November</option>
                                <option value="December" {{ $teacherSalarys->payment_month =='December' ? 'selected' : '' }}>December</option>
                            </select>
                            <span class="text-danger">
                                @error('payment_month')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Update salary </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@endforeach
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#teacher-select').change(function() {
            var teacherId = $(this).val();
            if (teacherId !== '') {
                // Perform an AJAX request to fetch the teacher number and salary based on the selected teacher ID
                $.ajax({
                    url: '/fetch-teacher-number'
                    , type: 'GET'
                    , data: {
                        teacher_id: teacherId
                    }
                    , success: function(response) {
                        // Populate the teacher number and salary input fields with the fetched data
                        $('#teacher-number').val(response.teacherNumber);
                        $('#teacher-salary').val(response.teacherSalary);
                    }
                    , error: function(xhr) {
                        console.log('Error fetching teacher data');
                    }
                });
            } else {
                // Clear the teacher number and salary input fields if no teacher is selected
                $('#teacher-number').val('');
                $('#teacher-salary').val('');
            }
        });
    });

    $(document).ready(function() {
        $('body').on("input", 'input', function(e) {
            var modalId = $(this).closest('.modal').attr('id');
            var teacherSalary = document.getElementById(modalId).querySelector("#teacher-salary");
            var allowances = document.getElementById(modalId).querySelector("#allowances");
            var deductions = document.getElementById(modalId).querySelector("#deductions");
            var bonuses = document.getElementById(modalId).querySelector("#bonuses");
            var overTime_hour = document.getElementById(modalId).querySelector("#overTime_hour");
            var overTime_CostPer = document.getElementById(modalId).querySelector("#overTime_CostPer");
            var total_salary = document.getElementById(modalId).querySelector("#total_salary");

            // Function to calculate the salary
            function calculateSalary() {
                var salary = parseFloat(teacherSalary.value) || 0;
                var allowance = parseFloat(allowances.value) || 0;
                var deduction = parseFloat(deductions.value) || 0;
                var bonus = parseFloat(bonuses.value) || 0;
                var overtimeHour = parseFloat(overTime_hour.value) || 0;
                var overtimeCostPer = parseFloat(overTime_CostPer.value) || 0;

                var overtimeAmount = overtimeHour * overtimeCostPer;
                var totalSalary = salary + allowance - deduction + bonus + overtimeAmount;

                total_salary.value = totalSalary;
            }

            // Get the parent element that wraps the input fields
            var parentElement = document.getElementById(modalId);

            // Attach the event listener to the parent element using event delegation
            parentElement.addEventListener("input", function(event) {
                if (event.target.matches("#teacher-salary, #allowances, #deductions, #bonuses, #overTime_hour, #overTime_CostPer")) {
                    calculateSalary();
                }
            });
        });
    });

    // Get the parent element that wraps the input fields
    var parentElement = document.querySelector(".modal.fade");

    // Calculate the total salary
    function calculateSalary() {
        var teacherSalary = parentElement.querySelector("#teacher-salary");
        var allowances = parentElement.querySelector("#allowances");
        var deductions = parentElement.querySelector("#deductions");
        var bonuses = parentElement.querySelector("#bonuses");
        var overTime_hour = parentElement.querySelector("#overTime_hour");
        var overTime_CostPer = parentElement.querySelector("#overTime_CostPer");
        var total_salary = parentElement.querySelector("#total_salary");

        var salary = parseFloat(teacherSalary.value) || 0;
        var allowance = parseFloat(allowances.value) || 0;
        var deduction = parseFloat(deductions.value) || 0;
        var bonus = parseFloat(bonuses.value) || 0;
        var overtimeHour = parseFloat(overTime_hour.value) || 0;
        var overtimeCostPer = parseFloat(overTime_CostPer.value) || 0;

        var overtimeAmount = overtimeHour * overtimeCostPer;
        var totalSalary = salary + allowance - deduction + bonus + overtimeAmount;

        total_salary.value = totalSalary;
    }

    // Attach the event listener to the parent element using event delegation
    parentElement.addEventListener("input", function(event) {
        if (event.target.matches("#teacher-salary, #allowances, #deductions, #bonuses, #overTime_hour, #overTime_CostPer")) {
            calculateSalary();
        }
    });

</script>

@endsection
