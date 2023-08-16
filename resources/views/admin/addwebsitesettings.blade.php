@extends('admin.layouts.template')
@section('title')
Settings Information Add | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Add Settings Information </h5>
            <div class="card-body">
                
                <form id="validationform" action="{{ route('store-settings') }}" method="post" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
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
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Institute Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="institute_name" type="text" required value="{{  old('institute_name')}}" placeholder="Institute Name" class="form-control">
                            <span class="text-danger">
                                @error('institute_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Institute Address</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="address" type="text" required value="{{  old('address')}}" placeholder="Institute Address" class="form-control">
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Institute Email</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="institute_email" type="email" required value="{{  old('institute_email')}}" placeholder="Institute Email" class="form-control">
                            <span class="text-danger">
                                @error('institute_email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Institute Contact Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="contact_number" type="text" required value="{{  old('contact_number')}}" placeholder="Institute Contact Number" class="form-control">
                            <span class="text-danger">
                                @error('contact_number')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Make Your Own Footer</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="footer" type="text" required value="{{  old('footer')}}" placeholder=" Footer" class="form-control">
                            <span class="text-danger">
                                @error('footer')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Logo</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="logo" type="file" required  class="form-control">
                            <span class="text-danger">
                                @error('logo')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Fav Icon</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="fav" type="file" required  class="form-control">
                            <span class="text-danger">
                                @error('fav')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    
                   
                   
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Add Setting</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection