@section('content')
<div class="box inverse">
    <header>
        <div class="icons">
            <i class="fa fa-file-o"></i>
        </div>
        <h5>All Pages</h5>
    </header>
    <div class="body">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Title</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Action</th>
            </tr>
            @if(count($pages) == 0)
            <tr>
                <td colspan="4">No pages yet!</td>
            </tr>
            @endif
            @foreach($pages as $page)
            <tr>
                <td>{{ link_to(route('page', $page->link), $page->title) }}</td>
                <td>{{ $page->created_at }}</td>
                <td>{{ $page->updated_at }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('admin.page.edit', $page->id) }}">Edit</a> 
                    {{ Form::open(array('route' => array('admin.page.destroy', $page->id), 'method' => 'delete', 'style' => 'display: inline;')) }}
                        {{
                            Form::submit(
                                'Delete',
                                array('class' => 'btn btn-danger', 'data-method' => 'delete', 'data-confirm' => 'Are you sure you want to delete this page?')
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