@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-wrench"></i>
            </div>
            <h5>Edit General Settings</h5>
        </header>
        <div class="body">
            {{ Form::open(array('route' => array('admin.settings.general'), 'class' => 'form-horizontal')) }}
                <div class="form-group">
                    {{ Form::label('Site Title', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('site-title', $sitetitle, array('placeholder' => 'Site title', 'class' => 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Site Name', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('site-name', $sitename, array('placeholder' => 'Site name', 'class' => 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Date Formatting', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('date-format', $dateformat, array('placeholder' => 'Date formatting goes here', 'class' => 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Posts per page', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::text('posts-page', $postspage, array('placeholder' => 'Posts to display per page', 'class' => 'form-control'))}}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Footer', null, array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                        {{ Form::textarea('footer', $footer, array('placeholder' => 'Footer text', 'class' => 'form-control', 'id' => 'post-content'))}}
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

@section('scripts')
    @include('admin.layouts.editor')
@stop