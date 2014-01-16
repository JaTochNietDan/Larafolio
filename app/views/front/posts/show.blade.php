@section('content')
<div class="col-lg-9">
    <div class="panel panel-default">				
        <div class="panel-heading">
            <span class="glyphicon glyphicon-list"></span>
            {{ link_to_action('PostController@show', $post->title, array($post->category->link, $post->link)) }}
            <em>
                in {{ link_to_action('PostController@listcategory', $post->category->title, $post->category->link) }}
                {{ $post->created_at->format(Cache::get('date-format')) }}
            </em>
        </div>
    
        <div class="panel-body">
            <p></p><p>{{ $post->content }}</p>
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
            var disqus_identifier = 'post_{{ $post->id }}';

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

@section('title')
    {{ $post->title }}
@stop

@section('breadcrumb')
    <li><a href="{{ route('blog') }}">Blog</a></li>
    <li><a href="{{ route('blog.category', $post->category->link) }}">{{ $post->category->title }}</a></li>
    <li class="active">{{ $post->title }}</li>
@stop