<ul class="grid">
	@include('layout.post.recent') 
</ul>
<div class="bg-img"><img src="{{URL::asset('assets/img/8.jpg')}}" alt="Background Image"/></div>
<div class="title">
	<nav class="codrops-demos">
		@include('layout.navigation.top')
	</nav>
	<h1>{{ $page->title }}</h1>
</div>
