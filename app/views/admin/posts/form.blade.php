<div class="form-group">
    {{ Form::label('Title', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('title', null, array('placeholder' => 'Post Title', 'class' => 'form-control'))}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('Category', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        <select name="category" class="form-control">
        @foreach(Category::all() as $c)
            <option value="{{ $c->id }}">{{ $c->title }}</option>
        @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    {{ Form::label('Published', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::checkbox('published', null, false)}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('Content', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::textarea('content', null, array('class' => 'form-control'))}}
    </div>
</div>