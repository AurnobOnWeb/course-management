

@extends('layouts.loginTemp')
@section( 'section')
<div class="card-header text-center"><a href="{{ url('/register') }}"><img class="logo-img" src="{{ url("backend/assets/images/logo.png")}}" alt="logo" height="150" width="160"></a><span class="splash-description">Please enter your user information.</span></div>
<div class="card-body">
   
    <form action="{{ route('password.store') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="form-group">
            <input class="form-control form-control-lg" value="old('email', $request->email)" name="name" id="Name" type="text" placeholder="Name" autocomplete="off" required>
            @if($messages = $errors->get('name'))
            @if ($messages)
          @foreach ((array) $messages as $message)
          <span class="text-danger">  {{ $message }}</span>
       
              @endforeach
              @endif
     @endif
        </div>
        <div class="form-group">
            <input class="form-control form-control-lg" name="email" id="email" value="{{ old('email') }}" type="text" placeholder="Enter Email address" autocomplete="off">
            @if($messages = $errors->get('email'))
            @if ($messages)
          @foreach ((array) $messages as $message)
          <span class="text-danger">  {{ $message }}</span>
       
              @endforeach
              @endif
     @endif
        </div>
        
        <div class="form-group">
            <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
            @if($messages = $errors->get('password'))
            @if ($messages)
          @foreach ((array) $messages as $message)
          <span class="text-danger">  {{ $message }}</span>
       
              @endforeach
              @endif
     @endif
        </div>
        <div class="form-group">
            <input class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" type="password" placeholder="password confirmation">
            @if($messages = $errors->get('password_confirmation'))
            @if ($messages)
          @foreach ((array) $messages as $message)
          <span class="text-danger">  {{ $message }}</span>
       
              @endforeach
              @endif
     @endif
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block"> Reset Password</button>
    </form>
</div>
  
@endsection


