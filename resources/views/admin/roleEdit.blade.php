@extends('admin.layouts.template')
@section('title')
Edit Role | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header"> Edit Role </h5>
            <div class="card-body">
                
                    
                
                <form id="validationform" action="{{ route('update', $role->id) }}" method="post" data-parsley-validate="" novalidate="" >
                
                    @csrf

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Role Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="name" type="text" required value="{{  old('name' ,$role->name)}}" placeholder=" Role Name" class="form-control">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                   
                    @foreach($permissions as $permission)
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">{{ $permission->name }}</label>
                        <div class="col-12 col-sm-8 col-lg-6 pt-1">
                            <div class="switch-button switch-button-success">
                                <input type="checkbox" class="permission-checkbox" id="switch-{{ $permission->id }}"  @if (in_array( $permission->id , $data)) checked @endif  name="permission[]" value="{{ $permission->id }}"><span>
                                    <label for="switch-{{ $permission->id }}"></label></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Update Role</button>
                        </div>
                    </div>
                </form>
              
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('.permission-checkbox').change(function() {
                            // Get all checked checkboxes
                            var checkedCheckboxes = $('.permission-checkbox:checked');

                            // Uncheck other checkboxes if more than one is checked
                            if (checkedCheckboxes.length > 1) {
                                $('.permission-checkbox').not(checkedCheckboxes).prop('checked', false);
                            }
                        });
                    });

                </script>
            </div>
        </div>
    </div>
</div>

@endsection