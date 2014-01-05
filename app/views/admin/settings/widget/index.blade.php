@section('content')
<div class="box inverse">
    <header>
        <div class="icons">
            <i class="fa fa-file-o"></i>
        </div>
        <h5>Widgets</h5>
    </header>
    <div class="body">
        <table id="table_menu" class="table table-bordered table-striped">
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            <tbody class="sortable">
                @foreach($widgets as $id => $widget)
                <tr>
                    <td>{{ $widget['title'] }}</td>
                    <td>{{ $widget['type'] }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.settings.widget.edit', $id) }}">Edit</a> 
                        {{ Form::open(array('route' => array('admin.settings.widget.destroy', $id), 'method' => 'delete', 'style' => 'display: inline;')) }}
                            {{
                                Form::submit(
                                    'Delete',
                                    array('class' => 'btn btn-danger', 'data-method' => 'delete', 'data-confirm' => 'Are you sure you want to delete this widget?')
                                )
                            }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tr>
                <td colspan="3">
                    <a href="{{ route('admin.settings.widget.create') }}" class="btn btn-success">Create Widget</a>
                </td>
            </tr>
        </table>
    </div>
</div>
@stop

@section('scripts')
    <script type="text/javascript" src="/back/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/back/js/widgets.js"></script>
@stop