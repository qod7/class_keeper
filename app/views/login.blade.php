<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Classkeeper</title>

    <!-- Core CSS - Include with every page -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h2><a href="{{ URL::route('home') }}">ClassKeeper</a> Admin</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                @if(isset($message))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @endif
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(array('route' => 'loginuser','class' => 'form'))}}
                            <fieldset>
                                <div class="form-group">
                                    {{ Form::text('username', null,array('class' => 'form-control input-xlarge', 'required', 'placeholder' => 'Username')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::password('password',array('class' => 'form-control input-xlarge', 'required', 'placeholder' => 'Password')) }}
                                </div>
                                
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div> -->

                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Scripts - Include with every page -->
    <script src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    <!--  Admin Scripts - Include with every page -->
    <script src="{{ URL::asset('js/sb-admin.js') }}"></script>

</body>
</html>
