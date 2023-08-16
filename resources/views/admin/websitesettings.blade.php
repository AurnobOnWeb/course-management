@extends('admin.layouts.template')
@section('title')
View website Settings | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"> View Settings <div class="float-right" style="color:white;">
            @can('website setting add')
                <a href="{{ route('create-setting') }}" class="btn btn-primary ">Add settings</a>
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
                        <th>Institute Name</th>
                        <th>Institute Address</th>
                        <th>Institute Email</th>
                        <th>Institute Contact Number</th>
                        <th>Logo</th>
                        <th>Fav Icon</th>
                        <th>Footer</th>
                        <th>Staus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($settingsss as $setting)
                    
                   
                    <tr>
                        <td>{{ $setting->institute_name }}</td>
                        <td>{{ $setting->address }}</td>
                        <td>{{ $setting->institute_email}}</td>
                        <td>{{ $setting->contact_number }}</td>
                        <td> <img src="{{ url('backend/assets/images/',$setting->logo) }}" alt="" height="100px" width="100px"></td>
                        <td> <img src="{{ url('backend/assets/images/',$setting->fav) }}" alt="" height="100px" width="100px"></td>
                        <td>{{ $setting->footer }}</td>
                        <td><span  class="btn btn-primary"> {{ $setting->setting_status }} </span> </td>
                        <td>
                        @can('website setting delete')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $setting->id  }}">
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
@foreach($settingsss as $setting)
<div class="modal fade" id="myModal{{ $setting->id  }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete This Data?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Are You Sure ? To Delete 
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               
                 
                    <a href="{{ route('deleteSettings', $setting->id )}}" type="submit" class="btn btn-primary" >Delete</a>
                
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
