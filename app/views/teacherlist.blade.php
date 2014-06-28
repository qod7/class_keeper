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
							<td>{{ $teacher->id }}</td>
							<td>{{ $teacher->name }}</td>
							<td>{{ $teacher->username }} @if($teacher->role == 1) (Headmaster)@endif</td>
							<td><a href="{{ URL::to('/school/deleteteacher/'.$teacher->id) }}">Delete</a> 
								| @if($teacher->role == 0)<a href="{{ URL::to('/school/makeheadmaster/'.$teacher->id) }}">Make Headmaster</a> @endif</td>
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