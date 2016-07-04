<ul class="grid">
	@include('layout.post.recent') 
</ul>
<div class="bg-img"><img src="{{URL::asset('assets/img/8.jpg')}}" alt="Background Image"/></div>
<div class="title">
	<nav class="main-menu">
		@include('layout.navigation.top')
	</nav>
	<h1>{{ $post->title }}</h1>
	<p class="subline"></p>
	<p>by <strong><a href="{{ url('/user/'.$post->author_id)}}"></a> </strong> &#8212; Posted in <strong></strong> on <strong>{{ $post->created_at->format('d M,Y ') }} </strong></p>
</div>
