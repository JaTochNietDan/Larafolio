<!DOCTYPE html>
<html>
    <head>
        <title>
            @yield('title', Cache::get('site-title'))
        </title>
		
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="@yield('description', 'JaTochNietDan\'s personal website containing his projects and blog posts.')">
			
		<link href="/front/css/bootstrap-alt.css" rel="stylesheet">	
        {{ Minify::stylesheet(["/front/css/monokai_sublime.css", "/front/css/navbar.css"]) }}
		@yield('styles')
		{{ Cache::get('analytics') }}
    </head>
    <body>
		<div id="wrap">
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<a href="/" class="navbar-brand">{{ Cache::get('site-name') }}</a>
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse" id="navbar-main">
						<ul class="nav navbar-nav">
							@include('front.layouts.menu')
						</ul>
					</div>
				</div>
			</div>
			<div class="container">
				@include('front.layouts.errors')
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
						@yield('breadcrumb')
						</ul>
					</div>
				</div>
				<div class="row">
					@yield('content')
					<div class="col-lg-3">
						@include('front.layouts.widgets')
					</div>
				</div>
			</div>
			<div id="push"></div>
		</div>
		<div id="footer">
			<div class="container">
				<p class="muted credit">{{ Cache::get('footer', 'Footer goes here.') }}</p>
			</div>
		</div>
		{{ Minify::javascript(["/back/js/jquery.js", "/front/js/bootstrap.min.js", "/front/js/highlight.pack.js"]) }}
		<script>hljs.initHighlightingOnLoad();</script>
		@yield('scripts')
    </body>
</html>