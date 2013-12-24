@section('title')
    Website Settings
@stop

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-edit"></i> Edit Settings</h3>
        </div>
        <div class="panel-body">
            {{ Form::open(array('route' => array('admin.settings.save'), 'class' => 'form-horizontal')) }}
                <div class="form-group">
                    {{ Form::label('Site Title', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('site-title', $sitetitle, array('placeholder' => 'Post Title', 'class' => 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Site Name', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('site-name', $sitename, array('placeholder' => 'Post Title', 'class' => 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Date Formatting', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('date-format', $dateformat, array('placeholder' => 'Post Title', 'class' => 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Posts per page', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('posts-page', $postspage, array('placeholder' => 'Post Title', 'class' => 'form-control'))}}
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