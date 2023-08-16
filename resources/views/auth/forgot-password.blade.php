
@extends('layouts.loginTemp')
@section( 'section')
<div class="card-header text-center"><a href="{{ url('/') }}"><img class="logo-img" src="{{ url("backend/assets/images/logo.png")}}" alt="logo" height="150" width="160"></a>
    <span class="splash-description">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</span></div>
<div class="card-body">
@if($status= session('status'))
    @if ($status)
    <span class="text-danger"> {{ $status }}</span>
    @endif
@endif
    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="form-group">
            <input class="form-control form-control-lg" name="email" id="username" type="text" placeholder="Email Address" autocomplete="off">
            @if($messages = $errors->get('email'))
                   @if ($messages)
                 @foreach ((array) $messages as $message)
                 <span class="text-danger">  {{ $message }}</span>
              
                     @endforeach
                     @endif
            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Email Password Reset Link </button>
    </form>
</div>
@endsection
