@extends('layouts.app')
@section('content')


    @foreach($json["messages"] as $message)
        <div class="textWrapper">
            <span class="messageInfo">{{$message['ts']}} Sent by: {{$message['user']}}</span>
            <p class="text">{{$message['text']}}</p>
        </div>
    @endforeach
    <textarea rows="4" class="reply" placeholder="Reply here!"></textarea>

@endsection