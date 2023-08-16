@extends('admin.layouts.template')
@section('title')
All  student Sms  | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">All  student Sms  <div class="float-right" style="color:white;">
                   
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
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                           <input class="form-control" type="text" disabled value="All Student">
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

@endsection
