
@extends('layouts.loginTemp')
@section( 'section')
<div class="card-header text-center"><a href="{{ url('/') }}"><img class="logo-img" src="{{ url("backend/assets/images/logo.png")}}" alt="logo" height="150" width="160"></a>
    <span class="splash-description">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</span></div>
<div class="card-body">
@if($status= session('status'))
    @if ($status)
    <span class="text-danger"> {{ $status }}</span>
    @endif
@endif
    <form action="{{ route('verification.send') }}" method="post">
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

        <button type="submit" class="btn btn-primary btn-lg btn-block">Resend Verification Email</button>
    </form>
    <br>
    <form id="myForm" action="{{ route('logout') }}" method="post">
        @csrf
    <button   type="submit" class="btn btn-primary btn-lg btn-block">Logout</button>

</form>
<script>
    function myFunction() {
      document.getElementById("myForm").submit();
    }
    </script>
</div>
@endsection
