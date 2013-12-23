@if($errors->has())
    <div class="row">
		<div class="span12">
		@foreach($errors->all() as $error)
            <div class="alert alert-error">
            <b>Error: </b>{{ $error }}
            </div>
        @endforeach
        </div>
    </div>
@endif