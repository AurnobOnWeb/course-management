@extends('admin.layouts.template')
@section('title')
Student Information Update | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Updating Student Information </h5>
            <div class="card-body">
                
                <form id="validationform" action="{{ route('student.update',$student->id ) }}" method="post" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="student_name" type="text" required value="{{  old('student_name',$student->student_name)}}" placeholder="Student Name" class="form-control">
                            <span class="text-danger">
                                @error('student_name')
                                 {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student Email</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="student_email" type="text" required value="{{  old('student_email',$student->student_email)}}" placeholder="Student Email" class="form-control">
                            <span class="text-danger">
                                @error('student_email')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Qualification</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" id="qualification" class="form-control" value="{{  old('qualification', $student->qualification )}}" name="qualification" placeholder="Qualification ">
                            <span class="text-danger">
                                @error('qualification')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Date of Birth</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="dob" type="date" required value="{{  old('dob',$student->dob)}}" placeholder="Date of Birth" class="form-control">
                            <span class="text-danger">
                                @error('dob')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Parent Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="parent_name" type="text" required value="{{  old('parent_name',$student->parent_name)}}" placeholder="Parent Name" class="form-control">
                            <span class="text-danger">
                                @error('parent_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="student_number" type="text" required value="{{  old('student_number',$student->student_number)}}" placeholder="Student Number" class="form-control">
                            <span class="text-danger">
                                @error('student_number')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Parent Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="parent_number" type="text" required value="{{  old('parent_number',$student->parent_number)}}" placeholder="Parent Number" class="form-control">
                            <span class="text-danger">
                                @error('parent_number')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea required="" class="form-control" name="address">{{ old('address',$student->address)}}</textarea>
                            <span class="text-danger">
                                @error('address')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    
                    @if($student->image == !null)
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Current Student Image</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                     <img src="{{ url('backend/assets/images/',$student->image) }}" alt="Profile Image" title="Profile Image" height="100px" width="100px">
                        </div>
                      </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Image</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="file" id="image" class="form-control"  name="image"  >
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    @if($student->nid == !null)
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Current  NID /  Birth cirtificate </label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <a href="{{ url('backend/assets/images',$student->nid) }}" target="_blank">Open the NID /  Birth cirtificate !</a> 
                        </div>
                      </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">NID / Birth cirtificate (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="file" id="nid" class="form-control" value="{{  old('nid')}}" name="nid">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Board Exam Attended (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select id="choices-multiple-remove-button" class="form-control" name="board_exam[]" placeholder="Select upto 3 tags" multiple>
                                <option value="JSC" {{ in_array('JSC', $array) ? 'selected' : '' }}>JSC</option>
                                <option value="SSC" {{ in_array('SSC', $array) ? 'selected' : '' }}>SSC</option>
                                <option value="HSC" {{ in_array('HSC', $array) ? 'selected' : '' }}>HSC</option>
                            </select>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {

                            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                                removeItemButton: true
                                , maxItemCount: 7
                                , searchResultLimit: 7
                                , renderChoiceLimit: 7
                            });

                        });

                    </script>
                     <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Attended Board Name (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" id="board_name" name="board_name">
                                <option value="">Select Board</option>
                                <option value="Dhaka" {{ $student->board_name =='Dhaka' ? 'selected' : '' }} >Dhaka</option>
                                <option value="Rajshahi" {{ $student->board_name =='Rajshahi' ? 'selected' : '' }} >Rajshahi</option>
                                <option value="Chittagong" {{ $student->board_name =='Chittagong' ? 'selected' : '' }} >Chittagong</option>
                                <option value="Jessore" {{ $student->board_name =='Jessore' ? 'selected' : '' }} >Jessore</option>
                                <option value="Comilla" {{ $student->board_name =='Comilla' ? 'selected' : '' }} >Comilla</option>
                                <option value="Barisal" {{ $student->board_name =='Barisal' ? 'selected' : '' }}  >Barisal</option>
                                <option value="Sylhet" {{ $student->board_name =='Sylhet' ? 'selected' : '' }} >Sylhet</option>
                                <option value="Dinajpur" {{ $student->board_name =='Dinajpur' ? 'selected' : '' }} >Dinajpur</option>
                                <option value="Madrasah"{{ $student->board_name =='Madrasah' ? 'selected' : '' }}  >Madrasah</option>
                                <option value="Technical" {{ $student->board_name =='Technical' ? 'selected' : '' }}  >Technical</option>
                            </select>
                        </div>
                    </div>
                    @if($student->cirtificate == !null)
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Current  Cirtificate Of any Exam </label>
                        <div class="col-12 col-sm-8 col-lg-6">
                             <a href="{{ url('backend/assets/images',$student->cirtificate) }}" target="_blank">Open the Cirtificate Of any Exam !</a> 
                        </div>
                      </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Cirtificate Of any Exam (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="file" id="cirtificate" class="form-control" value="{{  old('cirtificate')}}" name="cirtificate">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">SSC Registration (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="reg_ssc" type="text" required value="{{  old('reg_ssc',$student->reg_ssc)}}" placeholder="SSC Registration (optional)" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">SSC Roll (optional)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="roll_ssc" type="text" required value="{{  old('roll_ssc',$student->roll_ssc)}}" placeholder="SSC Roll (optional)" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Update Student</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection