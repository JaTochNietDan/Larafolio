@section('content')
    @if(count($posts) == 0)
        There are no posts yet!    
    @else
        @foreach($posts as $post)
            <h2 class="title">
                {{ link_to_action('PostController@show', $post->title, array($post->category->link, $post->link)) }}
            </h2>
            <em>
                in {{ link_to_action('PostController@listcategory', $post->category->title, $post->category->link) }}
                {{ $post->created_at->format(Cache::get('date-format')) }}
            </em>
            <p></p><p>{{ $post->excerpt }}</p>
        @endforeach
    @endif
@stop