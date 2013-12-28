@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-edit"></i>
            </div>
            <h5>All Posts</h5>
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
                @if(count($posts) == 0)
                    <tr>
                        <td colspan="3">No posts yet!</td>
                    </tr>
                @endif
                @foreach($posts as $post)
                    <tr>
                        <td>
                        {{
                            link_to_action('PostController@show',
                                $post->title,
                                array($post->category->link, $post->link),
                                array('target' => '_blank')
                            )
                        }}
                        </td>
                        <td>{{ $post->category->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.post.edit', $post->id) }}">Edit</a> 
                            {{ Form::open(array('route' => array('admin.post.destroy', $post->id), 'method' => 'delete', 'style' => 'display: inline;')) }}
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
            </table>
        </div>
    </div>
@stop