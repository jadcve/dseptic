<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="token_ajax" content="{!! csrf_token() !!}"/>
        <title>DSetic</title>
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! HTML::script('assets/js/bootstrap.js') !!}
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
                    <a class="navbar-brand" href="/DSeptic/operator/home">Dseptic</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/DSeptic/operator/home">Home</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ticket<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/DSeptic/operator/ticket/list">List All Ticket</a></li>
                                <li><a href="/DSeptic/operator/ticket/list_assigned">List Assigned Ticket</a></li>
                                <li><a href="/DSeptic/operator/ticket/list_accepted">List Accepted Ticket</a></li>
                                <li><a href="/DSeptic/operator/ticket/list_process">List Process Ticket</a></li>
                                <li><a href="/DSeptic/operator/ticket/list_closed">List Closed Ticket</a></li>
                            </ul>
                        </li>
<!--                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">User <span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/DSeptic/operator/user_info">User Data</a></li>
                            </ul>
                        </li>-->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/DSeptic/operator/message_list"><span style="float: left;color: #337AB7;margin-right: 10px;" class="glyphicon glyphicon-envelope"></span><span id="cantidadmensaje" style="margin-top: -3.5px;float: left;">({{ $cantidad }})</span></a></li>
                        @if (Auth::guest())
                        <li><a href="{{route('auth/login')}}">Login</a></li>
                        <li><a href="{{route('auth/register')}}">Register</a></li>
                        @else
                        <li>
                            <a href="/DSeptic/operator/user_info">{{ Auth::user()->name }}<span class="glyphicon glyphicon-user"></span></a>
                        </li>
                        <li><a href="{{route('auth/logout')}}">Logout</a></li>

                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row  border-bottom white-bg dashboard-header">

            <div class="col-sm-3">
                <h2>Welcome {{ Auth::user()->name }}</h2>
                <small>You have {{ $cantidad }} new messages.</small>
                <ul class="list-group clear-list m-t">
                    <?php $contmessage = 0; ?>
                    @foreach ($message as $mess)
                    <li class="list-group-item">
                        <span class="pull-right">
                            {{ $mess->CONTENT }}
                        </span>
                        <span class="label label-info">{{ $contmessage }}</span> 
                    </li>
                    <?php $contmessage++; ?>
                    @endforeach
                </ul>
            </div>
        </div>
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
        {!! Html::script('assets/js/jquery-1.10.2.js') !!}
        {!! Html::script('assets/js/bootstrap.min.js') !!}

        <script type="text/javascript">
            $(document).ready(function () {
                setInterval('actualizar_buzon()', 60000);
            });

            function  actualizar_buzon() {
                var securitytoken = $('meta[name=token_ajax]').attr('content');
                $.ajax({
                    url: '/DSeptic/operator/message_updatecliente',
                    type: "post",
                    data: {_token: securitytoken},
                    success: function (data) {
                        $('#cantidadmensaje').html(data);
                    }
                });
            }
        </script>
    </body>
</html>