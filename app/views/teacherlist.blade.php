@extends('base')

@section('title')
	Teacher List
@endsection

@section('content')

<div class="row">
	<div class="col-xs-16">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-table"></i>
					<span>Teacher List for {{ $school->name }}</span>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding">
				@if(count($teachers) == 0)
				<p>No teachers</p>
				@else

				<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
					<thead>
						<tr>
							<th>ID</th>
							<th>Teacher Name</th>
							<th>Teacher Username</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						@foreach($teachers as $teacher)
						<tr>
							<td>{{ $teachers->id }}</td>
							<td>{{ $teachers->name }}</td>
							<td>{{ $teachers->username }}</td>
							<td><a href="">Delete</a> </td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection