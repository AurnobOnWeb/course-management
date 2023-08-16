@extends('admin.layouts.template')
@section('title')
View Assign Role | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">View Assign Role </h5>
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
                                <th>Role</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $userss)
                            @if($userss->teacher_id != Null)
                            <tr>
                                
                                <td>{{ $userss->name }}</td>
                                <td>{{ $userss->email }}</td>
                                <td>{{ $userss->phone }}</td>
                                <td>
                                  @foreach($userss->roles as $role)
                                  <button  class="btn btn-primary">{{ $role->name }}</button>
                                  @endforeach
                                    
                                </td>
                                <td>
                                    @can('delete teacher role')
                                        
                                    
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $userss->id }}">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                    @endcan
                                </td>
                            </tr>
                            @endif
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
@foreach($users as $userss)
@if($userss->teacher_id != Null)
<div class="modal fade" id="myModal{{ $userss->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete This Data?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Are You Sure ?
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <a href="{{ route('deleteTeaceherRole',$userss->id ) }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endsection
