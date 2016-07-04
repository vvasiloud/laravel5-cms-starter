@extends('layout.post.index')
@section('content')
	<button class="trigger" data-info="Click to see the header effect"><span>Trigger</span></button>
	<article class="content">
		{{ $post->title }}
	</article>
@stop