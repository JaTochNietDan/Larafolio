@section('content')
<div class="col-lg-8">
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
</div>
<div class="col-lg-4">
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-download"></i>
            </div>
            <h5>Releases</h5>
        </header>
        <div class="body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                @if(count($project->releases) == 0)
                <tr>
                    <td colspan="2">No releases yet!</td>
                </tr>
                @endif
                @foreach($project->releases as $release)
                <tr>
                    <td>{{ $release->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.project.release.edit', array($project->id, $release->id)) }}">Edit</a> 
                        {{ Form::open(array('route' => array('admin.project.release.destroy', $project->id, $release->id), 'method' => 'delete', 'style' => 'display: inline;')) }}
                            {{
                                Form::submit(
                                    'Delete',
                                    array('class' => 'btn btn-danger', 'data-method' => 'delete', 'data-confirm' => 'Are you sure you want to delete this post?')
                                )
                            }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2"><a class="btn btn-primary" href="{{ Route('admin.project.release.create', $project->id) }}">Add Release</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@stop