@extends('base')

@section('title')
	Login or Signup
@endsection

@section('content')
<style>
.img-center{
	display: block;    
	margin-left: auto;    
	margin-right: auto;
}
</style>

<div class="row">
	<div class="col-sm-4 col-sm-offset-4" style="margin-top:60px;">
		
		<div class="well well-lg" style="padding:40px;">
			@if(isset($message))
				<div class="row">
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				</div>
			@endif

			<div class="row" style="width:98%; margin:auto;">
				<img src="{{ URL::asset('img/profile.png') }}" class="img-circle img-center" height="80px">
				{{ Form::open(array('route' => 'loginuser','class' => 'form-horizontal'))}}
					<fieldset>
						<div class="control-group" style="margin-top:50px;">
							<div class="controls">
								{{ Form::text('username', null,array('class' => 'form-control input-xlarge', 'required', 'placeholder' => 'Username')) }}
							</div>
						</div>

						<div class="control-group" style="margin-top:5px;">
							<div class="controls">
								{{ Form::password('password',array('class' => 'form-control input-xlarge', 'required', 'placeholder' => 'Password')) }}
							</div>
						</div>

						<p style="margin-top:10px;">
							<button class="btn btn-lg btn-success" type="submit" style="width:100%;">Login</button>
						</p>

						<h4 >
							<a href="{{ URL::route('signup') }}">Signup</a>
						</h4>
					</fieldset>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endsection