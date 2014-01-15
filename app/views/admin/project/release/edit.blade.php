@section('content')
<div class="col-lg-8">
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
</div>
<div class="col-lg-4">
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-download"></i>
            </div>
            <h5>Edit files</h5>
        </header>
        <div class="body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Name</th>
                    <th>Downloads</th>
                    <th>Action</th>
                </tr>
                @if(count($release->files) == 0)
                    <tr><td colspan="3">No files added yet!</td></tr>
                @endif
                @foreach($release->files()->orderBy('created_at', 'DESC')->get() as $file)
                    <tr>
                        <td>{{ $file->name }}</td>
                        <td>{{ $file->downloads }}</td>
                        <td>
                        {{ Form::open(array('route' => array('admin.project.release.file.destroy', $project->id, $release->id, $file->id), 'method' => 'delete', 'style' => 'display: inline;')) }}
                            {{
                                Form::submit(
                                    'Delete',
                                    array('class' => 'btn btn-danger', 'data-method' => 'delete', 'data-confirm' => 'Are you sure you want to delete this file?')
                                )
                            }}
                        {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </table>
            <hr>
            {{ Form::open(array('route' => array('admin.project.release.file.store', $project->id, $release->id), 'class' => 'form-horizontal', 'files' => true)) }}
            <div class="form-group">
                {{ Form::label('File name', null, array('class' => 'col-sm-4 control-label')) }}
                <div class="col-sm-7">
                    <input type="text" name="name" placeholder="File name" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('Select a file', null, array('class' => 'col-sm-4 control-label')) }}
                <div class="col-sm-7">
                    <input type="file" name="file" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{ Form::submit('Upload', array('class' => 'btn btn-primary')) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop