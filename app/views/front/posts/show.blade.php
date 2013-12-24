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
            <p></p><p>{{ $post->excerpt }}</p>
        </div>
    </div>
</div>
@stop