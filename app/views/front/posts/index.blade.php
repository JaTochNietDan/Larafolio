@section('content')
    @if(count($posts) == 0)
        There are no posts yet!    
    @else
        @foreach($posts as $post)
            <h2 class="title">{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        @endforeach
    @endif
@stop