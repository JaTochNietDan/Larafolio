@section('title')
    Menu Settings
@stop

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-edit"></i> Edit Menu</h3>
        </div>
        <div class="panel-body">
            {{ Form::open(array('route' => array('admin.settings.menu'))) }}
            <table class="table table-bordered striped" id="table_menu">
                <tr>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>URL</th>
                    <th>Action</th>
                </tr>
                @foreach(Cache::get('menu-items') as $id => $item)
                    <tr>
                        <td>{{ Form::text('item['.$id.'][title]', $item['title'], array('class' => 'form-control')) }}</td>
                        <td>{{ Form::text('item['.$id.'][icon]', $item['icon'], array('class' => 'form-control')) }}</td>
                        <td>{{ Form::text('item['.$id.'][link]', $item['link'], array('class' => 'form-control')) }}</td>
                        <td><a class="btn btn-danger delete_row">Delete</a></td>
                    </tr>
                @endforeach
                <tr id="last_row">
                    <td colspan="4"><a class="btn btn-success" id="add_row">Add menu item</a></td>
                </tr>
            </table>
            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="/back/js/menu.js"></script>
@stop