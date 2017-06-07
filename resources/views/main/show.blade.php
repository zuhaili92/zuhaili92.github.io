@extends('layouts.master')

@section('header')
<link rel="stylesheet" type="text/css" href="/media/css/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="/resources/syntax/shCore.css">
<style type="text/css" class="init">
	
</style>
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.3.min.js">
</script>
<script type="text/javascript" language="javascript" src="/media/js/jquery.dataTables.js">
</script>
<script type="text/javascript" language="javascript" src="/media/js/dataTables.bootstrap.js">
</script>
<script type="text/javascript" language="javascript" src="/resources/syntax/shCore.js">
</script>
<script type="text/javascript" language="javascript" src="/resources/demo.js">
</script>
<script type="text/javascript" language="javascript" class="init">
	
	$(document).ready(function() {
		$('#example').DataTable();
	} );

</script>
@endsection

@section('content')
<h1 class="page-header">List Complaints</h1>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>#</th>
			@if(Auth::user()->roles == "admin")
			<th>Name</th>
			@endif
			<th>Complaint</th>
			<th>Date and Time</th>
			<th>Action</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>#</th>
			@if(Auth::user()->roles == "admin")
			<th>Name</th>
			@endif
			<th>Complaint</th>
			<th>Date and Time</th>
			<th>Action</th>
		</tr>
	</tfoot>
	<tbody>
		@php ($no=1)
		@foreach($complaints as $complaint)
		@if(Auth::user()->roles == "admin")
		<?php $user = \App\User::where('id','=',$complaint->user_id)->first(); ?>
		@endif
		<tr>
			<td>{{$no}}</td>
			@if(Auth::user()->roles == "admin")
			<td>{{$user->name}}</td>
			@endif
			<td>{{$complaint->complaint}}</td>
			<td>{{$complaint->created_at->format('l jS \\of F Y h:i:s A')}}</td>
			<td>
				<div class="col-sm-8">
				@if(Auth::user()->roles != "admin")
					<div class="col-sm-4">
						<a href="/edit-complaint/{{$complaint->id}}"><button class="btn btn-warning"> Edit </button></a>
					</div>
				@endif
					<div class="col-sm-4">
					<form method="POST" action="/delete-complaint/{{$complaint->id}}" onsubmit="return confirmDelete()">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="DELETE" >
						<button type="submit" class="btn btn-danger"> Delete </button>
					</form>
					</div>
				</td>
			</tr>
			@php ($no++)
			@endforeach
		</tbody>
	</table>
	@endsection

	@section('footer')
	<script type="text/javascript">
		function confirmDelete() {
			var result = confirm('Are you sure you want to delete this complaint?');

			if (result) {
				return true;
			} else {
				return false;
			}
		}

	</script>
	@endsection