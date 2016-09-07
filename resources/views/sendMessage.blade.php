@extends('layouts.app')
@section('content')
            <div >
                {!! Form::open(array('method' => 'post', 'url'=>'send')) !!}
                {!! Form::select('sendTo', array('Stefan' => 'Stefan Antic', 'Milos' => 'Milos Milosevic', 'Vanja' =>'Vanja Paunovic')) !!}<br/><br/>
                {!! Form::textarea('message', null, array('placeholder'=>'Type a message' )) !!} <br><br>
                {!! Form::submit('Send!')!!}
                {!! Form::close() !!}
            </div>
@endsection