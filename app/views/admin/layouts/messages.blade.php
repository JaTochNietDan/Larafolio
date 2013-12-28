@if($errors->has())
    <div class="row" style="margin-top: 10px;">
		<div class="col-lg-12">
            <div class="alert alert-danger">
            <b>Errors: </b>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </div>
        </div>
    </div>
@endif

@if(Session::get('success'))
    <div class="row" style="margin-top: 10px;">
		<div class="col-lg-12">
            <div class="alert alert-success">
            <b>Success: </b> {{ Session::get('success') }}
            </div>
        </div>
    </div>
@endif