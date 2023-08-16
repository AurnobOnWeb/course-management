@extends('admin.layouts.template')
@section('title')
Course Information update | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Update Course Information </h5>
            <div class="card-body">
                
                <form id="validationform" action="{{ route('course.update', $course->id ) }}" method="post" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @if(session()->has('massage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>  {{ session()->get('massage') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif  
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Course Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="course_name" type="text" required value="{{  old('course_name' , $course->course_name)}}" placeholder=" Name" class="form-control">
                            <span class="text-danger">
                                @error('course_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Course Description</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea required="" class="form-control" name="description">{{  old('description', $course->description)}}</textarea>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Course Price</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" id="coursePrice" class="form-control" value="{{  old('course_price',$course->course_price)}}" name="course_price"  placeholder="Course Price">
                            <span class="text-danger">
                                @error('course_price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div> 
                    </div> 
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Course Discount</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" id="discount" class="form-control" value="{{  old('discount' ,$course->discount)}}" name="discount"  placeholder="Course Discount">
                            <span class="text-danger">
                                @error('discount')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                      <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Discount Price</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" id="discountedPrice" class="form-control" value="{{  old('discount_price',$course->discount_price)}}" name="discount_price"  placeholder=" Discount Price">
                            <span class="text-danger">
                                @error('discount_price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Course Status</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" id="course_status" name="course_status" >
                                <option value="">Select course Status</option>
                                <option value="Active" {{ $course->course_status =='Active' ? 'selected' : '' }}> Active</option>
                                <option value="Inactive" {{ $course->course_status =='Inactive' ? 'selected' : '' }} >Inactive</option>
                            </select>
                            <span class="text-danger">
                                @error('course_status')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Update Course</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Get input elements
var coursePriceInput = document.getElementById("coursePrice");
var discountInput = document.getElementById("discount");
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