@extends('layouts.app')

@section('inner')
    <div class="sideBarIcon" onclick="showSideBar()"><hr/><hr/><hr/>
    </div>
    <div class="sideBar">
        <div class="section">CHANNELS <span class="plus">+</span></div>
        <div class="channels">#Labs</div><br>
        <div class="channels">#Software</div><br>
        <div class="channels">#Optimizertest</div><br>

        <div class="section">DIRECT MESSAGES <span class="plus">+</span></div>
        @foreach($channels as $channel)
            <div class="channels"><a href="/{{$channel}}">{{$channel}}</a></div><br>
        @endforeach
    </div>
    <div class="content">
        <form method="post" action="/">
            {{csrf_field()}}
            <input type="hidden" name="send_to" id="sendTo" value="{{$sendTo}}">


            <div class="userInfo">
                <div class="sideBarMask" onclick="hideSideBar()"></div>
                <span id="labelSendTo">{{$sendTo}}</span><br>
                <p class="fullName">Full Name</p>
                <a  href="{{ url('/logout') }}" class="logout"
                    onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </div>
            <div class="historyMessages">

                <div class="userName">@antic</div>
                <div class="messageTime">15:12</div>
                <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tristique tellus quis enim interdum pretium. Nunc in enim at elit cursus viverra vel nec ipsum. Fusce accumsan convallis erat, at iaculis nisl pellentesque quis. Etiam efficitur semper arcu eget imperdiet. Sed vel dolor vel enim consectetur tincidunt in vitae dui. Curabitur sagittis hendrerit velit, eget hendrerit eros scelerisque non. Quisque condimentum risus arcu, ut venenatis diam laoreet ac. Curabitur vestibulum, diam eu luctus rhoncus, arcu neque interdum orci, in dignissim odio lectus eget augue. Aenean nec mattis lacus, nec molestie nisl.</p>

                <div class="userName">@antic</div>
                <div class="messageTime">15:12</div>
                <div class="message">Dobar dan zelim</div>

                <div class="userName">@antic</div>
                <div class="messageTime">15:12</div>
                <div class="message">Dobar dan zelim</div>

                <div class="userName">@antic</div>
                <div class="messageTime">15:12</div>
                <div class="message">Dobar dan zelim</div>

                <div class="userName">@antic</div>
                <div class="messageTime">15:12</div>
                <div class="message">Dobar dan zelim</div>

                <div class="userName">@antic</div>
                <div class="messageTime">15:12</div>
                <div class="message">Dobar dan zelim</div>


            </div>


            <div class="sendWrapper">
                <textarea name="message" rows="1" class="newMessage"></textarea>
                <input type="submit" value="Send" class="sendMessage">
            </div>

        </form>


    </div>

@endsection
