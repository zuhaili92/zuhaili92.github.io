@extends('layouts.master')

@section('content')
<h1 class="page-header">Department</h1>
@include('partials.errors')
<form class="form-horizontal" role="form" method="POST" action="/create-department">
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('department_name') ? ' has-error' : '' }}">
		<label for="department_name" class="col-md-4 control-label">Department</label>

		<div class="col-md-6">
			<input id="department_name" type="text" class="form-control" name="department_name" required autofocus>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				Submit
			</button>
		</div>
	</div>
</form>

@endsection