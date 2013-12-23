<html>
    <head>
        <title>
            @yield('title', Cache::get('site-title'))
        </title>
        <link href="/front/css/bootstrap.css" rel="stylesheet">
        <link href="/front/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="/front/css/navbar.css" rel="stylesheet">
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand" href="/">JaTochNietDan</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							@include('front.menu')
						</ul>
					</div>
				</div>
			</div>
		</div>
        <div class="container">
			@include('front.errors')
            <div class="row">
                <div class="span9">
                    <div class="widget">				
                        <div class="widget-header">
                            <i class="icon-home"></i>
                            <h3>Blog Posts</h3>
                        </div> 
                
                        <div class="widget-content">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="span3">
                    @yield('side')
                </div>
            </div>
        </div>
    </body>
</html>