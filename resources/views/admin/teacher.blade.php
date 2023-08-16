@extends('admin.layouts.template')
@section('title')
View Teacher's Information | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"> View All Teacher's Information <div class="float-right" style="color:white;">

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
                        <th>Teacher's Name</th>
                        <th>Teacher's Expert</th>
                        <th>Teacher's Number</th>
                        <th>Teacher's Email</th>
                        <th>Teacher's Photo</th>
                        <th>View More</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($teacher as $teachers)
                    <tr>
                        <td>{{ $teachers->name }}</td>
                        <td>{{ $teachers->expert }}</td>
                        <td>{{ $teachers->phone }}</td>
                        <td>{{ $teachers->email }}</td>
                        <td><img src="{{ url('backend/assets/images/',$teachers->image) }}" alt="" height="100px" width="100px"></td>

                        <td> <a href="{{ route('teacher.show', $teachers->id )}}" class="btn btn-info">For More-Info...</a> </td>
                        <td>
                            @if($teachers->teacher_status == 'Active')
                            <span class="btn btn-success "> Active</span>
                            @else
                            <span class="btn btn-warning"> Inactive</span>
                            @endif
                        </td>
                        <td>
                            @can('edit teacher')
                            <div style="padding:5px;"> <a href="{{ route('teacher.edit', $teachers->id )}}" class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    Edit</a>
                            </div>
                             @endcan
                             @can('delete teacher')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $teachers->id  }}">
                                <i class="fa fa-trash"></i> Delete
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
@foreach($teacher as $teachers)
<div class="modal fade" id="myModal{{ $teachers->id  }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete This Data?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Are You Sure ? To Delete {{ $teachers->name }} Sir Info
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <form method="POST" action="{{ route('teacher.destroy', $teachers->id )}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-primary" >Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
