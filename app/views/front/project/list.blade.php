@section('content')
<div class="col-lg-9">
    <div class="panel panel-default">				
        <div class="panel-heading">
            <span class="glyphicon glyphicon-briefcase"></span>
            Projects in {{ $category->title }}
        </div>
    
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Short Description</th>
                    <th>Downloads</th>
                </tr>
                @if($category->projects()->count() == 0)
                    <tr><td colspan="3">There are no projects in this category yet!</td></tr>
                @endif
                @foreach($category->projects as $p)
                <tr>
                    <td><a href="{{ route('project', array($category->link, $p->link)) }}">{{ $p->title }}</a></td>
                    <td>{{ $p->excerpt }}</td>
                    <td>Coming soon...</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@stop

@section('breadcrumb')
    <li><a href="{{ route('project.index') }}">Project</a></li>
    <li class="active">{{ $category->title }}</li>
@stop