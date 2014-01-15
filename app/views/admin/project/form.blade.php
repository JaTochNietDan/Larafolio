<div class="form-group">
    {{ Form::label('Title', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('title', $project->title, array('placeholder' => 'Project Title', 'class' => 'form-control'))}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('Category', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        <select name="category_id" class="form-control">
        @if(!empty($project->category->id))       
            @foreach(Category::where('projects', '=', 1)->get() as $c)
                <option value="{{ $c->id }}"{{ $project->category->id == $c->id ? ' selected' : '' }}>{{ $c->title }}</option>
            @endforeach
        @else
            @foreach(Category::where('projects', '=', 1)->get() as $c)
                <option value="{{ $c->id }}"{{ Input::old('category_id', 0) == $c->id ? ' selected' : '' }}>{{ $c->title }}</option>
            @endforeach
        @endif
        </select>
    </div>
</div>
<div class="form-group">
    {{ Form::label('Description', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::textarea('description', $project->description, array('class' => 'form-control', 'id' => 'post-content'))}}
    </div>
</div>
<div class="form-group">
    {{ Form::label('Short Description (Optional)', null, array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::textarea('excerpt', $project->excerpt, array('class' => 'form-control'))}}
    </div>
</div>
    
@section('scripts')
    @include('admin.layouts.editor')
@stop