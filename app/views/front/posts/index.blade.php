@section('content')
<div class="col-lg-9">
@if(count($posts) == 0)
    There are no posts yet!    
@else
    @foreach($posts as $post)
    <div class="panel panel-default">				
        <div class="panel-heading">
            <span class="glyphicon glyphicon-list"></span>
            <a href="{{ route('blog.post', array($post->category->link, $post->link)) }} ">{{ $post->title }}</a>
            <em>
                in {{ link_to_action('PostController@listcategory', $post->category->title, $post->category->link) }}
                {{ $post->created_at->format(Cache::get('date-format')) }}
            </em>
        </div>
    
        <div class="panel-body">
            <p>{{ $post->excerpt }}</p>
            <div class="pull-right">
                <a href="{{ route('blog.post', array($post->category->link, $post->link)) }}" class="btn btn-sm btn-primary">Continue Reading</a>
            </div>
        </div>
    </div>
    @endforeach
    {{ $posts->links('front.posts.page') }}
@endif
</div>
@stop

@section('breadcrumb')
    @if(!empty($category))
        <li><a href="{{ route('blog') }}">Blog</a></li>
        <li class="active">{{ $category->title }}</li>
    @else
        <li class="active">Blog</li>
    @endif
@stop

@section('title')
    {{ Cache::get('site-title') }} - Blog{{ !empty($category) ? ' -> '.$category->title : '' }} (page {{ $posts->getCurrentPage() }})
@stop