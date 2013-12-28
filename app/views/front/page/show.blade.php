@section('content')
<div class="col-lg-9">
    <div class="panel panel-default">				
        <div class="panel-heading">
            <span class="glyphicon glyphicon-list"></span>
            {{ $page->title }}
        </div>
    
        <div class="panel-body">
            <p></p><p>{{ $page->content }}</p>
        </div>
    </div>
</div>
@stop

@section('breadcrumb')
    <li class="active">Viewing page: {{ $page->title }}</li>
@stop