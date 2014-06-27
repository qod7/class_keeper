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

				<p style="margin-top:10px;">
					<button class="btn btn-lg btn-primary" type="submit">Signup</button>
				</p>

			</fieldset>
		{{ Form ::close() }}
	</div>
@endsection