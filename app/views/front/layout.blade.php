<html>
    <head>
        <title>
            @yield('title', Cache::get('site-title'))
        </title>
        <link href="/front/css/bootstrap-alt.css" rel="stylesheet">
		<link href="/front/css/prism.css" rel="stylesheet">
        <link href="/front/css/navbar.css" rel="stylesheet">
    </head>
    <body>
		<div id="wrap">
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<a href="../" class="navbar-brand">{{ Cache::get('site-name') }}</a>
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse" id="navbar-main">
						<ul class="nav navbar-nav">
						@include('front.menu')
						</ul>			
					</div>
				</div>
			</div>
			<div class="container">
				@include('front.errors')
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
						@yield('side')
					</div>
				</div>
			</div>
			<div id="push"></div>
		</div>
		<div id="footer">
			<div class="container">
				<p class="muted credit">Footer lyfe</a>.</p>
			</div>
		</div>
		<script type="text/javascript" src="/back/js/jquery.js"></script>
		<script type="text/javascript" src="/front/js/bootstrap.js"></script>
		<script type="text/javascript" src="/front/js/prism.js"></script>
    </body>
</html>