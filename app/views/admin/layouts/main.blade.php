<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ Cache::get('site-title') }} Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/back/css/bootstrap.css">
        <link rel="stylesheet" href="/back/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/back/css/main.css">
    
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
                                <a href="{{ route('admin.settings.profile') }}" data-placement="bottom" data-original-title="Change my account settings" data-toggle="tooltip" class="btn btn-info btn-sm">
                                    <i class="fa fa-wrench"></i>
                                </a>
                            </div>
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
                    <li class="nav-header">Menu</li>
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
                            <li{{ Request::is('admin/settings/widget*') ? ' class="active"' : '' }}>
                                <a href="{{ route('admin.settings.widget.index') }}">
                                    <i class="fa fa-angle-right"></i>&nbsp;Widgets
                                </a>
                            </li>
                            <li{{ Request::is('admin/settings/profile') ? ' class="active"' : '' }}>
                                <a href="{{ route('admin.settings.profile') }}">
                                    <i class="fa fa-angle-right"></i>&nbsp;Profile
                                </a>
                            </li>
                        </ul>
                    </li>
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
                    <li{{ Request::is('admin/page*') ? ' class="active"' : '' }}>
                        <a href="{{ route('admin.page.index') }}">
                            <i class="fa fa-file-o"></i>
                            <span class="link-title">Pages</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul>
                            <li{{ Request::is('admin/page') ? ' class="active"' : '' }}>
                                <a href="{{ route('admin.page.index') }}">
                                    <i class="fa fa-angle-right"></i>&nbsp;All Pages
                                </a>
                            </li>
                            <li{{ Request::is('admin/page/create') ? ' class="active"' : '' }}>
                                <a href="{{ route('admin.page.create') }}">
                                    <i class="fa fa-angle-right"></i>&nbsp;Add New Page
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li{{ Request::is('admin/project*') ? ' class="active"' : '' }}>
                        <a href="{{ route('admin.project.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="link-title">Projects</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul>
                            <li{{ Request::is('admin/project') ? ' class="active"' : '' }}>
                                <a href="{{ route('admin.project.index') }}">
                                    <i class="fa fa-angle-right"></i>&nbsp;All Projects
                                </a>
                            </li>
                            <li{{ Request::is('admin/project/create') ? ' class="active"' : '' }}>
                                <a href="{{ route('admin.project.create') }}">
                                    <i class="fa fa-angle-right"></i>&nbsp;Add New Project
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
        <script type="text/javascript" src="/back/js/jquery.js"></script>
        <script type="text/javascript" src="/back/js/jquery-ujs.js"></script>
        <script type="text/javascript" src="/back/js/bootstrap.js"></script>
        <script type="text/javascript" src="/back/js/main.min.js"></script>
        @yield('scripts')
    </body>
</html>