
@extends('layouts.loginTemp')
@section( 'section')
<div class="card-header text-center"><a href="{{ url('/') }}"><img class="logo-img" src="{{ url("backend/assets/images/logo.png")}}" alt="logo" height="150" width="160"></a>
    <span class="splash-description">This is a secure area of the application. Please confirm your password before continuing.</span></div>
<div class="card-body">
    <form action="{{ route('password.confirm') }}" method="post">
        @csrf
        <div class="form-group">
            <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
            @if($messages = $errors->get('password'))
            @if ($messages)
            @foreach ((array) $messages as $message)
            <span class="text-danger"> {{ $message }}</span>

            @endforeach
            @endif
            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Confirm </button>
    </form>
</div>
@endsection
