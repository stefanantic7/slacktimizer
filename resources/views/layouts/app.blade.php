<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Optimize</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">


</head>
<body>

    @if(Auth::check())
        <a href="{{ url('/logout') }}" class="info"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" >
            {{ csrf_field() }}
        </form>
    @endif
    <div class="container">
        <div class="wrapper">
            @yield('content')
        </div>
    </div>
</body>
</html>
