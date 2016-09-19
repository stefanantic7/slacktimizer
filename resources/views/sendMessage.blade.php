@extends('layouts.app')
@section('content')
    <div >
        {!! Form::open(array('method' => 'post', 'url'=>'direct/send')) !!}
            {!! Form::select('send_to', $channels, null, ['id'=>'usersArray']) !!}
            <input onkeyup="filter()" id="search" type="text"><br/><br/>
            {!! Form::textarea('message', null, array('placeholder'=>'Type a message')) !!} <br><br>
            {!! Form::submit('Send') !!}

        {!! Form::close() !!}

    </div>
    <script>
        function filter()  {
            var users = document.getElementById('usersArray');
            var search = document.getElementById('search').value.toLowerCase();
            var i=0;
            for(i; i<users.length; i++){

                if(users.options[i].value.toLowerCase().indexOf(search)>-1 || users.options[i].innerHTML.toLowerCase().indexOf(search)>-1){
                    console.log(users.options[i].innerHTML);
                    document.getElementById('usersArray').value=users.options[i].value;
                }
            }
        }


    </script>

@endsection