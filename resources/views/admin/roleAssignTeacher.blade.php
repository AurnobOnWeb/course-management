@extends('admin.layouts.template')
@section('title')
Assign Role | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Teacher Role Giving</h5>
              
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
                                <th>Teacher Name</th>
                                <th>Teacher Email</th>
                                <th>Teacher Number</th>
                                <th>Give Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teacher as $teachers)
                            <tr>
                                <td>{{ $teachers->name }}</td>
                                <td>{{ $teachers->email }}</td>
                                <td>{{ $teachers->phone }}</td>
                                <td>
                                    @can('add teacher role')
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $teachers->id}}">
                                        Give Role
                                    </button>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
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
@foreach($teacher as $teachers)
<div class="modal fade" id="myModal{{ $teachers->id}}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Fill all the information to Give Role</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="validationform" action="{{ route('userRole') }}" method="post" data-parsley-validate="" novalidate="">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="teacher_id" type="text" value="{{  old('id',$teachers->id)}}" class="form-control" hidden>
                            <input name="name" type="text" value="{{  old('name',$teachers->name)}}" placeholder=" Teacher Name" class="form-control">
                            <span class="text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher Email</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="email" type="text" required value="{{  old('email',$teachers->email)}}" class="form-control" >
                            <span class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher Phone Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" required name="phone" value="{{  old('phone',$teachers->phone)}}" class="form-control" >
                            <span class="text-danger">
                                @error('phone')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Teacher Password</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="password" required name="password" placeholder="Password" class="form-control">
                            <span class="text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Confirm Password</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="password" name="password_confirmation" required placeholder="Confirm Password" class="form-control">
                            <span class="text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Your Role </label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select name="role" class="form-control" id="input-select">
                                <option value="">Chose Role</option>
                                @foreach($roless as $role)
                                @if($role->name !== 'super-admin' && $role->name !== 'admin')
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('name')
                            {{ $message }}
                            @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Add Role </button>
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
@endforeach

@endsection
