<div class="form-group">
    {{ Form::label('Title', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('title', $post->title, array('placeholder' => 'Post Title', 'class' => 'form-control'))}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('Category', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        <select name="category_id" class="form-control">
        @if(!empty($post->category->id))       
            @foreach(Category::where('projects', '=', 0)->get() as $c)
                <option value="{{ $c->id }}"{{ $post->category->id == $c->id ? ' selected' : '' }}>{{ $c->title }}</option>
            @endforeach
        @else
            @foreach(Category::where('projects', '=', 0)->get() as $c)
                <option value="{{ $c->id }}"{{ Input::old('category_id', 0) == $c->id ? ' selected' : '' }}>{{ $c->title }}</option>
            @endforeach
        @endif
        </select>
    </div>
</div>
<div class="form-group">
    {{ Form::label('Published', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::checkbox('published', 1, $post->published)}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('Content', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::textarea('content', $post->content, array('class' => 'form-control', 'id' => 'post-content'))}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('Excerpt (Optional)', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::textarea('excerpt', $post->excerpt, array('class' => 'form-control'))}}
    </div>
</div>
    
@section('scripts')
    @include('admin.layouts.editor')
@stop