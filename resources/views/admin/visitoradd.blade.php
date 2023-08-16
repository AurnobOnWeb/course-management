@extends('admin.layouts.template')
@section('title')
Visitors Information Add | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Add Visitor Information </h5>
            <div class="card-body">
                
                <form id="validationform" action="{{ route('storeVisitor') }}" method="post" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
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
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Visitor Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="name" type="text" required value="{{  old('name')}}" placeholder="Visitor Name" class="form-control">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Visitor Email</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="email" type="email" required value="{{  old('email')}}" placeholder="Visitor Email" class="form-control">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Visitor phone</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="phone" type="text" required value="{{  old('phone')}}" placeholder="Visitor phone" class="form-control">
                            <span class="text-danger">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Visitor address</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="address" type="text" required value="{{  old('address')}}" placeholder="Visitor address" class="form-control">
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Intrested Course</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" required name="intrested_course">
                                <option value="">Select Intrested course</option>
                                @foreach($course as $courses)
                                <option value="{{ $courses->id }}">{{ $courses->course_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('intrested_course')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Note</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea required="" class="form-control" name="note">{{  old('note')}}</textarea>
                            <span class="text-danger">
                                @error('note')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Add visitor</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection