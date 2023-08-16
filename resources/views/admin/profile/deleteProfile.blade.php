<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header"> Delete Account
                <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
            </h5>
            <div class="card-body">

                <form id="validationform" action="{{ route('profile.destroy') }}" method="post" data-parsley-validate="" novalidate="">
                    @csrf
                    @method('delete')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-sm-right">Delete Account</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-sm-right">Current Password</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control form-control-lg" id="current_password" name="current_password" type="password" placeholder="Current Password">
                            @if($messages = $errors->updatePassword->get('current_password'))
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
                            <button type="submit" class="btn btn-space btn-danger">Delete Account</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
