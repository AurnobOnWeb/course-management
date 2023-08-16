@extends('admin.layouts.template')
@section('title')
View Visitor | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"> View All Visitor Information <div class="float-right" style="color:white;">

            </div> 
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="center"  style="margin: auto;  padding: 10px;">
                <form >
                    <div class="form-group col-lg-9">
                        <div class="input-group mb-3 ">
                            
                            <input  onfocus="(this.type='date')"  required id="date" type="text" name="start_date" value="" class="form-control textbox-n" placeholder="From"  style="margin-right: 20px">
                            <input  onfocus="(this.type='date')" required  id="date" type="text" name="end_date" value="" class="form-control textbox-n" placeholder="To"  style="margin-right: 20px">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Go!</button>
                            </div>
                            <a href="{{ route('visitorView') }}" class="btn btn-info" style="margin-left: 20px ;color:white;">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
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
                        <th>Visitor  Name</th>
                        <th>Visitor  Email</th>
                        <th>Visitor  phone</th>
                        <th>Visitor Address</th>
                        <th>Intrested Course</th>
                        <th>Visitor  Notes</th>
                        <th>Visited date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                    <tr>
                        <td>{{ $report['visitor']->name }}</td>
                        <td>{{$report['visitor']->email }} </td>
                        <td>{{ $report['visitor']->phone}}</td>
                        <td>{{ $report['visitor']->address }}</td>
                        <td>{{ $report['courseName'] }}</td>
                        <td>{{ $report['visitor']->note }}</td>
                        <td>{{ $report['visitor']->date }}</td>
                     
                        <td>
                           
                                
                           
                            <div style="padding:5px;"> <a href="{{ route('visitorEdit', $report['visitor']->id )}}" class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    Edit</a>
                            </div>
                          
                               
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $report['visitor']->id }}">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                            
                            

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@foreach($reports as $report)
<div class="modal fade" id="myModal{{ $report['visitor']->id }}" >
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete This Data?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Are You Sure ? To Delete {{ $report['visitor']->name }} 
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                
                    <a href="{{ route('deletevisitor', $report['visitor']->id )}}" type="submit" class="btn btn-primary" >Delete</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
