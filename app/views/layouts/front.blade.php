<html>
    <head>
        <title>
            @yield('title')
        </title>
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="/css/navbar.css" rel="stylesheet">
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
							<li class="active"><a href="/"><i class="icon-home"></i> Blog</a></li><li><a href="/projects"><i class="icon-briefcase"></i> Projects</a></li><li><a href="/page/about"><i class="icon-user"></i> About</a></li><li><a href="/action/contact"><i class="icon-envelope"></i> Contact</a></li>						</ul>
					</div>
				</div>
			</div>
		</div>
        <div class="container">
			@include('layouts.fronterrors')
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