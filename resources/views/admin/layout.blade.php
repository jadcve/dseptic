<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="token_ajax" content="{!! csrf_token() !!}"/>
        <title>DSeptic</title>
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/bootstrap-datepicker.css') !!}
        {!! HTML::script('assets/js/jquery-2.1.4.min.js') !!}
        {!! HTML::script('assets/js/bootstrap-datepicker.js') !!}
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
     <body class="gray-bg">
         <nav class="navbar navbar-light" style="background-color: #2F4050;">
        
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/DSeptic/admin/home">DSeptic</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/DSeptic/admin/home">Home</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ticket<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/DSeptic/admin/ticket/create">Create Ticket</a></li>
                                <li><a href="/DSeptic/admin/ticket">List Ticket</a></li>
                                <li><a href="/DSeptic/admin/ticket_rejected">List Ticket Rejected</a></li>
                            </ul>
                        </li>
                        <!--<li><a href="/DSeptic/home">Ticket</a></li>-->
                        <!--<li><a href="/DSeptic/home">Administrator</a></li>-->
                        <!--<li><a href="/DSeptic/home">User</a></li>-->
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">User<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/DSeptic/admin/auth/register">Create User</a></li>
                                <li><a href="/DSeptic/admin/user_list">List User</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/DSeptic/admin/message_list"><span style="color: #337AB7;float: left;margin-right: 10px;" class="glyphicon glyphicon-envelope"></span><span id="cantidadmensaje" style="margin-top: -3.5px;float: left;"></span></a></li>
                        @if (Auth::guest())
                        <li><a href="{{route('auth/login')}}">Login</a></li>
                        <li><a href="{{route('auth/register')}}">Register</a></li>
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
        @yield('content')
        <!-- Scripts -->

        {!! Html::script('assets/js/bootstrap.min.js') !!}
        
        <script type="text/javascript">
            $(document).ready(function(){
                setInterval('actualizar_buzon()',60000);
            });
            
            function  actualizar_buzon(){ 
                var securitytoken=$('meta[name=token_ajax]').attr('content');
                $.ajax({
                  url: '/DSeptic/admin/message_update',
                  type: "post",
                  data: {_token: securitytoken},
                  success: function(data){
                    $('#cantidadmensaje').html(data);
                  }
                });      
            }
        </script>
    </body>
</html>