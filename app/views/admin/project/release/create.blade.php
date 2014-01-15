@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-download"></i>
            </div>
            <h5>Create new release</h5>
        </header>
        <div class="body">
            {{ Form::open(array('route' => array('admin.project.release.store', $project->id), 'class' => 'form-horizontal')) }}
                @include('admin.project.release.form', array('release' => new Release()))
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop