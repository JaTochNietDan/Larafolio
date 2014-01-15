@section('content')
<div class="box inverse">
    <header>
        <div class="icons">
            <i class="fa fa-folder"></i>
        </div>
        <h5>All Categories</h5>
    </header>
    <div class="body">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Name</th>
                <th>Num. Projects</th>
                <th>Action</th>
            </tr>
            @if(count($categories) == 0)
                <tr>
                    <td colspan="3">No categories yet!</td>
                </tr>
            @endif
            @foreach($categories as $category)
                <tr>
                    {{ Form::open(array('route' => array('admin.category.update', $category->id), 'method' => 'put', 'style' => 'display: inline;')) }}
                    <td>{{ Form::text('title', $category->title, array('class' => 'form-control')) }}</td>
                    <td>{{ $category->posts()->count() }}</td>
                    <td>
                        {{ Form::submit('Save', array('class' => 'btn btn-info')) }}
                        {{ Form::close() }}
                        
                        {{ Form::open(array('route' => array('admin.category.destroy', $category->id), 'method' => 'delete', 'style' => 'display: inline;')) }}
                        {{
                            Form::submit(
                                'Delete',
                                array('class' => 'btn btn-danger', 'data-method' => 'delete', 'data-confirm' => 'Are you sure you want to delete this category?')
                            )
                        }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            <tr>
                {{ Form::open(array('route' => array('admin.category.store'), 'method' => 'post', 'style' => 'display: inline;')) }}
                <td colspan="2">{{ Form::text('title', Input::old('title'), array('class' => 'form-control', 'placeholder' => 'Category name')) }}</td>
                <td><input type="hidden" name="projects" value="1" />{{ Form::submit('Create', array('class' => 'btn btn-success')) }}</td>
                {{ Form::close() }}
            </tr>
        </table>
    </div>
</div>
@stop