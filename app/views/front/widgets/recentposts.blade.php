@foreach(Post::orderBy('created_at')->get() as $post)
    {{ link_to(route('blog.post', array($post->category->link, $post->link)), $post->title) }}...<br />
@endforeach