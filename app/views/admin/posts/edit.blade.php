@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-edit"></i> Edit Post</h3>
        </div>
        <div class="panel-body">
            {{ Form::open(array('route' => array('admin.post.update', $post->id), 'method' => 'put', 'class' => 'form-horizontal')) }}
                @include('admin.posts.form', $post)
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@include('admin.posts.main')