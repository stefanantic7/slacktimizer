@extends('layouts.app')
@section('content')
    <div class="w">

    @foreach($json["messages"] as $message)
        <div class="textWrapper">
            <span class="messageInfo">{{$message['ts']}} Sent by: {{$message['user']}}</span>
            <p class="text">{{$message['text']}}</p>
        </div>
    @endforeach
    <textarea rows="5" class="reply" placeholder="Reply here!"></textarea><br><br>
    <input type="submit" value="Send!">
    </div>
@endsection