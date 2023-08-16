@extends('admin.layouts.template')
@section('title')
Payement Edit | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Payment Information Edit </h5>
            <div class="card-body">
                
                <form id="validationform" action="{{ route('payment.update',$payment->id ) }}" method="post" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    @foreach($payment->student as $students)
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="student_name" type="text" required value="{{  old('student_name',$students->id)}}" placeholder="Student Name" class="form-control" hidden>
                            <input type="text" required value="{{  old('student_name',$students->student_name)}}" placeholder="Student Name" class="form-control" disabled>
                            <span class="text-danger">
                                @error('student_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    
                    @endforeach
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Course & Batch</label>
                        <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                            <select class="form-control" id="course" name="course_id" >
                                <option value="">Select course </option>
                                @foreach($courses as $course)
                                <option value="{{ $course->id }}" @if (in_array( $course->id , $data)) selected @endif>{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('course_id')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            
                            <select id="batch" class="form-control" name="batch_id" >
                                @foreach($batches as $batch)
                                <option value="{{ $batch->id }}" @if (in_array( $batch->id , $data2)) selected @endif>{{ $batch->batch_name }}</option>
                                @endforeach
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
                            <input id="course_price" name="course_price" value="{{  old('course_price',$payment->course_price)}}"  type="text" required="" placeholder="Course Price" class="form-control" >
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <input type="number" name="special_discount" id="special_discount" value="{{  old('special_discount',$payment->special_discount)}}" placeholder="Special Discount Percentage" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Course Fee</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" id="discountedPrice" class="form-control"  value="{{  old('course_fee',$payment->course_fee)}}" name="course_fee" placeholder="Course Fee" >
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
                            <input type="Number" id="payment" class="form-control" value="{{  old('payment',$payment->payment)}}" name="payment" placeholder="Pay Now" >
                            <span class="text-danger">
                                @error('payment')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Update Student</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $("#course").change(function() {
            var course = $(this).val();

            if (course == "") {
                $("#batch").html("<option value=''>Select Batch</option>");
            }

            $.ajax({
                url: "/get-batch/" + course
                , type: "GET"
                , success: function(data) {
                    var batches = data.batches;
                    var html = "<option value=''>Select Batch</option>";

                    for (let i = 0; i < batches.length; i++) {
                        html += `
                    <option value="` + batches[i]['id'] + `">` + batches[i]['batch_name'] + `</option>
                `;
                    }

                    $("#batch").html(html);
                    $("#course_price").val(data.price);
                }
            });
        });

    });


    // Get input elements
    var coursePriceInput = document.getElementById("course_price");
    var discountInput = document.getElementById("special_discount");
    var discountedPriceInput = document.getElementById("discountedPrice");

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

</script>
@endsection