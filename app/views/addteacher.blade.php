@extends('base')

@section('title')
	Add A Teacher
@endsection

@section('content')
	<div class="col-xs-8 col-xs-offset-2">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<span>Add Teacher</span>
				</div>
				<div class="box-icons">
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				@if(isset($errors) && count($errors) >0)
					<div class="alert alert-danger">
						<ul>
							@foreach($errors as $error)
								<li>
									{{ $error }}
								</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form id="defaultForm" method="post" action="{{ URL::route('saveteacher') }}" class="form-horizontal">
					<fieldset>
						<legend>Fill the following</legend>
						<div class="form-group">
							<label class="col-sm-3 control-label">Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="name" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Username</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="username" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">School Id</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="schoolid" />
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-8">
								<button class="btn btn-primary btn-label-left" type="submit">Submit</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection

