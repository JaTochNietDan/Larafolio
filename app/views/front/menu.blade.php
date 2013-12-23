@foreach(Cache::get('menu-items') as $item)
    <li{{ Route::is('') ? ' class="active"' : '' }}><a href="{{ $item['link'] }}"><i class="{{ $item['icon'] }}"></i> {{ $item['title'] }}</a></li>
@endforeach