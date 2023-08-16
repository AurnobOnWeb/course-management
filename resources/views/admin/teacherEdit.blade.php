@extends('admin.layouts.template')
@section('title')
Teacher Information Update | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Updating Teacher Information </h5>
            <div class="card-body">
                
                <form id="validationform" action="{{ route('teacher.update',$teacher->id ) }}" method="post" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="name" type="text" required value="{{  old('name', $teacher->name)}}" placeholder=" Name" class="form-control">
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
                            <input name="qualifications" type="text" required value="{{  old('qualifications' ,$teacher->Qualifications)}}" placeholder="Qualifications" class="form-control">
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
                            <input name="department" type="text" required value="{{  old('department',$teacher->department)}}" placeholder="Department" class="form-control">
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
                            <input name="expert" type="text" required value="{{  old('expert',$teacher->expert)}}" placeholder="Expert" class="form-control">
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
                            <input type="number" id="phone" class="form-control" value="{{  old('phone',$teacher->phone)}}" name="phone"  placeholder="Phone Number">
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
                            <input name="email" type="email" required value="{{  old('email',$teacher->email)}}" placeholder="Email" class="form-control">
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
                            <textarea required="" class="form-control" name="address">{{  old('address',$teacher->address)}}</textarea>
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
                            <input type="date" id="dob" class="form-control" value="{{  old('dob', $teacher->dob)}}" name="dob"  placeholder="Date Of Birth">
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
                            <input type="date" id="joining" class="form-control" value="{{$teacher->joining }}" name="joining">
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
                            <input type="number" id="salary" class="form-control" value="{{  old('salary',$teacher->salary)}}" name="salary"  placeholder=" Salary">
                            <span class="text-danger">
                                @error('salary')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    @if($teacher->image == !null)
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Current Teacher Image</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                     <img src="{{ url('backend/assets/images/',$teacher->image) }}" alt="Profile Image" title="Profile Image" height="100px" width="100px">
                        </div>
                      </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Image</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="file" id="image" class="form-control"  name="image"  >
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    
                    @if($teacher->cv == !null)
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Current Cv</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <a href="{{ url('backend/assets/cv/',$teacher->cv) }}" target="_blank">Open the pdf!</a>
                        </div>
                      </div>
                    @endif

                    
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
                                <option value="Active" {{ $teacher->teacher_status =='Active' ? 'selected' : '' }}> Active</option>
                                <option value="Inactive" {{ $teacher->teacher_status =='Inactive' ? 'selected' : '' }} >Inactive</option>
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
                            <button type="submit" class="btn btn-space btn-primary">Update Teacher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection