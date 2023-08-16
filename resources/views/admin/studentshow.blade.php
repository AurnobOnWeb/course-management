@extends('admin.layouts.template')
@section('title')
View Student Information | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"> View Student Information <div class="float-right" style="color:white;">

            </div>
        </h5>
    </div>
    <div class="card-body">
        <style>
            .emp-profile {
                padding: 3%;
                margin-top: 3%;
                margin-bottom: 3%;
                border-radius: 0.5rem;
                background: #fff;
            }

            .profile-img { 
                text-align: center;
            }

            .profile-img img {
                width: 70%;
                height: 100%;
            }

            .profile-img .file {
                position: relative;
                overflow: hidden;
                margin-top: -20%;
                width: 70%;
                border: none;
                border-radius: 0;
                font-size: 15px;
                background: #212529b8;
            }

            .profile-img .file input {
                position: absolute;
                opacity: 0;
                right: 0;
                top: 0;
            }

            .profile-head h5 {
                color: #333;
            }

            .profile-head h6 {
                color: #0062cc;
            }

           

            .proile-rating {
                font-size: 12px;
                color: #818182;
                margin-top: 5%;
            }

            .proile-rating span {
                color: #495057;
                font-size: 15px;
                font-weight: 600;
            }

            .profile-head .nav-tabs {
                margin-bottom: 5%;
            }

            .profile-head .nav-tabs .nav-link {
                font-weight: 600;
                border: none;
            }

            .profile-head .nav-tabs .nav-link.active {
                border: none;
                border-bottom: 2px solid #0062cc;
            }

            .profile-work {
                padding: 14%;
                margin-top: -15%;
            }

            .profile-work p {
                font-size: 12px;
                color: #818182;
                font-weight: 600;
                margin-top: 10%;
            }

            .profile-work a {
                text-decoration: none;
                color: #495057;
                font-weight: 600;
                font-size: 14px;
            }

            .profile-work ul {
                list-style: none;
            }

            .profile-tab label {
                font-weight: 600;
            }

            .profile-tab p {
                font-weight: 600;
                color: #0062cc;
            }

        </style>
        <div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="{{ url('backend/assets/images/',$student->image) }}" alt="">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            
                            <h5>
                                Student Name -  {{ $student->student_name }}
                            </h5>
                            <h6>
                                {{ $student->student_number }}
                            </h6>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline Info</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        
                        <a href="{{ route('student.edit', $student->id )}}" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="dark">Edit Student</a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work" style="padding-top: 30px;">

                        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{ $student->student_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{ $student->student_email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Parent Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{ $student->parent_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Parent Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{ $student->parent_number }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>DOB</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{ $student->dob }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $student->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>NID / Birth cirtificate</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <a href="{{ url('backend/assets/images',$student->nid) }}" target="_blank">Open the NID /  Birth cirtificate !</a> 

                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Board Exam Attented</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $student->board_exam }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Board Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $student->board_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>SSC Registration</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $student->reg_ssc }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>SSC Roll</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $student->roll_ssc }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Certificate</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <a href="{{ url('backend/assets/images',$student->cirtificate) }}" target="_blank">Open the cirtificate !</a> 

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function() {
            readURL(this);
        });
    });

</script>
@endsection
