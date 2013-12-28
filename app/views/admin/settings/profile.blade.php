@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-wrench"></i>
            </div>
            <h5>Edit Profile</h5>
        </header>
        <div class="body">
            {{ Form::open(array('route' => array('admin.settings.profile'), 'class' => 'form-horizontal')) }}
                <div class="form-group">
                    {{ Form::label('Your email', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('email', $email, array('placeholder' => 'Your email', 'class' => 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('New Password', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::password('newpass', array('placeholder' => 'New password (Leave blank to keep old password)', 'class' => 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Confirm new password', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::password('confirmpass', array('placeholder' => 'Confirm your new password', 'class' => 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop