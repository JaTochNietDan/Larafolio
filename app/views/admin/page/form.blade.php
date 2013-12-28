<div class="form-group">
    {{ Form::label('Title', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('title', $page->title, array('placeholder' => 'Page Title', 'class' => 'form-control'))}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('Content', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::textarea('content', $page->content, array('class' => 'form-control', 'id' => 'post-content'))}}
    </div>
</div>
    
@section('scripts')
    @include('admin.layouts.editor')
@stop