@section('content')
<div class="box inverse">
    <header>
        <div class="icons">
            <i class="fa fa-file-o"></i>
        </div>
        <h5>Edit Widget</h5>
    </header>
    <div class="body">
    {{ Form::open(array('route' => array('admin.settings.widget.update', $id), 'method' => 'put', 'class' => 'form-horizontal')) }}
    <?php
        $widget['type'] = Input::old('type', $widget['type']);
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