@extends('admin.layouts.template')
@section('title')
Due Payment Information | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"> View All Due Payment Information <div class="float-right" style="color:white;">

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
                        <th>Student Number</th>
                        <th>Course Name</th>
                        <th>Batch Name</th>
                        <th>Course Fee</th>
                        <th>Payment</th>
                        <th>Due</th>
                        <th>For more...</th>
                        <th>Invoice</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($payment as $payments)
                    <tr>
                        @foreach($payments->student as $students)
                        <td>{{ $students->student_name }}</td>
                        <td>{{ $students->student_number }}</td>
                        @endforeach
                        @foreach($payments->course as $courses)
                        <td>{{ $courses->course_name }}</td>
                         @endforeach
                        @foreach($payments->batch as $batchs)
                        <td>{{ $batchs->batch_name }}</td>
                        @endforeach
                        <td>{{ $payments->course_fee }}</td>
                        <td>{{ $payments->payment }}</td>
                        <td>{{ $due = $payments->course_fee - $payments->payment  }}</td>
                        <td> <a href="{{ route('payment.show', $payments->id )}}" class="btn btn-info">For More-Info...</a> </td>
                        <td> <a href="{{ route('invoice', $payments->id )}}" class="btn btn-primary">Invoice</a> </td>
                        <td>
                            @if($payments->payment_status == 'Due Payment')
                            <span class="btn btn-warning "> Due Payment</span>
                            @elseif($payments->payment_status == 'Full Payment')
                            <span class="btn btn-success"> Full payment</span>
                            @else
                            <span class="btn btn-danger"> Over Payment</span>
                            @endif
                        </td>
                         <td>
                            @can('edit payment')
                            <div style="padding:5px;"> <a href="{{ route('payment.edit', $payments->id )}}" class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    Edit</a>
                            </div>
                            @endcan
                            @can('delete payment')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{  $payments->id  }}">
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

@foreach($payment as $payments)
<div class="modal fade" id="myModal{{  $payments->id  }}">
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
                <form method="POST" action="{{ route('payment.destroy', $payments->id )}}">
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
