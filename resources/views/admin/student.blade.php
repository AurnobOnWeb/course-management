@extends('admin.layouts.template')
@section('title')
View Enrolled Student's | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"> View All Student Who Enrolled Course <div class="float-right" style="color:white;">

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
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Qualification</th>
                        <th>Board Exam</th>
                        <th>Parent Name</th>
                        <th>Student Number</th>
                        <th>Parent Number</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>More</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>
                    @foreach($student as $students)
                    <tr>
                        <td>{{ $students->student_name }}</td>
                        <td>{{ $students->student_email }}</td>
                        <td>{{ $students->qualification}}</td>
                        <td>{{ $students->board_exam }}</td>
                        <td>{{ $students->parent_name }}</td>
                        <td>{{ $students->student_number }}</td>
                        <td>{{ $students->parent_number }}</td>
                        <td>{{ $students->address }}</td>
                        <td> <img src="{{ url('backend/assets/images/',$students->image) }}" alt="" height="100px" width="100px"></td>

                        <td> <a href="{{ route('student.show', $students->id )}}" class="btn btn-primary">more Info..</a>
                        </td>
                        <td>
                            @if($students->status == 'Enrolled')
                            <span class="btn btn-success "> Enrolled</span>
                             @else
                            <span class="btn btn-warning"> Unenrolled</span>
                            @endif

                        </td>
                        <td>
                            @can('edit student')
                            <div style="padding:5px;"> <a href="{{ route('student.edit', $students->id )}}" class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    Edit</a>
                            </div>
                            @endcan
                            @can('delete student')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $students->id }}">
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

@foreach($student as $students)
<div class="modal fade" id="myModal{{ $students->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete This Data?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Are You Sure ? To Delete {{ $students->student_name }} 
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <form method="POST" action="{{ route('student.destroy', $students->id )}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
