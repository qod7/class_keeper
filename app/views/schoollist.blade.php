@extends('base')

@section('title')
	School List
@endsection

@section('content')

<div class="row">
	<div class="col-xs-16">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-table"></i>
					<span>School List</span>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding">
				@if(count($schools) == 0)
				<p>No schools</p>
				@else

				<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
					<thead>
						<tr>
							<th>ID</th>
							<th>School Name</th>
							<th>Headmaster Name</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						@foreach($schools as $school)
						<tr>
							<td>{{ $school->id }}</td>
							<td>{{ $school->name }}</td>
							<td>{{ $school->getHeadMasterName() }}</td>
							<td>Delete | Set Headmaster</td>
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