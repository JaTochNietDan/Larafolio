@foreach(Category::where('id', '>', 0)->where('projects', '=', 0)->get() as $category)
    {{ link_to(route('blog.category', $category->link), $category->title) }}<br />
@endforeach