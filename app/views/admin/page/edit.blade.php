@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-file-o"></i>
            </div>
            <h5>Edit page</h5>
        </header>
        <div class="body">
            {{ Form::open(array('route' => array('admin.page.update', $page->id), 'method' => 'put', 'class' => 'form-horizontal')) }}
                @include('admin.page.form', array($page))
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop