@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="box inverse">
            <header>
                <div class="icons">
                    <i class="fa fa-download"></i>
                </div>
                <h5>Downloads over the last 24 hours</h5>
            </header>
            <div class="body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>Downloads</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($countries as $name => $downloads)
                            <tr>
                                <td>{{ $name }}</td>
                                <td>{{ $downloads }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop