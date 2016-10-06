<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DSeptic</title>
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/style.css') !!}
    {!! Html::style('assets/css/animate.css') !!}
    {!! Html::style('assets/css/font-awesome/font-awesome.css') !!}
    {!! Html::style('assets/css/plugins/iCheck/custom.css') !!}
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
     	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
		    <div class="navbar-header">
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			    <span class="sr-only">Toggle Navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">DSeptic</a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav">
			    	<li><a href="/DSeptic/home">Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				    @if (Auth::guest())
				        <li><a href="{{route('auth/login')}}">Login</a></li>
						<!--<li><a href="{{route('auth/register')}}">Register</a></li>-->
				    @else
		                <li>
		                    <a href="#">{{ Auth::user()->name }}</a>
		                </li>
		                <li><a href="{{route('auth/logout')}}">Logout</a></li>
		                
			        @endif
				</ul>
			</div>
		</div>
	</nav>
    <div class="container">
               @if (Session::has('errors'))
		    <div class="alert alert-warning" role="alert">
			<ul>
	            <strong>Oops! Something went wrong : </strong>
			    @foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
    </div>
    <div class="container" style="position: absolute;left: 10%;top: 80px;z-index: 1000;text-align: center;">
               @if (isset($errorslog) && $errorslog !="")
                
		    <div class="alert alert-warning" role="alert">
			{!! $errorslog !!}
		    </div>
		@endif
    </div>

    @yield('content')
    <!-- Scripts -->
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/jquery-1.10.2.js') !!}
    {!! Html::script('assets/js/plugins/iCheck/icheck.min.js') !!}
    
</body>
</html>