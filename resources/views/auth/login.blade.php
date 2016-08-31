@extends('layouts.app')
@section('content')
    <div>Login</div>
    <form role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div {{ $errors->has('email') ? ' has-error' : '' }}>
            <label for="email">E-Mail Address</label>

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

            @if ($errors->has('email'))
                <span><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>

        <div {{ $errors->has('password') ? ' has-error' : '' }}>
            <label for="password">Password</label>

            <div>
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>
        </div>

        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label>

        <button type="submit">Login</button>

        <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
    </form>
@endsection