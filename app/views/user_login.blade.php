@extends('_master')

@section('title')
	Log in
@stop

@section('content')

<h1>Sign In</h1>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('email') }}
    {{ Form::text('email') }}

    {{ Form::label('password') }}
    {{ Form::password('password') }}

	<br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop