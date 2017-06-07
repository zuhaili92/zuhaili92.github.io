@extends('layouts.master')

@section('content')
<h1 class="page-header">Dashboard</h1>
@include('partials.errors')
<form class="form-horizontal" role="form" method="POST" action="{{ route('profile') }}">
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		<label for="name" class="col-md-4 control-label">Name</label>

		<div class="col-md-6">
			<input id="name" type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required autofocus>
		</div>
	</div>

	<div class="form-group{{ $errors->has('card_id') ? ' has-error' : '' }}">
		<label for="card_id" class="col-md-4 control-label">Card ID</label>

		<div class="col-md-6">
			<input id="card_id" type="text" class="form-control" name="card_id" value="{{ auth()->user()->id_card }}" required autofocus>
		</div>
	</div>

	<div class="form-group{{ $errors->has('tel_no') ? ' has-error' : '' }}">
		<label for="tel_no" class="col-md-4 control-label">Telephone No</label>

		<div class="col-md-6">
			<input id="tel_no" type="text" class="form-control" name="tel_no" value="{{ auth()->user()->tel_no }}" required autofocus>
		</div>
	</div>

	<div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
		<label for="department" class="col-md-4 control-label">Department</label>

		<div class="col-md-6">
			<select class="form-control" id="department" name="department" required>
				@foreach($departments as $department)
				<option value="{{$department->id}}" <?php if(auth()->user()->department == $department->id) { echo "selected"; } ?>>{{$department->department_name}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				Update
			</button>
		</div>
	</div>
</form>

@endsection