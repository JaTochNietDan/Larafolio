@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-download"></i>
            </div>
            <h5>Edit release</h5>
        </header>
        <div class="body">
            {{ Form::open(array('route' => array('admin.project.release.update', $project->id, $release->id), 'method' => 'put', 'class' => 'form-horizontal')) }}
                @include('admin.project.release.form', array('release' => $release))
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop