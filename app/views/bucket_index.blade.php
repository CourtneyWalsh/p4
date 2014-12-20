@extends('_master')



@section('title')
	buckets
@stop

@section('content')

	<h1> Your Bucket List</h1>

	<div>
	<p class='a_buttons'> <a href='/bucket/?format=json' target='_blank'>Json Version</a></p>
	<p class='a_buttons'> <a href='/bucket/?format=pdf' target='_blank'>PDF Version</a></p>
	<p class='a_buttons'> <a href='/library'>Browse The Library</a></p>
	</div>


		@foreach($buckets as $bucket)
				<img class='icon' src='{{ $bucket['icon'] }}'>

		@endforeach


@stop
