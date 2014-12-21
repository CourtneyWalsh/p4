@extends('_master')

@section('title')
	buckets
@stop
<link rel="stylesheet" href="css/filtrify.css">
@section('content')
	<h1>The Bucket List Library</h1>
	<p> Add to your library by clicking on the image!</p>

	<div>
	<p class='a_buttons'> <a href='/bucket/?format=json' target='_blank'>Json Version</a></p>
	<p class='a_buttons'> <a href='/bucket/?format=pdf' target='_blank'>PDF Version</a></p>
	<p class='a_buttons'> <a href='/bucket'>Head Back To Your List</a></p>
	<p class='a_buttons'><a href='/logout'>Log Out</a></p>

	</div>

	<a href='/paris'> <img class='icon' data-group='Travel' src='http://2.bp.blogspot.com/-rF5QVuEE4vo/UiPuMNgSpbI/AAAAAAAAAVA/hAMAn_pKo3k/s320/before-i-die-bucket-list-france-go-to-paris-paris-Favim.com-458313_original.jpg' alt='Go to Paris'></a>

	<a href='/million'> <img class='icon' data-group='Financial' src='http://40.media.tumblr.com/tumblr_luq4r8XelH1r29t5yo1_500.png' alt='Make a million dollars'></a>

	<a href='/model'> <img class='icon' data-group='Personal' src='http://data2.whicdn.com/images/24587101/tumblr_m0nzgpjRwq1rr16spo1_500_large.jpg' alt='Become a model'></a>

	<a href='/masters'> <img class='icon' data-group='Educational' src='http://36.media.tumblr.com/tumblr_mbi63c5Vbm1r9043bo1_500.jpg' alt='Get my masters degree'></a>

	<a href='/marathon'> <img class='icon' data-group='Athletics' src='http://media-cache-ec0.pinimg.com/736x/8e/53/52/8e5352a2d070580488fc4704cdd05844.jpg' alt='Run a marathon'></a>

	<a href='/world'> <img class='icon' data-group='Travel' src='http://media.tumblr.com/tumblr_ltlo4yFSNC1qg3aas.png' alt='Travel the world'></a>

	<a href='/skydive'> <img class='icon' data-group='Athletics' src='http://media.tumblr.com/tumblr_m5qspumTDb1qi6dl1.jpg' alt='Go sky diving'></a>

	<a href='/road'> <img class='icon' data-group='Travel' src='http://data2.whicdn.com/images/17005942/large.png' alt='Go on a road trip with friends'></a>

	<a href='/fly'> <img class='icon' data-group='Travel' src='http://d2tq98mqfjyz2l.cloudfront.net/image_cache/1359206107850341.jpg' alt='Fly first class'></a>

	<a href='/castle'> <img class='icon' data-group='Travel' src='http://28.media.tumblr.com/tumblr_ltc2p8urxY1r29t5yo1_500.png' alt='Visit a castle'></a>

	<a href='/panda'> <img class='icon' data-group='Personal' src='http://27.media.tumblr.com/tumblr_ls5px77fRN1r29t5yo1_r1_500.png' alt='pet a panda'></a>

	<a href='/nyc'> <img class='icon' data-group='Travel' src='http://26.media.tumblr.com/tumblr_ltc54deMzW1r29t5yo1_500.png' alt='Go to new york fashion week'></a>

	<a href='/marry'> <img class='icon' data-group='Personal' src='http://media-cache-ec0.pinimg.com/736x/b2/f9/ba/b2f9bae060bbad0fa76ea2d66e1f97c7.jpg' alt='Marry the love of my life'></a>

	<a href='/spanish'> <img class='icon' data-group='Educational' src='http://data2.whicdn.com/images/47992632/large.jpg' alt='Learn Spanish'></a>

	<a href='/pool'> <img class='icon' data-group='Personal' src='http://s5.favim.com/orig/53/bucket-list-girl-pool-Favim.com-496675.jpg' alt='Jump into a pool with clothes on'></a>

	<a href='/cliff'> <img class='icon' data-group='Athletics' src='http://data2.whicdn.com/images/24692592/large.jpg' alt='Go cliff diving'></a>

	<a href='/surf'> <img class='icon' data-group='Athletics' src='http://s5.favim.com/orig/74/blue-cute-dear-bucket-list-dearbucketlist.tumblr.com-Favim.com-756338.jpg' alt='Learn to surf'></a>

	<a href='/sled'> <img class='icon' data-group='Athletics' src='http://27.media.tumblr.com/tumblr_ls9gyng0cJ1r29t5yo1_r1_500.png' alt='Try sled dogging'></a>

	<a href='/sky'> <img class='icon' data-group='Travel' src='http://media.tumblr.com/tumblr_ltmpu9M0Sw1qg3aas.png' alt='Go on the chicago sky deck'></a>

	<a href='/para'> <img class='icon' data-group='Travel' src='http://yourhappyplaceblog.files.wordpress.com/2013/01/tumblr_lw1v04hvmd1r29t5yo1_500.png' alt='Go Paraglcategorying'></a>

	<a href='/universal'> <img class='icon' data-group='Travel' src='http://cdnpix.com/show/imgs/b0cfa9b0a930a186cc0c8bbafbb3f4a4.jpg' alt='Go to Universal studios'></a>

	<a href='/adopt'> <img class='icon' data-group='Personal' src='http://25.media.tumblr.com/tumblr_lthqepAQia1r29t5yo1_500.png' alt='Adopt a hedgehog'></a>

	<a href='/study'> <img class='icon' data-group='Educational' src='http://30.media.tumblr.com/tumblr_ltjl69bm5J1r29t5yo1_500.png' alt='Study abroad'></a>

	<a href='/sharks'> <img class='icon' data-group='Travel' src='http://3.bp.blogspot.com/-9k_FnsTeDeg/UDQNZSWXWlI/AAAAAAAADVQ/7VscXaw4kF4/s1600/tumblr_m4z50ysyeg1rxs7qjo1_500.png' alt='Swim with sharks'></a>

@stop

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/fitrify.js"></script>
<script>
$(function() {

    $.filtrify("container", "placeHolder");

});
</script>
