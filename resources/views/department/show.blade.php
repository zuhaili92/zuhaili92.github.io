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
<h1 class="page-header">List Department</h1>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>#</th>
			<th>Department</th>
			<th>Date and Time</th>
			<th>Action</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>#</th>
			<th>Department</th>
			<th>Date and Time</th>
			<th>Action</th>
		</tr>
	</tfoot>
	<tbody>
		@php ($no=1)
		@foreach($departments as $department)
		<tr>
			<td>{{$no}}</td>
			<td>{{$department->department_name}}</td>
			<td>{{$department->created_at->format('l jS \\of F Y h:i:s A')}}</td>
			<td>
				<div class="col-sm-8">
					<div class="col-sm-4">
						<a href="/edit-department/{{$department->id}}"><button class="btn btn-warning"> Edit </button></a>
					</div>
					<div class="col-sm-4">
					<form method="POST" action="/delete-department/{{$department->id}}" onsubmit="return confirmDelete()">
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
			var result = confirm('Are you sure you want to delete this department?');

			if (result) {
				return true;
			} else {
				return false;
			}
		}

	</script>
	@endsection