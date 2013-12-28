@foreach(Cache::get('menu-items') as $item)
    <li{{ Request::is(substr($item['link'], 1).'*') ? ' class="active"' : '' }}><a href="{{ $item['link'] }}"><span class="glyphicon glyphicon-{{ $item['icon'] }}"></span> {{ $item['title'] }}</a></li>
@endforeach