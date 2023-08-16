<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header"> Update your account's profile information </h5>
            <div class="card-body">
                
                <form id="validationform" action="{{ route('profile.update', $user->id)}}" method="post" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    @if(session()->has('massage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>  {{ session()->get('massage') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif 
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="name" type="text" required value="{{  old('name', $user->name)}}" placeholder=" Name" class="form-control">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Your Role </label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select name="role" class="form-control" id="input-select" disabled>
                                <option value="">Chose Role</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->name }}"  @if (in_array( $role->id , $data)) selected @endif>{{ $role->name }}</option>
                                @endforeach
                                  </select>
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    
                    

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Email</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="email" required value="{{  old('email', $user->email)}}" name="email" class="form-control" disabled>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Phone Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" id="phone" class="form-control" value="{{  old('phone', $user->phone)}}" name="phone"  placeholder="+880 1XXX XXXXXX">
                            <span class="text-danger">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea required="" class="form-control" name="addreess">{{  old('addreess', $user->addreess)}}</textarea>
                            <span class="text-danger">
                                @error('addreess')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    @if($user->image == !null)
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Current Profile Picture</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                     <img src="{{ asset('backend/assets') }}/images/{{ $user->image }}" alt="Profile Image" title="Profile Image" height="160px" width="180px">
                        </div>
                      </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Profile Picture</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="file" id="formFileMultiple" name="image">
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
