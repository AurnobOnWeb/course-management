@extends('admin.layouts.template')
@section('title')
Student's Information Add | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
    <div class="section-block">
        <h5 class="section-title">Student's Information And Payment</h5>
        <p>Student Information & Payment Information You can store at Once . But Payment Is optional if you want you can Add payment Later! Thank You</p>
    </div>
    <div class="tab-regular">

        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Home</a>
            </li>
            @can('autoenroll')
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false">Manual Enroll</a>
            </li>
            @endcan 
        </ul>
        <form id="validationform" action="{{ route('student.store') }}" method="post" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
            @csrf
            <div class="tab-content" id="myTabContent">
                {{-- First Tabs start --}}
                <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                    @if(session()->has('massage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session()->get('massage') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="student_name" type="text" required value="{{  old('student_name')}}" placeholder="Student Name" class="form-control">
                            <span class="text-danger">
                                @error('student_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student Email</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="student_email" type="text" required value="{{  old('student_email')}}" placeholder="Student Email" class="form-control">
                            <span class="text-danger">
                                @error('student_email')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Qualification</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" id="qualification" class="form-control" value="{{  old('qualification')}}" name="qualification" placeholder="Qualification ">
                            <span class="text-danger">
                                @error('qualification')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Date of Birth</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="dob" type="date" required value="{{  old('dob')}}" placeholder="Date of Birth" class="form-control">
                            <span class="text-danger">
                                @error('dob')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Parent Name</label>
                         <div class="col-12 col-sm-8 col-lg-6">
                            <input name="parent_name" type="text" required value="{{  old('parent_name')}}" placeholder="Parent Name" class="form-control">
                            <span class="text-danger">
                                @error('parent_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="student_number" type="text" required value="{{  old('student_number')}}" placeholder="Student Number" class="form-control">
                            <span class="text-danger">
                                @error('student_number')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Parent Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="parent_number" type="text" required value="{{  old('parent_number')}}" placeholder="Parent Number" class="form-control">
                            <span class="text-danger">
                                @error('parent_number')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea required="" class="form-control" name="address">{{ old('address')}}</textarea>
                            <span class="text-danger">
                                @error('address')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student Image</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="file" id="image" class="form-control" value="{{  old('image')}}" name="image">
                            <span class="text-danger">
                                @error('image')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">NID / Birth cirtificate (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="file" id="nid" class="form-control" value="{{  old('nid')}}" name="nid">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Board Exam Attended (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select id="choices-multiple-remove-button" class="form-control" name="board_exam[]" placeholder="Select upto 3 tags" multiple>
                                <option value="JSC">JSC</option>
                                <option value="SSC">SSC</option>
                                <option value="HSC">HSC</option>
                            </select>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {

                            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                                removeItemButton: true
                                , maxItemCount: 7
                                , searchResultLimit: 7
                                , renderChoiceLimit: 7
                            });

                        });

                    </script>
                     <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Attended Board Name (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" id="board_name" name="board_name">
                                <option value="">Select Board</option>
                                <option value="Dhaka"> Dhaka</option>
                                <option value="Rajshahi"> Rajshahi</option>
                                <option value="Chittagong"> Chittagong</option>
                                <option value="Jessore"> Jessore</option>
                                <option value="Comilla"> Comilla</option>
                                <option value="Barisal"> Barisal</option>
                                <option value="Sylhet"> Sylhet</option>
                                <option value="Dinajpur"> Dinajpur</option>
                                <option value="Madrasah"> Madrasah</option>
                                <option value="Technical"> Technical</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Cirtificate Of any Exam (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="file" id="cirtificate" class="form-control" value="{{  old('cirtificate')}}" name="cirtificate">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">SSC Registration (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="reg_ssc" type="text" required value="{{  old('reg_ssc')}}" placeholder="SSC Registration (optional)" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">SSC Roll (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="roll_ssc" type="text" required value="{{  old('roll_ssc')}}" placeholder="SSC Roll (optional)" class="form-control">
                        </div>
                    </div>
                   
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0" style="color:white;">
                            <a id="nextButton" class="btn btn-space btn-success">Next </a>
                        </div>
                    </div>

                </div>
                {{-- First Tabs End --}}
                @can('autoenroll')
                <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                    
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Manual Enroll </label>
                        <div class="col-12 col-sm-8 col-lg-6 pt-1">
                            <div class="switch-button switch-button-success">
                                <input type="checkbox" id="myCheckbox" name="myCheckbox" value="1" {{ old('myCheckbox') ? 'checked' : '' }}>
                                <span><label for="myCheckbox"></label></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Course & Batch</label>
                        <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                            <select class="form-control" id="course" name="course_id" @if(old('myCheckbox')) disabled @endif>
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
                            <select id="batch" class="form-control" name="batch_id" @if(old('myCheckbox')) disabled @endif>
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
                            <input id="course_price" name="course_price" type="text" required="" placeholder="Course Price" class="form-control" @if(old('myCheckbox')) disabled @endif>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <input type="number" name="special_discount" id="special_discount" placeholder="Special Discount Percentage" class="form-control" @if(old('myCheckbox')) disabled @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Course Fee</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" id="discountedPrice" class="form-control" value="{{  old('course_fee')}}" name="course_fee" placeholder="Course Fee" @if(old('myCheckbox')) disabled @endif>
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
                            <input type="Number" id="payment" class="form-control" value="{{  old('payment')}}" name="payment" placeholder="Pay Now" @if(old('myCheckbox')) disabled @endif>
                            <span class="text-danger">
                                @error('payment')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>


                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Add Student </button>
                        </div>
                    </div>
                </div>   
                @endcan
              
            </div>



            <script>
                document.getElementById("nextButton").addEventListener("click", function() {
                    document.getElementById("profile-tab-justify").click(); // Switch to the Payment tab
                });
                document.addEventListener('DOMContentLoaded', function() {
                    const checkbox = document.getElementById('myCheckbox');
                    const inputs = document.querySelectorAll('#course, #batch, #course_price,#discountedPrice,#payment,#special_discount');

                    checkbox.addEventListener('change', function() {
                        if (this.checked) {
                            inputs.forEach(function(input) {
                                input.disabled = true;
                                input.value = '';
                            });
                        } else {
                            inputs.forEach(function(input) {
                                input.disabled = false;
                            });
                        }
                    });
                });

            </script>
    </div>
    </form>
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
