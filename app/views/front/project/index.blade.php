@section('content')
<div class="col-lg-9">
    <div class="panel panel-default">				
        <div class="panel-heading">
            <span class="glyphicon glyphicon-briefcase"></span>
            Project Categories
        </div>
    
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Category</th>
                    <th>Downloads</th>
                </tr>
                @if(count($categories) == 0)
                    <tr>
                        <td colspan="2">No categories here yet!</td>
                    </tr>
                @endif
                @foreach($categories as $c)
                <tr>
                    <td><a href="{{ route('project.category', $c->link) }}">{{ $c->title }}</a></td>
                    <td>{{ number_format($c->projects()->sum('downloads')) }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@stop

@section('breadcrumb')
    <li class="active">Project</li>
@stop

@section('title')
    {{ Cache::get('site-title') }} - Projects
@stop

@section('description')
Projects I've worked on and released to the public.@stop