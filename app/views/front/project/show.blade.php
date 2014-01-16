@section('content')
<div class="col-lg-3">
    <div class="panel panel-default">				
        <div class="panel-heading">
            <span class="glyphicon glyphicon-briefcase"></span>
            {{ $project->title }}
        </div>
    
        <div class="panel-body">
            <b>Latest Release: </b>{{ $latest ? '<a href="'.route('project.release.show', array($project->category->link, $project->link, $latest->name)).'">'.$latest->name.'</a>' : 'None' }}<br />
            <b>Downloads: </b>{{ number_format($project->downloads) }}
        </div>
    </div>
    @if($latest && count($latest->files) > 0)
        <div class="panel panel-default">				
            <div class="panel-heading">
                <span class="glyphicon glyphicon-download"></span>
                Download Latest Release
            </div>
        
            <div class="panel-body">
                @foreach($latest->files as $file)
                    <a href="{{ route('project.release.download', array($project->category->link, $project->link, $latest->name, $file->id)) }}" class="btn btn-success">
                        {{ $file->name }}
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
<div class="col-lg-6">
    <ul class="nav nav-tabs" style="">
        <li{{ Request::is('project/'.$project->category->link.'/'.$project->link) ? ' class="active"' : '' }}>
            <a href="{{ route('project', array($project->category->link, $project->link)) }}">Description</a>
        </li>
        <li{{ Request::is('project/'.$project->category->link.'/'.$project->link.'/release*') ? ' class="active"' : '' }}>
            <a href="{{ route('project.release.index', array($project->category->link, $project->link)) }}">Releases</a>
        </li>
    </ul>
    <div class="panel-fix panel-default">				
    
        <div class="panel-body">
        @if(Request::is('project/'.$project->category->link.'/'.$project->link))
            {{ $project->description }}
        @elseif(Request::is('project/'.$project->category->link.'/'.$project->link.'/release'))
            <ul>
            @foreach($project->releases()->orderBy('created_at', 'DESC')->get() as $release)
                <li>
                    <a href="{{ route('project.release.show', array($project->category->link, $project->link, $release->name)) }}">{{ $release->name }}</a>
                </li>
            @endforeach
            </ul>
        @elseif(Request::is('project/'.$project->category->link.'/'.$project->link.'/release*'))
            <h2>{{ $view_release-> name }}</h2>
            {{ $view_release->changelog }}
            @if(count($view_release->files) > 0)
                <hr>
                <h4>Downloads</h4>
                @foreach($view_release->files as $file)
                    <a href="{{ route('project.release.download', array($project->category->link, $project->link, $view_release->name, $file->id)) }}" class="btn btn-success">
                        {{ $file->name }}
                    </a>
                @endforeach
            @endif
        @endif
        </div>
    </div>
</div>
@stop

@section('breadcrumb')
    <li><a href="{{ route('project.index') }}">Project</a></li>
    <li><a href="{{ route('project.category', $project->category->link) }}">{{ $project->category->title }}</a></li>
    <li>{{ $project->title }}</li>
@stop

@section('title')
    {{ $project->title }}
@stop