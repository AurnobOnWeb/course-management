@extends('admin.layouts.template')
@section('title')
View Course's | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"> View All Course Information <div class="float-right" style="color:white;">

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
                        <th>Course Name</th>
                        <th>Course Description</th>
                        <th>Course Price</th>
                        <th>Course Discount</th>
                        <th>Discount Price</th>
                        <th>Batch Count</th>
                        <th>Student Count</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course as $courses)
                    <tr>
                        <td>{{ $courses->course_name }}</td>
                        <td>{{ Str::limit($courses->description, 50) }} </td>
                        <td>{{ $courses->course_price }}</td>
                        <td>{{ $courses->discount }}</td>
                        <td>{{ $courses->discount_price }}</td>
                        <td>{{ $courses->batch_count }}</td>
                        <td>{{ $courses->student_count }}</td>
                        <td>
                            @if($courses->course_status == 'Active')
                            <span class="btn btn-success "> Active</span>
                            @else
                            <span class="btn btn-warning"> Inactive</span>
                            @endif

                         </td>
                        <td>
                            @can('edit course')
                                
                           
                            <div style="padding:5px;"> <a href="{{ route('course.edit', $courses->id )}}" class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    Edit</a>
                            </div>
                            @endcan
                            @can('delete course')
                               
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $courses->id }}">
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
@foreach($course as $courses)
    

<div class="modal fade" id="myModal{{ $courses->id }}" >
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete This Data?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Are You Sure ? To Delete {{ $courses->course_name }} Course
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <form method="POST" action="{{ route('course.destroy', $courses->id )}}">
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
