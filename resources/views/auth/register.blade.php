@extends('layouts.app')

@section('content')

<div>Register</div>

<form role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
    <label for="name" >Name</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus>

    @if ($errors->has('name'))
    <span>
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif



    <label for="email">E-Mail Address</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}">

    @if ($errors->has('email'))
    <span>
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif


    <label for="password">Password</label>
    <input id="password" type="password" name="password">

    @if ($errors->has('password'))
    <span>
        <strong>{{ $errors->first('password') }}</strong>
    </span>
    @endif


    <label for="password-confirm">Confirm Password</label>
    <input id="password-confirm" type="password" name="password_confirmation">

    @if ($errors->has('password_confirmation'))
    <span>
        <strong>{{ $errors->first('password_confirmation') }}</strong>
    </span>
    @endif

    <button type="submit">Register</button>

</form>

@endsection
