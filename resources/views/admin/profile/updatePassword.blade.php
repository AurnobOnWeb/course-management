<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header"> Update Password
                <p>Ensure your account is using a long, random password to stay secure.</p>
            </h5>
            <div class="card-body">
                @if($status= session('status'))
                @if ($status)
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>{{ $status }}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                @endif
                <form id="validationform" action="{{ route('password.update') }}" method="post" data-parsley-validate="" novalidate="">
                    @csrf
                    @method('put')


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-sm-right">Current Password</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control form-control-lg" id="current_password" name="current_password" type="password" placeholder="Current Password">
                            @if($messages = $errors->userDeletion->get('current_password'))
                            @if ($messages)
                            @foreach ((array) $messages as $message)
                            <span class="text-danger"> {{ $message }}</span>

                            @endforeach
                            @endif
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-sm-right">New Password</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder=" New Password">
                            @if($messages = $errors->updatePassword->get('password'))
                            @if ($messages)
                            @foreach ((array) $messages as $message)
                            <span class="text-danger"> {{ $message }}</span>

                            @endforeach
                            @endif
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-sm-right"> Confirm Password</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password">
                            @if($messages = $errors->updatePassword->get('password_confirmation'))
                            @if ($messages)
                            @foreach ((array) $messages as $message)
                            <span class="text-danger"> {{ $message }}</span>

                            @endforeach
                            @endif
                            @endif
                        </div>
                    </div>



                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Update Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
