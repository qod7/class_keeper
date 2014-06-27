@extends('base')

@section('title')
	Signup
@endsection

@section('content')
	<div class="col-sm-4 col-sm-offset-4">
		<h1>Signup</h1>
		{{ Form::open(array('route' => 'signup','class' => 'form-horizontal well well-lg')) }}
			<fieldset>
				@if(isset($signupmessage))
					<div class="alert alert-info">
						{{ $signupmessage }}
					</div>
				@endif
				@if(isset($signuperrors))
					<div class="alert alert-danger">
						<ul>
							@foreach($signuperrors as $error)
								<li>
									{{ $error }}
								</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="control-group">
					<label class="control-label" for="username">Username:</label>
					<div class="controls">
						{{ Form::text('username', null,array('class' => 'form-control input-xlarge', 'required' )) }}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="password">Password:</label>
					<div class="controls">
						{{ Form::password('password',array('class' => 'form-control input-xlarge', 'required')) }}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="repassword">Repassword:</label>
					<div class="controls">
						{{ Form::password('repassword',array('class' => 'form-control input-xlarge', 'required')) }}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="email">Email:</label>
					<div class="controls">
						{{ Form::email('email', null,array('class' => 'form-control input-xlarge', 'required')) }}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="type">Account Type:</label>
					<div class="radio">
						<label>
							{{ Form::radio('type','visitor',true) }} Visitor
						</label>
					</div>

					<div class="radio">
						<label>
							{{ Form::radio('type','guide') }} Guide
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="first_name">First Name:</label>
					<div class="controls">
						{{ Form::text('first_name', null,array('class' => 'form-control input-xlarge', 'required')) }}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="last_name">Last Name:</label>
					<div class="controls">
						{{ Form::text('last_name', null,array('class' => 'form-control input-xlarge', 'required')) }}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="gender">Gender:</label>
					<div class="radio">
						<label>
							{{ Form::radio('gender','male',true) }} Male
						</label>
					</div>

					<div class="radio">
						<label>
							{{ Form::radio('gender','female') }} Female
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="dob">Dob:</label>
					<div class="controls">
						{{ Form::text('dob', null,array('class' => 'form-control input-xlarge', 'required','placeholder' => 'yyyy-mm-dd')) }}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="contact_no">Contact Number:</label>
					<div class="controls">
						{{ Form::text('contact_no', null,array('class' => 'form-control input-xlarge', 'required','placeholder' => 'Your contact Number with country code')) }}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="address">Current Address:</label>
					<div class="controls">
						{{ Form::text('address', null,array('class' => 'form-control input-xlarge', 'required')) }}
					</div>
				</div>

				<p style="margin-top:10px;">
					<button class="btn btn-lg btn-primary" type="submit">Signup</button>
				</p>

			</fieldset>
		{{ Form ::close() }}
	</div>
@endsection