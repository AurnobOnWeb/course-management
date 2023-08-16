@extends('admin.layouts.template')
@section('title')
Role | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"> View All Role <div class="float-right" style="color:white;">
                @can('add role')
                <a href="{{ route('create-role') }}" class="btn btn-primary ">Add Role</a>
                @endcan
            </div>
        </h5>

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
                        <th>Role Name</th>
                        <th>Permissions</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($role as $items)
                    @if($items->name !== 'super-admin' && $items->name !== 'admin')
                    <tr>
                        <td>{{ $items->name }}</td>

                        <td> @foreach($items->permissions as $per)
                            <span class="btn btn-success"> {{ $per->name }}</span>
                            @endforeach
                        </td>
                        <td>
                          @can('edit role')
                            <a href="{{ route('role-edit', $items->id  ) }}" class="btn btn-primary"> Edit</a>
                            @endcan
                            @can('delete role')
                            <a href="{{ route('delete', $items->id  ) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
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

@endsection
