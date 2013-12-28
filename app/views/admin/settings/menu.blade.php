@section('content')
    <div class="box inverse">
        <header>
            <div class="icons">
                <i class="fa fa-wrench"></i>
            </div>
            <h5>Edit Menu</h5>
        </header>
        <div class="body">
            <div class="col-lg-12">
                <div class="alert alert-info">
                    <b>Hint: </b> You can drag and drop to reorder menu items!
                </div>
            </div>
            {{ Form::open(array('route' => array('admin.settings.menu'))) }}
            <table class="table table-bordered striped" id="table_menu">
                <tbody>
                    <tr>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>URL</th>
                        <th>Action</th>
                    </tr>
                </tbody>
                <tbody class="sortable">
                    @if(count(Cache::get('menu-items')) > 0)
                        @foreach(Cache::get('menu-items') as $id => $item)
                            <tr>
                                <td>{{ Form::text('item['.$id.'][title]', $item['title'], array('class' => 'form-control')) }}</td>
                                <td>{{ Form::text('item['.$id.'][icon]', $item['icon'], array('class' => 'form-control')) }}</td>
                                <td>{{ Form::text('item['.$id.'][link]', $item['link'], array('class' => 'form-control')) }}</td>
                                <td>
                                    <a class="btn btn-danger delete_row">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tbody style="border-style: none;">
                    <tr id="last_row">
                        <td colspan="4"><a class="btn btn-success" id="add_row">Add menu item</a></td>
                    </tr>
                </tbody>
            </table>
            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="/back/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/back/js/menu.js"></script>
@stop