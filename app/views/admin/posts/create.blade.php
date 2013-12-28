@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-edit"></i>
            </div>
            <h5>Create new post</h5>
        </header>
        <div class="body">
            {{ Form::open(array('route' => 'admin.post.store', 'class' => 'form-horizontal')) }}
                @include('admin.posts.form', array('post' => new Post()))
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop