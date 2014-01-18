@section('content')
<div class="col-lg-3">
    <div class="panel panel-default">				
        <div class="panel-heading">
            <span class="glyphicon glyphicon-briefcase"></span>
            {{ $project->title }}
        </div>
    
        <div class="panel-body">
            <b>Latest Release: </b>{{ $latest ? '<a class="releasenav" href="'.route('project.release.show', array($project->category->link, $project->link, $latest->name)).'">'.$latest->name.'</a>' : 'None' }}<br />
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
    @if(count($images) > 0)
        <div class="panel panel-default">				
            <div class="panel-heading">
                <span class="glyphicon glyphicon-picture"></span>
                Preview
            </div>
        
            <div class="panel-body">
                <a class="fancybox" href="/downloads/projects/{{ $project->link }}/images/{{ $images[0] }}">
                    <img src="/downloads/projects/{{ $project->link }}/images/{{ $images[0] }}" style="max-width: 100%" />
                </a>
            </div>
        </div>
    @endif
</div>
<div class="col-lg-6">
    <ul class="nav nav-tabs" style="" id="tablist">
        <li{{ Request::is('project/'.$project->category->link.'/'.$project->link) ? ' class="active"' : '' }}>
            <a href="{{ route('project', array($project->category->link, $project->link)) }}" class="projnav">Description</a>
        </li>
        <li{{ Request::is('project/'.$project->category->link.'/'.$project->link.'/release*') ? ' class="active"' : '' }}>
            <a href="{{ route('project.release.index', array($project->category->link, $project->link)) }}" class="projnav">Releases</a>
        </li>
        @if(count($images) > 0)
            <li{{ Request::is('project/'.$project->category->link.'/'.$project->link.'/images') ? ' class="active"' : '' }}>
                <a href="{{ route('project.images', array($project->category->link, $project->link)) }}" class="projnav">Images</a>
            </li>    
        @endif
    </ul>
    <div class="panel-fix panel-default">				
    
        <div class="panel-body" id="projdesc">
            <div id="projdescinner">
            @if(Request::is('project/'.$project->category->link.'/'.$project->link))
                {{ $project->description }}
            @elseif(Request::is('project/'.$project->category->link.'/'.$project->link.'/release'))
                <ul>
                @foreach($project->releases()->orderBy('created_at', 'DESC')->get() as $release)
                    <li>
                        <a class="releasenav" href="{{ route('project.release.show', array($project->category->link, $project->link, $release->name)) }}">{{ $release->name }}</a>
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
            @elseif(Request::is('project/'.$project->category->link.'/'.$project->link.'/images'))
                @foreach($images as $image)
                    <div class="col-lg-4">
                        <a class="fancybox" href="/downloads/projects/{{ $project->link }}/images/{{ $image }}">
                            <img src="/downloads/projects/{{ $project->link }}/images/{{ $image }}" style="max-width: 100%" />
                        </a>
                    </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
    @if(Cache::has('disqus'))
    <div class="panel panel-default">				
        <div class="panel-heading">
            <span class="glyphicon glyphicon-comment"></span>
            Comments
        </div>
    
        <div class="panel-body">
            <div id="disqus_thread"></div>
            <script type="text/javascript">
            var disqus_shortname = '{{ Cache::get('disqus') }}';
            var disqus_identifier = 'project_{{ $project->id }}';

            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
        </div>
    </div>
    @endif
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

@section('scripts')
    <script type="text/javascript" src="/front/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="/front/js/project.js"></script>
@stop

@section('styles')
    <link rel="stylesheet" href="/front/css/jquery.fancybox.css" type="text/css" media="screen" />
@stop