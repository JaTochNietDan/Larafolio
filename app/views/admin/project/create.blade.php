@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-briefcase"></i>
            </div>
            <h5>Create new project</h5>
        </header>
        <div class="body">
            {{ Form::open(array('route' => 'admin.project.store', 'class' => 'form-horizontal')) }}
                @include('admin.project.form', array('project' => new Project()))
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop