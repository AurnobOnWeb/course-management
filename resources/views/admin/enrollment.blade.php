@extends('admin.layouts.template')
@section('title')
Enroll a student | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Payment = Enroll </h5>
                <p>Search By student Number Or Phone Number To Enroll Student</p>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <div class="center" style="margin: auto; width: 50%; padding: 10px;">
                        <form action="">
                            <div class="form-group col-lg-8">
                                <label class="col-form-label">Search Your Need</label>
                                <div class="input-group mb-3">
                                    <input type="search" name="search" value="{{ $search }}" class="form-control" placeholder="Search By name or Phone Here">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Go!</button>

                                    </div>
                                    <a href="{{ url('enrollments') }}" class="btn btn-info" style="margin-left: 20px ;color:white;">Reset</a>
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
                    @can('view enroll')
               
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Qualification</th>
                                <th>DOB</th>
                                <th>Parent Name</th>
                                <th>Student Number</th>
                                <th>Parent Number</th>

                                <th>Image </th>
                                <th>Status</th>
                                <th>Enroll</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($student as $students)
                            <tr>
                                <td>{{ $students->student_name }}</td>
                                <td>{{ $students->qualification}}</td>
                                <td>{{ $students->dob }}</td>
                                <td>{{ $students->parent_name }}</td>
                                <td>{{ $students->student_number }}</td>
                                <td>{{ $students->parent_number }}</td>
                                <td> <img src="{{ url('backend/assets/images/',$students->image) }}" alt="" height="100px" width="100px"></td>
                                <td>
                                    @if($students->status == 'Unenrolled')
                                    <span class="btn btn-warning"> Unenrolled</span>
                                    @else
                                    <span class="btn btn-success "> Enrolled</span>
                                    @endif

                                </td>
                                <td>
                                    @can('enroll')
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $students->id }}">
                                        Enroll Student 
                                    </button>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endcan

                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end fixed header  -->
    <!-- ============================================================== -->
</div>
@foreach($student as $students)
<div class="modal fade" id="myModal{{ $students->id }}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Fill all the information to Enroll</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="validationform" action="{{ route('enrollments.store') }}" method="post" data-parsley-validate="" novalidate="">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="student_id" type="text" required value="{{  old('student_name',$students->id)}}" placeholder="Student Name" class="form-control" hidden>
                            <input type="text" required value="{{  old('student_name',$students->student_name)}}" placeholder="Student Name" class="form-control" disabled>
                            <span class="text-danger">
                                @error('student_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" required value="{{  old('student_number',$students->student_number)}}" placeholder="Student Number" class="form-control" disabled>
                            <span class="text-danger">
                                @error('student_number')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Course & Batch</label>
                        <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                            <select class="form-control" id="course" name="course_id">
                                <option value="">Select course </option>
                                @foreach($course->where('course_status', 'Active') as $courses)
                                <option value="{{ $courses->id }}">{{ $courses->course_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('course_id')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <select id="batch" class="form-control" name="batch_id">
                                <option value="">Select Batch</option>
                            </select>
                            <span class="text-danger">
                                @error('batch_id')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Course Price</label>
                        <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                            <input id="course_price" name="course_price" type="text" required="" placeholder="Course Price" class="form-control">
                            <span class="text-danger">
                                @error('course_price')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <input type="number" name="special_discount" id="special_discount" placeholder="Special Discount Percentage" class="form-control">
                            <span class="text-danger">
                                @error('special_discount')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Course Fee</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" id="discountedPrice" class="form-control" value="{{  old('course_fee')}}" name="course_fee" placeholder="Course Fee">
                            <span class="text-danger">
                                @error('course_fee')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Pay Now</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="Number" id="payment" class="form-control" value="{{  old('payment')}}" name="payment" placeholder="Pay Now">
                            <span class="text-danger">
                                @error('payment')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>


                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Add Payment </button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('body').on("input", 'input', function(e) {
            var modalId = $(this).closest('.modal').attr('id');
            var coursePriceInput = document.getElementById(modalId).querySelector("#course_price");
            var discountInput = document.getElementById(modalId).querySelector("#special_discount");
            var discountedPriceInput = document.getElementById(modalId).querySelector("#discountedPrice");

            // Add event listener to the discount input field
            discountInput.addEventListener("input", calculateDiscountedPrice);

            // Function to calculate the discounted price
            function calculateDiscountedPrice() {
                var coursePrice = parseFloat(coursePriceInput.value);
                var discount = parseFloat(discountInput.value);

                // Check if both fields have valid numeric values
                if (!isNaN(coursePrice) && !isNaN(discount)) {
                    var discountedPrice = coursePrice - (coursePrice * discount / 100);
                    discountedPriceInput.value = discountedPrice.toFixed(2);
                } else {
                    discountedPriceInput.value = "";
                }
            }
        });

        $(document).on("change", "#course", function() {
            var modalId = $(this).closest('.modal').attr('id');
            var batch = $("#" + modalId + " #batch");
            var course = $(this).val();

            if (course == "") {
                $(batch).html("<option value=''>Select Batch</option>");
            }

            $.ajax({
                url: "/get-batch/" + course
                , type: "GET"
                , success: function(data) {
                    var batches = data.batches;
                    var html = "<option value=''>Select Batch</option>";

                    for (let i = 0; i < batches.length; i++) {
                        html += `<option value="${batches[i].id}">${batches[i].batch_name}</option>`;
                    }

                    $(batch).html(html);
                    $("#" + modalId + " #course_price").val(data.price);
                }
                , error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });

</script>
@endsection
