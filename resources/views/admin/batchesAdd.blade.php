@extends('admin.layouts.template')
@section('title')
Batche's Information Add | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Add Batche's Information </h5>
            <div class="card-body">

                <form id="validationform" action="{{ route('batches.store') }}" method="post" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @if(session()->has('massage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session()->get('massage') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Batch Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="batch_name" type="text" required value="{{  old('batch_name')}}" placeholder="Batch Name" class="form-control">
                            <span class="text-danger">
                                @error('batch_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Batch Code</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" id="code" class="form-control" value="{{  old('batch_code')}}" name="batch_code" placeholder="Batch Code">
                            <span class="text-danger">
                                @error('batch_code')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Course duration</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" id="hours" class="form-control" value="{{  old('hours')}}" name="hours" placeholder="Course duration">
                            <span class="text-danger">
                                @error('hours')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Course Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" id="course_id" name="course_id">
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
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher </label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" id="teacher_id" name="teacher_id">
                                <option value="">Select Teacher</option>
                                @foreach($teacher->where('teacher_status', 'Active') as $teachers)
                                <option value="{{ $teachers->id }}"> {{ $teachers->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('teacher_id')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Batch Start Date</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="date" id="start_date" class="form-control" value="{{  old('start_date')}}" name="start_date">
                            <span class="text-danger">
                                @error('start_date')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Batch End Date</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="date" id="end_date" class="form-control" value="{{  old('end_date')}}" name="end_date">
                            <span class="text-danger">
                                @error('end_date')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Weekly Class days</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select id="choices-multiple-remove-button" class="form-control" name="week_day[]" placeholder="Select upto 7 tags" multiple>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                            <span class="text-danger">
                                @error('week_day')
                                {{ $message }}
                                @enderror
                            </span>
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
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Batch Time</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="time" id="time" class="form-control" value="{{  old('time')}}" name="time" placeholder="Batch time">
                            <span class="text-danger">
                                @error('time')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Student Limit</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" id="student_limit" class="form-control" value="{{  old('student_limit')}}" name="student_limit" placeholder=" Student Limit">
                            <span class="text-danger">
                                @error('student_limit')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Batch Status</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" id="batch_status" name="batch_status">
                                <option value="">Select Batch Status</option>
                                <option value="Active"> Active</option>
                                <option value="Finished">Finished</option>
                            </select>
                            <span class="text-danger">
                                @error('batch_status')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Add Batch</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
