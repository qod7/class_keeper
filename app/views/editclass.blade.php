@extends('base')

@section('title')
	Edit Class
@endsection

@section('content')
	<div class="col-xs-8 col-xs-offset-2">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<span>Edit Class</span>
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
				<form id="defaultForm" method="post" action="{{ URL::route('saveclass', $class->id) }}" class="form-horizontal">
					<fieldset>
						<legend>Edit Class</legend>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="contact_no">School Name:</label>
							<div class="col-sm-8">
								<input type="text" name="totalstudents" class="form-control" value="{{ $class->school->name }}" disabled/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label" for="contact_no">Grade:</label>
							<div class="col-sm-8">
								<input type="text" name="totalstudents" class="form-control" value="{{ $class->grade }}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label" for="contact_no">Total Students:</label>
							<div class="col-sm-8">
								<input type="text" name="totalstudents" class="form-control" value="{{ $class->totalstudents }}"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label" for="contact_no">Routine:</label>
							<div class="col-sm-8">
								<textarea class="form-control" style="height:200px;" name="routine">{{$class->routine}}</textarea>
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