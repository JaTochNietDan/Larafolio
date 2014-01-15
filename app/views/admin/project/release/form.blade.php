<div class="form-group">
    {{ Form::label('Name', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('name', $release->name, array('placeholder' => 'Release name', 'class' => 'form-control'))}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('Changelog', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::textarea('changelog', $release->changelog, array('class' => 'form-control', 'id' => 'post-content'))}}
    </div>
</div>
    
@section('scripts')
    @include('admin.layouts.editor')
@stop