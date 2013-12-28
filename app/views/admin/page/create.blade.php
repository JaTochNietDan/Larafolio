@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-file-o"></i>
            </div>
            <h5>Create new page</h5>
        </header>
        <div class="body">
            {{ Form::open(array('route' => 'admin.page.store', 'class' => 'form-horizontal')) }}
                @include('admin.page.form', array('page' => new Page()))
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop