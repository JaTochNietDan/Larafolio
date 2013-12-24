<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Dashboard</title>

        <link href="/back/css/bootstrap.css" rel="stylesheet">
        <link href="/back/css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="/back/font-awesome/css/font-awesome.min.css">
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/admin">{{ Cache::get('site-name') }} Admin Panel</a>
                </div>
    
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li{{ Request::is('admin') ? ' class="active"' : '' }}><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="dropdown{{ Request::is('admin/post*') ? ' open' : '' }}">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i> Posts <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.post.index') }}">All Posts</a></li>
                                <li><a href="{{ route('admin.post.create') }}">Add New Post</a></li>
                            </ul>
                        </li>
                        <li{{ Request::is('admin/settings') ? ' class="active"' : '' }}><a href="{{ route('admin.settings') }}"><i class="fa fa-wrench"></i> Settings</a></li>
                    </ul>
                    @include('admin.user')
                </div>
            </nav>

            <div id="page-wrapper">
                @include('admin.messages')
                <div class="row">
                    <div class="col-lg-12">
                        <h1>
                            @yield('title', 'Dashboard')
                        </h1>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="/back/js/jquery.js"></script>
        <script src="/back/js/jquery-ujs.js"></script>
        <script src="/back/js/bootstrap.js"></script>
        @yield('editor')
    </body>
</html>
