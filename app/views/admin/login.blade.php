<html>
    <head>
        <title>
            Login
        </title>
        <link href="/front/css/bootstrap.css" rel="stylesheet">
        <link href="/front/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="/front/css/navbar.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            @include('front.errors')
            <div class="row">
                <div class="span12">
                    <div class="widget">				
                        <div class="widget-header">
                            <i class="icon-lock"></i>
                            <h3>Login</h3>
                        </div>
                        <div class="widget-content">
                            {{ Form::open(array('action' => 'LoginController@login', 'class' => 'form-horizontal')) }}
                                <div class="control-group">
                                    {{ Form::label('Email', null, array('class' => 'control-label'))}}
                                    <div class="controls">
                                    {{
                                        Form::text('email', Input::old('email'), array(
                                            'placeholder' => 'email@example.com'
                                        ));
                                    }}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{ Form::label('Password', null, array('class' => 'control-label'))}}
                                    <div class="controls">
                                    {{
                                        Form::password('password');
                                    }}
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>