@section('content')
<div class="col-lg-9">
@if(count($posts) == 0)
    There are no posts yet!    
@else
    @foreach($posts as $post)
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
            <p></p><p>{{ $post->excerpt }}</p>
        </div>
    </div>
    @endforeach
@endif
</div>
@stop