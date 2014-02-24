@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box inverse">
            <header>
                <div class="icons">
                    <i class="fa fa-flag"></i>
                </div>
                <h5>Downloads over the last 24 hours</h5>
            </header>
            <div class="body">
                <div class="row" style="margin-bottom: 10px;">
                    
                    <div class="col-lg-3">
                        {{ Form::open(array('route' => 'admin.dash.post', 'class' => 'form-inline')) }}
                        <div class="form-group">
                            <select name="time" class="form-control">
                                <option value="today"{{ Input::get('time') == 'today' ? ' selected' : '' }}>Today</option>
                                <option value="first day of this month"{{ Input::get('time') == 'first day of this month' ? ' selected' : '' }}>This Month</option>
                                <option value="first day of this year"{{ Input::get('time') == 'first day of this year' ? ' selected' : '' }}>This Year</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="unique"{{ Input::get('unique') ? ' checked' : '' }}> Unique (by IP)
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Filter" class="btn btn-info" />
                        </div>
                        {{ Form::close() }}
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-6">
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
                    <div class="col-lg-6">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Downloads</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $download)
                                    <tr>
                                        <td>
                                            <a target="_blank" href="{{ route('project', array($download['d']->file->release->project->category->link, $download['d']->file->release->project->link)) }}">
                                                {{ $download['d']->file->release->project->title }}
                                            </a>
                                        </td>
                                        <td>{{ $download['total'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop