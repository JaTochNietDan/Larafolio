@if(Cache::has('widgets'))
    @foreach(Cache::get('widgets') as $widget)
    <div class="row-right">
        <div class="panel panel-default">				
            <div class="panel-heading">
                <span class="glyphicon glyphicon-{{ $widget['icon'] }}"></span>
                {{ $widget['title'] }}
            </div>
        
            <div class="panel-body">
                @if($widget['type'] === 'custom')
                    {{ $widget['content'] }}
                @else
                    @include('front.widgets.'.$widget['type'])
                @endif
            </div>
        </div>
    </div>
    @endforeach
@endif