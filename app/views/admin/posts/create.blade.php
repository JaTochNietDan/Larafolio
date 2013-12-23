@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-edit"></i> Create Post</h3>
        </div>
        <div class="panel-body">
            {{ Form::open(array('route' => 'admin.post.store', 'class' => 'form-horizontal')) }}
                @include('admin.posts.form')
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@include('admin.posts.main')