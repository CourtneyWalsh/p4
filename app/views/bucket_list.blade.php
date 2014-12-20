@extends('_master')

@section('title')
	buckets
@stop

@section('content')

	<h1> Your Bucket List</h1>

	<div>
	<p class='1_buttons'><a href='/bucket/?format=json' target='_blank'>Json Version</a></p>
	<p class='1_buttons'><a href='/bucket/?format=pdf' target='_blank'>PDF</a>PDF Version</a></p>
	<p class='1_buttons'><a href='/logout'>Add to Your List</a></p>
	<p class='1_buttons'><a href='/logout'>Browse The Library</a></p>

	</div>


		@foreach($buckets as $bucket)
				<img class='icon' src='{{ $bucket['icon'] }}'>

		@endforeach


@stop
