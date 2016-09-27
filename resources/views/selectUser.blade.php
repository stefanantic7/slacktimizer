@extends('layouts.app')
@section('inner')
    <div class="selectContainer">
        <div class="selectWrapper">
            <h3>Select user</h3>
            <h5>Recent users</h5>
            @foreach($ims as $im)
                <a class="links" href="/ims/chat/{{$im->chat_id}}">
                    <div class="choiceWrapper">
                        <span class="choiceName">&#64{{$im->username}} </span>
                        @if($im->name != '')
                            <span>| {{$im->name}}</span>
                        @endif
                    </div>
                </a>
            @endforeach
            <h5>Other users</h5>
            @foreach($otherIms as $im)
                <a class="links" href="/ims/chat/{{$im->chat_id}}">
                    <div class="choiceWrapper">
                        <span class="choiceName">&#64{{$im->username}} </span>
                        @if($im->name != '')
                            <span>| {{$im->name}}</span>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection