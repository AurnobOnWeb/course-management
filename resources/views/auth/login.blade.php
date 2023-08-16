@extends('layouts.loginTemp')
@section( 'section')
<div class="card-header text-center">
    @foreach ($settings as $setting)
    <img src="{{ url('backend/assets/images/', $setting->logo) }}" alt="logo" height="150" width="160">

<span class="splash-description">Please enter your user information.</span>
<span class="splash-description">To enter</span>
<span class="splash-description">{{ $setting->institute_name }}</span>
@endforeach
</div>
<div class="card-body">

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <input class="form-control form-control-lg" name="email" id="username" type="text" placeholder="Email Address" autocomplete="off">
            @if($messages = $errors->get('email'))
            @if ($messages)
            @foreach ((array) $messages as $message)
            <span class="text-danger"> {{ $message }}</span>

            @endforeach
            @endif
            @endif
        </div>
        <div class="form-group">
            <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password" autocomplete="off">
            @if($messages = $errors->get('password'))
            @if ($messages)
            @foreach ((array) $messages as $message)
            <span class="text-danger"> {{ $message }}</span>

            @endforeach
            @endif
            @endif
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
    </form>
</div>
<div class="card-footer bg-white p-0  ">
    <div class="card-footer-item card-footer-item-bordered">
        <a href="{{ route('register') }}" class="footer-link">Create An Account</a></div>
    <div class="card-footer-item card-footer-item-bordered">
        <a href="{{ route('password.request') }}" class="footer-link">Forgot Password</a>
    </div>
</div>
@endsection
