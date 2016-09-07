@extends('layouts.app')

@section('content')
<div class="container">

    <div class="wrapper">
        <h1>Register</h1><br/>
        <form role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <label for="name" >Name</label>
            <input id="name" class="alignRight" type="text" name="name" value="{{ old('name') }}" autofocus><br/>
            @if ($errors->has('name'))
            <span>
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif<br/>



            <label for="email">E-Mail Address</label>
            <input id="email" class="alignRight" type="email" name="email" value="{{ old('email') }}"><br/>
            @if ($errors->has('email'))
            <span>
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif<br/>


            <label for="password">Password</label>
            <input id="password" class="alignRight" type="password" name="password"><br/>
            @if ($errors->has('password'))
            <span>
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif<br/>


            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" class="alignRight" type="password" name="password_confirmation"><br/>
            @if ($errors->has('password_confirmation'))
            <span>
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif<br/>

            <button type="submit">Register</button>

        </form>
    </div>
</div>

@endsection
