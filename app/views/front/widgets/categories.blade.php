@foreach(Category::all() as $category)
    @if($category->posts()->first())
        {{ link_to(route('blog.category', $category->link), $category->title) }}<br />
    @endif
@endforeach