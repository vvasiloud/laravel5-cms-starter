<!DOCTYPE html>
<html>
    <head>
		 @include('layout.head')
    </head>
	<body class="post-view">
		<div id="container" class="container intro-effect-grid">
			<!-- Top Navigation -->
			<header class="header">	@include('layout.post.header') </header>
			<div class="contents"> @yield('content') </div>
			<footer> @include('layout.footer') </footer>
		</div><!-- /container -->
    </body>
</html>
