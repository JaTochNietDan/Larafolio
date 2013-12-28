@if($errors->has())
    <div class="row">
        <div class="col-lg-12">
			<div class="alert alert-danger">
			<b>Error</b>
			@foreach($errors->all() as $error)      
				<li>{{ $error }}</li>
			@endforeach
			</div>
        </div>
    </div>
@endif