@extends('layouts.app')
@section('content')
    <div >
        {!! Form::open(array('method' => 'post', 'url'=>'direct/send')) !!}
            {!! Form::select('send_to', $channels) !!}<br/><br/>
            {!! Form::textarea('message', null, array('placeholder'=>'Type a message')) !!} <br><br>
            {!! Form::submit('Send') !!}
        {!! Form::close() !!}
    </div>
@endsection