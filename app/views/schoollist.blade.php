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
							<td><a href="{{ URL::to('/school/delete/'.$school->id) }} ">Delete</a> 
								| <a href="{{ URL::to('/school/listteacher/'.$school->id) }}">View Teachers</a> 
								| <a href="{{ URL::to('/school/listclasses/'.$school->id) }}">View Classes</a></td>
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