@extends('admin.layouts.template')
@section('title')
Batche's Information Update | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Update Batche's Information </h5>
            <div class="card-body">
                
                <form id="validationform" action="{{ route('batches.update',$batch->id) }}" method="post" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Batch Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="batch_name" type="text" required value="{{  old('batch_name',$batch->batch_name)}}" placeholder="Batch Name" class="form-control">
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
                            <input type="text" id="code" class="form-control" value="{{  old('batch_code',$batch->batch_code)}}" name="batch_code"  placeholder="Batch Code">
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
                            <input type="number" id="hours" class="form-control" value="{{  old('hours',$batch->hours)}}" name="hours" placeholder="Course duration">
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
                            <select class="form-control" id="course_id" name="course_id" >
                                <option value="">Select course </option>
                                @foreach($courses->where('course_status', 'Active') as $coursess)
                                <option value="{{ $coursess->id }}"  @if (in_array( $coursess->id , $data)) selected @endif>{{ $coursess->course_name }}</option>
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
                            <select class="form-control" id="teacher_id" name="teacher_id" >
                                <option value="">Select Teacher</option>
                                @foreach($teachers->where('teacher_status', 'Active') as $teacherss)
                                <option value="{{ $teacherss->id }}"  @if (in_array( $teacherss->id , $data2)) selected @endif> {{ $teacherss->name }}</option>
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
                            <input type="date" id="start_date" class="form-control" value="{{  old('start_date',$batch->start_date)}}" name="start_date" >
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
                            <input type="date" id="end_date" class="form-control" value="{{  old('end_date',$batch->end_date)}}" name="end_date" >
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
                            <option value="Monday" {{ in_array('Monday', $array) ? 'selected' : '' }}>Monday</option>
                            <option value="Tuesday" {{ in_array('Tuesday', $array) ? 'selected' : '' }}>Tuesday</option>
                            <option value="Wednesday" {{ in_array('Wednesday', $array) ? 'selected' : '' }}>Wednesday</option>
                            <option value="Thursday" {{ in_array('Thursday', $array) ? 'selected' : '' }}>Thursday</option>
                            <option value="Friday" {{ in_array('Friday', $array) ? 'selected' : '' }}>Friday</option>
                            <option value="Saturday" {{ in_array('saturday', $array) ? 'selected' : '' }}>Saturday</option>
                            <option value="Sunday" {{ in_array('Sunday', $array) ? 'selected' : '' }}>Sunday</option>
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
                        <input type="time" id="time" class="form-control" value="{{  old('time',$batch->time)}}" name="time" placeholder="Batch time">
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
                        <input type="number" id="student_limit" class="form-control" value="{{  old('student_limit' ,$batch->student_limit)}}" name="student_limit" placeholder=" Student Limit">
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
                            <select class="form-control" id="batch_status" name="batch_status" >
                                <option value="">Select Batch Status</option>
                                <option value="Active" {{ $batch->batch_status =='Active' ? 'selected' : '' }}> Active</option>
                                <option value="Finished"{{ $batch->batch_status =='Inactive' ? 'selected' : '' }}>Finished</option>
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
                            <button type="submit" class="btn btn-space btn-primary">Update Batch</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection