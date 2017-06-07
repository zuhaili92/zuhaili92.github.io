@if(count($errors))
<div class="form-group m-t-20">
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
</div>
@endif

@if(session()->has('message'))
<div class="form-group m-t-20">
	<div class="alert alert-success">
		{{ session()->get('message') }}	
	</div>
</div>
@endif