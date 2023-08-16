@extends('admin.layouts.template')
@section('title')
Teacher Information Add | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Add Teacher Information </h5>
            <div class="card-body">
                
                <form id="validationform" action="{{ route('teacher.store') }}" method="post" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                    @csrf
                
                     @if(session()->has('massage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>  {{ session()->get('massage') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif 
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="name" type="text" required value="{{  old('name')}}" placeholder=" Name" class="form-control">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Qualifications</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="qualifications" type="text" required value="{{  old('qualifications')}}" placeholder="Qualifications" class="form-control">
                            <span class="text-danger">
                                @error('qualifications')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Department</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="department" type="text" required value="{{  old('department')}}" placeholder="Department" class="form-control">
                            <span class="text-danger">
                                @error('department')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Expert</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="expert" type="text" required value="{{  old('expert')}}" placeholder="Expert" class="form-control">
                            <span class="text-danger">
                                @error('expert')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Phone Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" id="phone" class="form-control" value="{{  old('phone')}}" name="phone"  placeholder="Phone Number">
                            <span class="text-danger">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="email" type="email" required value="{{  old('email')}}" placeholder="Email" class="form-control">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea required="" class="form-control" name="address">{{  old('address')}}</textarea>
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                 
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> DOB</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="date" id="dob" class="form-control" value="{{  old('dob')}}" name="dob"  placeholder="Date Of Birth">
                            <span class="text-danger">
                                @error('dob')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                      <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Joining Date</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="date" id="joining" class="form-control" value="{{  old('joining')}}" name="joining">
                            <span class="text-danger">
                                @error('joining')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Salary</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" id="salary" class="form-control" value="{{  old('salary')}}" name="salary"  placeholder=" Salary">
                            <span class="text-danger">
                                @error('salary')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Image</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="file" id="image" class="form-control" value="{{  old('image')}}" name="image"  >
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">CV</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="file" id="cv" class="form-control" value="{{  old('cv')}}" name="cv"  >
                            
                            <span class="text-danger">
                                @error('cv')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher Status</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" id="teacher_status" name="teacher_status" >
                                <option value="">Select Teacher Status</option>
                                <option value="Active"> Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <span class="text-danger">
                                @error('teacher_status')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Add Teacher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection