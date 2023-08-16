@extends('admin.layouts.template')
@section('title')
View Batche's | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"> View All Finished Batche's Information <div class="float-right" style="color:white;">

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
                        <th>Batche's Name</th>
                        <th>Batche's Code</th>
                        <th>Course Name</th>
                        <th>Course Hours</th> 
                         <th>Class Days</th>
                        <th>Class Time</th>
                        <th>Teacher Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Student Count</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($batch as $batches)
                    <tr>
                        <td>{{$batches->batch_name }}</td>
                        <td>{{$batches->batch_code }}</td>
                        @foreach($batches->course as $courses)
                        <td>{{ $courses->course_name }}</td>
                        @endforeach
                        <td>{{$batches->week_day }}</td>
                        <td>{{$batches->time }}</td>
                        <td>{{$batches->hours }} Hours</td>
                        @foreach($batches->teacher as $teachers)
                        <td>{{ $teachers->name }}</td>
                        @endforeach
                     
                        <td>{{$batches->start_date }}</td>
                        <td>{{$batches->end_date }}</td>
                        <td>{{$batches->student_count}}</td>

 
                        <td>
                            @if($batches->batch_status == 'Active')
                            <span class="btn btn-success "> Active</span>
                            @else
                            <span class="btn btn-warning"> Finished</span>
                            @endif

                        </td>
                        <td>
                            @can('edit batch')
                            <div style="padding:5px;">
                                <a href="{{ route('batches.edit', $batches->id )}}" class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    Edit</a>
                            </div>
                            @endcan
                            @can('delete batch')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                            @endcan

                            <div class="modal fade" id="myModal">
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
                                            <form method="POST" action="{{ route('batches.destroy', $batches->id )}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
