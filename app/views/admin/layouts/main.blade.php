<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ Cache::get('site-title') }} Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/back/lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/back/lib/Font-Awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/back/css/main.css">
        <link rel="stylesheet" href="/back/css/theme.css">
    
        <!--[if lt IE 9]>
            <script src="/back/lib/html5shiv/html5shiv.js"></script>
            <script src="/back/lib/respond/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrap">
            <div id="top">    
                <nav class="navbar navbar-inverse navbar-static-top">  
                    <header class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="/admin" class="navbar-brand">
                            {{ Cache::get('site-name') }} Admin Panel
                        </a>
                    </header>
                    <div class="topnav">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a href="{{ route('logout') }}" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                                    <i class="fa fa-power-off"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="left">            
                <ul id="menu" class="collapse">
                    <li class="nav-header">General</li>
                    <li{{ Request::is('admin') ? ' class="active"' : '' }}>
                        <a href="/admin">
                            <i class="fa fa-dashboard"></i>&nbsp;Dashboard
                        </a>
                    </li>
                    <li{{ Request::is('admin/settings*') ? ' class="active"' : '' }}>
                        <a href="{{ route('admin.settings.general') }}">
                            <i class="fa fa-wrench"></i>
                            <span class="link-title">Settings</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul>
                            <li{{ Request::is('admin/settings/general') ? ' class="active"' : '' }}>
                                <a href="{{ route('admin.settings.general') }}">
                                    <i class="fa fa-angle-right"></i>&nbsp;General
                                </a>
                            </li>
                            <li{{ Request::is('admin/settings/menu') ? ' class="active"' : '' }}>
                                <a href="{{ route('admin.settings.menu') }}">
                                    <i class="fa fa-angle-right"></i>&nbsp;Menu
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Blog</li>
                    <li{{ Request::is('admin/post*') ? ' class="active"' : '' }}>
                        <a href="{{ route('admin.post.index') }}">
                            <i class="fa fa-edit"></i>
                            <span class="link-title">Posts</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul>
                            <li{{ Request::is('admin/post') ? ' class="active"' : '' }}>
                                <a href="{{ route('admin.post.index') }}">
                                    <i class="fa fa-angle-right"></i>&nbsp;All Posts
                                </a>
                            </li>
                            <li{{ Request::is('admin/post/create') ? ' class="active"' : '' }}>
                                <a href="{{ route('admin.post.create') }}">
                                    <i class="fa fa-angle-right"></i>&nbsp;Add New Post
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li{{ Request::is('admin/category') ? ' class="active"' : '' }}>
                        <a href="{{ route('admin.category.index') }}">
                            <i class="fa fa-folder"></i>&nbsp;Categories
                        </a>
                    </li>
                </ul>
            </div>
            <div id="content">
        <div class="outer">
            <div class="inner">
                @include('admin.layouts.messages')
                @yield('content')
            </div>
        </div>
        <script type="text/javascript" src="/back/lib/jquery.min.js"></script>
        <script type="text/javascript" src="/back/lib/jquery-ujs.js"></script>
        <script type="text/javascript" src="/back/lib/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/back/js/main.min.js"></script>
        @yield('scripts')
    </body>
</html>