@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-briefcase"></i>
            </div>
            <h5>Edit Project</h5>
        </header>
        <div class="body">
            {{ Form::open(array('route' => array('admin.project.update', $project->id), 'method' => 'put', 'class' => 'form-horizontal')) }}
                @include('admin.project.form', $project)
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop