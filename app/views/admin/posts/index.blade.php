@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-edit"></i> All posts</h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                @if(count($posts) == 0)
                    <tr>
                        <td colspan="3">No posts yet!</td>
                    </tr>
                @endif
                @foreach($posts as $post)
                    <tr>
                        <td>{{ link_to_action('PostController@show', $post->title, array($post->category->link, $post->link), array('target' => '_blank')) }}</td>
                        <td>{{ $post->category->title }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.post.edit', $post->id) }}">Edit</a> 
                            {{ Form::open(array('route' => array('admin.post.destroy', $post->id), 'method' => 'delete', 'style' => 'display: inline;')) }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop

@include('admin.posts.main')