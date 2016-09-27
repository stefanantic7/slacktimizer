@extends('layouts.app')

@section('inner')
    <div class="sideBarIcon" onclick="showSideBar()"><hr/><hr/><hr/>
    </div>
    <div class="sideBar">
        <div class="info">
            <a href="/" class="links">
                <span class="teamName">{{Auth::user()->team_name}}</span><br/>
                <span class="mainUser">{{Auth::user()->name}}</span>
            </a>
        </div>
        <div class="section"><a href="/channels" class="links">CHANNELS <span class="plus">+</span></a></div>
        <div class="section"><a href="/ims" class="links">DIRECT MESSAGES <span class="plus">+</span></a></div>
    </div>
    <div class="content">
        <div class="userInfo">
            @if(empty($history))
                <div class="welcome">Welcome to Slack optimizer</div>
            @endif
            <div class="sideBarMask" onclick="hideSideBar()"></div>
            <span id="labelSendTo">{{$chatName}}</span>
            @if(isset($fullName))
                <p class="fullName">{{$fullName}}</p>
            @endif
            <a href="{{ url('/logout') }}" class="logout"
                onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                Logout
            </a>
        </div>

        <div class="historyMessages">
            @foreach($history as $message)
                <div class="userName">&#64{{$message['username']}}</div>
                <div class="messageTime">{{$message['timestamp']}}</div>
                <p class="message">{!!$message['text']!!}</p>
            @endforeach
        </div>

        @if(!empty($history))
            <form method="post" action="{{url('/' . $chatId)}}">
                {{csrf_field()}}

                <div class="sendWrapper">
                    <textarea name="message" rows="1" class="newMessage"></textarea>
                    <input type="submit" value="Send" class="sendMessage">
                </div>
            </form>
        @endif
    </div>
@endsection
@section('customScript')
    <script>
        var historyMessages = document.getElementsByClassName("historyMessages")[0];
        historyMessages.scrollTop=historyMessages.scrollHeight;
    </script>
@endsection
