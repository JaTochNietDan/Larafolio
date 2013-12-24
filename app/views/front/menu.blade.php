@foreach(Cache::get('menu-items') as $item)
    <li{{ Request::is(substr($item['link'], 1).'*') ? ' class="active"' : '' }}><a href="{{ $item['link'] }}"><i class="{{ $item['icon'] }}"></i> {{ $item['title'] }}</a></li>
@endforeach