@extends('admin.layouts.template')
@section('title')
View Student Payment Information | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"> View Student Payment Information <div class="float-right" style="color:white;">

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
            @foreach($payment->student as $students)


            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{ url('backend/assets/images/',$students->image) }}" alt="">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{$students->student_name }}
                        </h5>
                        <h6>
                            {{ $students->student_number }}
                        </h6>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Enrolled Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">About Student</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work" style="padding-top: 30px;">

                        <p>Good Student</p>
                        <a href=""> </a><br />
                    </div>
                </div>

                @endforeach
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            @foreach($payment->course as $courses)
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Course Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $courses->course_name }}</p>
                                </div>
                            </div>
                            @endforeach
                            @foreach($payment->batch as $batchs)
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Batch Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $batchs->batch_name }}</p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Batch Ending Date</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $batchs->end_date }}</p>
                                </div>
                            </div>
                            @endforeach
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Course Price</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        {{ $payment->course_price }} tk
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Special discount</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        {{ $payment->special_discount }} %
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Course_fee</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $payment->course_fee }} tk</p>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Paid</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        {{ $payment->payment }} tk
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Payment Status</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                      <span class="btn btn-rounded btn-primary">{{ $payment->payment_status }} </span>  

                                    </p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            @foreach($payment->student as $students)
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>   {{$students->student_email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Qualification</label>
                                </div>
                                <div class="col-md-6">
                                    <p>   {{$students->qualification }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date Of birth</label>
                                </div>
                                <div class="col-md-6">
                                    <p>   {{$students->dob }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Parent Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>   {{$students->parent_name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Parent Number</label>
                                </div>
                                <div class="col-md-6">
                                    <p>  {{$students->parent_number }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Addreess</label>
                                </div>
                                <div class="col-md-6">
                                    <p>  {{$students->address }} </p>
                                </div>
                            </div>
                            @endforeach
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
