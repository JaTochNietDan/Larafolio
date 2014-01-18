@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-briefcase"></i>
            </div>
            <h5>All Projects</h5>
        </header>
        <div class="body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Created</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                @if(count($projects) == 0)
                    <tr>
                        <td colspan="5">No projects yet!</td>
                    </tr>
                @endif
                @foreach($projects as $project)
                    <tr>
                        <td>
                        {{
                            link_to_action('PostController@show',
                                $project->title,
                                array($project->category->link, $project->link),
                                array('target' => '_blank')
                            )
                        }}
                        </td>
                        <td>{{ $project->category->title }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td>{{ $project->updated_at }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.project.edit', $project->id) }}">Edit</a> 
                            {{ Form::open(array('route' => array('admin.project.destroy', $project->id), 'method' => 'delete', 'style' => 'display: inline;')) }}
                                {{
                                    Form::submit(
                                        'Delete',
                                        array('class' => 'btn btn-danger', 'data-method' => 'delete', 'data-confirm' => 'Are you sure you want to delete this project?')
                                    )
                                }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop