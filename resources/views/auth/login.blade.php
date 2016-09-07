@extends('layouts.app')
@section('content')
<div class="container">

    <div class="wrapper">
        <h1>Login</h1><br/>
        <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <label for="email">E-Mail Address</label>

            <input class="alignRight" id="email" type="email" name="email" value="{{ old('email') }}" autofocus>
            <br/>
            @if ($errors->has('email'))
                <span><strong>{{ $errors->first('email') }}</strong></span>
            @endif<br/>


            <label for="password">Password</label>


                <input class="alignRight" id="password" type="password" name="password">
                <br/>
                @if ($errors->has('password'))
                    <span><strong>{{ $errors->first('password') }}</strong></span>
                @endif<br/>




            <input type="checkbox" name="remember"> Remember Me <br/><br/>


            <button type="submit">Login</button>

            <a class="alignRight" href="{{ url('/password/reset') }}">Forgot Your Password?</a><br/>
            <a class="alignRight" href="/register">Register</a>
        </form>
    </div>
</div>
@endsection