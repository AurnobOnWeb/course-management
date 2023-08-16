@extends('admin.layouts.template')
@section('title')
View Batche's | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"> View All Batche's Information <div class="float-right" style="color:white;">

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
                        <th>Student Limit</th>
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
                        <td>{{$batches->time }}</td>
                        <td>{{$batches->week_day }}</td>
                        <td>{{$batches->hours }} Hours</td>
                        @foreach($batches->teacher as $teachers)
                        <td>{{ $teachers->name }}</td>
                        @endforeach

                        <td>{{$batches->start_date }}</td>
                        <td>{{$batches->end_date }}</td>
                        <td>{{$batches->student_limit}}</td>

                        <td>{{$batches->student_count}}</td>


                        <td>
                            @if($batches->batch_status == 'Active')
                            <span class="btn btn-success "> Active</span>
                            @else
                            <span class="btn btn-warning"> Inactive</span>
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
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $batches->id }}">
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
@foreach($batch as $batches)
<div class="modal fade" id="myModal{{ $batches->id }}">
    <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete This Data?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Are You Sure ? To Delete {{ $batches->batch_name }} Batch
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
@endforeach

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Send an Ajax request to update the batch status
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Send an Ajax request to update the batch status
        function updateBatchStatus(batchId) {
            $.ajax({
                url: '/batches/' + batchId + '/update-status'
                , type: 'PUT'
                , headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                }
                , success: function(response) {
                    console.log('Batch status updated successfully');
                }
                , error: function(xhr) {
                    console.log('Error updating batch status');
                }
            });
        }

        // Get all the active batches and check if the end date has passed
        function checkBatchStatus() {
            $.ajax({
                url: '/batchess'
                , type: 'GET'
                , success: function(response) {
                    console.log(response); // Check the response in the browser console
                    var json = response.trim(); // Remove any leading/trailing whitespaces
                    var batches = JSON.parse(json);
                    var date = new Date()
                        , yr = date.getFullYear()
                        , month = date.getMonth()
                        , day = date.getDate()
                        , newDate = yr + '-' + month + '-' + day;

                    batches.forEach(function(batch) {
                        if (batch.end_date < newDate) {
                            updateBatchStatus(batch.id);
                        }
                    });
                }
                , error: function(xhr) {
                    console.log('Error fetching batches');
                }
            });
        }

        // Call the checkBatchStatus function every minute (adjust the interval as needed)
        setInterval(checkBatchStatus, 86400000);
    });

</script>
@endsection
