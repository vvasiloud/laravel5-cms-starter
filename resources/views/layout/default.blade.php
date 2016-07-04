<!DOCTYPE html>
<html>
    <head>
		 @include('layout.head')
    </head>
	<body>
		<div id="container" class="container intro-effect-grid">
			<!-- Top Navigation -->
			<header class="header">	@include('layout.header') </header>
			<div class="contents"> @yield('content') </div>
			<footer> @include('layout.footer') </footer>
		</div><!-- /container -->
    </body>
</html>
