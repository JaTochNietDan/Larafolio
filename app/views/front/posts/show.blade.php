@section('content')
    <h2>{{ link_to_action('PostController@show', $post->title, array($post->category->link, $post->link)) }}</h2>
    <em>
        in {{ link_to_action('PostController@listcategory', $post->category->title, $post->category->link) }}
        at {{ $post->created_at }}
    </em>
    <p></p>
    <p>
        {{ $post->content }}
    </p>
@stop