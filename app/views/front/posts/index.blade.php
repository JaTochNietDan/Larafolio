@section('content')
    @if(count($posts) == 0)
        There are no posts yet!    
    @else
        @foreach($posts as $post)
            <h2 class="title">{{ link_to_action('PostController@show', $post->title, array($post->category->link, $post->link)) }}</h2>
            <em>in {{ $post->category->title }} at {{ $post->created_at }}</em>
            <p></p><p>{{ $post->content }}</p>
        @endforeach
    @endif
@stop