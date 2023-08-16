@extends('admin.layouts.template')
@section('title')
Batch All student Sms  | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Batch All student Sms <div class="float-right" style="color:white;">
                   
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                       Send Sms
                    </button>
                  
                </div></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
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
                                <th>Student Name</th>
                                <th>Student Phone</th>
                                <th>Massage</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                               
                                <td>Hi</td>
                                <td>Hlw</td>
                                <td> sasd </td>
                                <td>dsg </td>
                                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Delete Massage
                                </button></td>
                            </tr>
                        
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
            <form id="validationform" action="{{ route('enrollments.store') }}" method="post" data-parsley-validate="" novalidate="">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
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
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Massage</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea name="Massage"  type="text" placeholder="Type your massage" class="form-control" cols="30" rows="10"></textarea>
                            <span class="text-danger">
                                @error('student_number')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                   
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Send Sms </button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
</script>

@endsection
