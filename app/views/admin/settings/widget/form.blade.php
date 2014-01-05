<div class="form-group">
    {{ Form::label('Title', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('title', $widget['title'], array('placeholder' => 'Widget Title', 'class' => 'form-control'))}}
    </div>
</div>
<div class="form-group" id="last">
    {{ Form::label('type', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        <select name="type" class="form-control" id="selector">
            @foreach(Cache::get('widget-types') as $type)
                <option value="{{ $type }}"{{ $type == $widget['type'] ? ' selected' : '' }}>{{ $type }}</option>
            @endforeach
        </select>
    </div>
</div>

@if($widget['type'] == 'custom')
    <div class="form-group" id="contentarea">
        {{ Form::label('Content', null, array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::textarea('content', $widget['content'], array('class' => 'form-control', 'id' => 'post-content'))}}
        </div>
    </div>
@endif

@section('scripts')
    <script type="text/javascript" src="/back/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/back/js/widgets.js"></script>
    @if($widget['type'] == 'custom')
        <script type="text/javascript">CKEDITOR.replace('post-content');</script>
    @endif
@stop