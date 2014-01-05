@section('content')
<div class="box inverse">
    <header>
        <div class="icons">
            <i class="fa fa-file-o"></i>
        </div>
        <h5>Create New Widget</h5>
    </header>
    <div class="body">
    {{ Form::open(array('route' => array('admin.settings.widget.store'), 'method' => 'post', 'class' => 'form-horizontal')) }}
        <?php
            $widget = array(
                'widget' => array(
                    'title' => '',
                    'type' => Input::old('type', 'categories'),
                    'content' => ''
                )
            );
        ?>
        @include('admin.settings.widget.form', $widget)
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
    </div>
</div>
@stop