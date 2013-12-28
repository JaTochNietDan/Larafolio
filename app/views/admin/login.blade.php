@section('content')
<div class="col-lg-4">
    <div class="panel panel-default">				
        <div class="panel-heading">
            <span class="glyphicon glyphicon-list"></span>
            Login
        </div>
    
        <div class="panel-body">
        {{ Form::open(array('action' => 'LoginController@login', 'class' => 'form-horizontal')) }}
            <div class="control-group">
                {{ Form::label('Email', null, array('class' => 'control-label'))}}
                <div class="controls">
                {{
                    Form::text('email', Input::old('email'), array(
                        'placeholder' => 'email@example.com',
                        'class' => 'form-control'
                    ));
                }}
                </div>
            </div>
            <div class="control-group">
                {{ Form::label('Password', null, array('class' => 'control-label'))}}
                <div class="controls">
                {{
                    Form::password('password', array('class' => 'form-control'));
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
@stop

@section('breadcrumb')
<li class="active">Login</li>
@stop