@extends('layouts.master')

@section('content')
<h1 class="page-header">Edit Complaint</h1>
@include('partials.errors')
<form class="form-horizontal" role="form" method="POST" action="/edit-complaint/{{$complaint->id}}">
{!! method_field('patch') !!}
	{{ csrf_field() }}

	<div class="form-group {{ $errors->has('complaint') ? ' has-error' : '' }}">
		<label for="complaint" class="col-md-4 control-label">Complaints</label>

		<div class="col-md-6">
			<textarea name="complaint" class="form-control" cols="10">{{$complaint->complaint}}</textarea>
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