@extends('layouts.app')
@section('inner')
    <div class="selectContainer">
        <div class="selectWrapper">
            <h3>Select channel</h3>
            <h5>Recent channels</h5>
            @foreach($channels as $channel)
                <a class="links" href="/channels/chat/{{$channel->chat_id}}">
                    <div class="choiceWrapper">
                        <span class="choiceName">&#35{{$channel->name}} </span>
                    </div>
                </a>
            @endforeach
            <h5>Other channels</h5>
            @foreach($otherChannels as $channel )
                <a class="links" href="/channels/chat/{{$channel->chat_id}}">
                    <div class="choiceWrapper">
                        <span class="choiceName">&#35{{$channel->name}} </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection