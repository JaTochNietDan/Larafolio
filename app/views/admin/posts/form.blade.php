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
            <option value="{{ $post->category->id }}">{{ $post->category->title}} </option>
                
            @foreach(Category::where('id', '!=', $post->category->id)->get() as $c)
                <option value="{{ $c->id }}">{{ $c->title }}</option>
            @endforeach
        @else
            @foreach(Category::all() as $c)
                <option value="{{ $c->id }}">{{ $c->title }}</option>
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
        {{ Form::textarea('content', $post->content, array('class' => 'form-control', 'id' => 'content'))}}
    </div>
</div>
    
@section('scripts')
    @include('admin.editor')
@stop