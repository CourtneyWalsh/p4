<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','The Bucket List')</title>
	<meta charset='utf-8'>

	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Petit+Formal+Script|Great+Vibes|Open+Sans:300italic,400italic,400,300|Bentham|Unna|Sacramento|Rochester' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' href='/css/bucketlist.css' type='text/css'>

	@yield('head')


</head>
<body>

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	<a href='/'><img class='logo' src='/images/logo.jpg' alt='The Bucket List logo'></a>


	@yield('content')

	@yield('/body')

</body>
</html>





