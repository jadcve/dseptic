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

        {!! Html::style('assets/css/style.css') !!}
        {!! Html::style('assets/css/animate.css') !!}
        {!! Html::style('assets/css/font-awesome/font-awesome.css') !!}
        {!! Html::style('assets/css/plugins/iCheck/custom.css') !!}

        {!! HTML::script('assets/js/plugins/metisMenu/jquery.metisMenu.js') !!}
        {!! HTML::script('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') !!}
        {!! HTML::script('assets/js/plugins/flot/jquery.flot.js') !!}
        {!! HTML::script('assets/js/plugins/flot/jquery.flot.tooltip.min.js') !!}
        {!! HTML::script('assets/js/plugins/flot/jquery.flot.resize.js') !!}
        {!! HTML::script('assets/js/plugins/flot/jquery.flot.pie.js') !!}
        {!! HTML::script('assets/js/plugins/flot/jquery.flot.time.js') !!}


        <!-- Custom and plugin javascript -->
        {!! HTML::script('assets/js/plugins/pace/pace.min.js') !!}
        {!! HTML::script('assets/js/demo/flot-demo.js') !!}

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
                    <a class="navbar-brand" href="/DSeptic/admin/home">Dseptic</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li><a href="/DSeptic/admin/home">Home</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ticket<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/DSeptic/admin/ticket/create">Create Ticket</a></li>
                                <li><a href="/DSeptic/admin/ticket">List Ticket</a></li>
                                <li><a href="/DSeptic/admin/ticket_rejected">List Ticket Rejected</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">User<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/DSeptic/admin/auth/register">Create User</a></li>
                                <li><a href="/DSeptic/admin/user_list">List User</a></li>
                            </ul>
                        </li>
                        <!--<li><a href="/DSeptic/home">Ticket</a></li>-->
                        <!--                        <li><a href="/DSeptic/home">Administrator</a></li>
                                                <li><a href="/DSeptic/home">User</a></li>-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/DSeptic/admin/message_list" style="padding-bottom: 34px;"><span style="float: left;color: #337AB7;margin-right: 10px;" class="glyphicon glyphicon-envelope"></span><span id="cantidadmensaje" style="margin-top: -3.5px;float: left;">({{ $cantidad }})</span></a></li>
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
        <div id="wrapper">
            <div style="width: 33%;float: left;margin-left: 20px;margin-top: 20px;" class="row  border-bottom white-bg dashboard-header">
                <div style="width: 100%;">
                    <h2>Welcome {{ Auth::user()->name }}</h2>
                    <small>You have {{ $cantidad }} new messages.</small>
                    <ul class="list-group clear-list m-t">
                        <?php $contmessage = 1; ?>
                        @foreach ($message as $mess)
                        <?php $contenidomensaje = explode("#", $mess->CONTENT); ?>
                        <li class="list-group-item">
                            <a href="/DSeptic/admin/ticket/<?php echo $contenidomensaje[1]; ?>/edit">
                            <span class="pull-right" >
                                {{ $mess->CONTENT }}
                            </span>
                            <span class="pull-right" style="margin-right: 20px;">
                                {{ $mess->usermessage->name }}
                            </span>

                            <span class="label label-info">{{ $contmessage }}</span> 
                            </a>
                        </li>
                        <?php $contmessage++; ?>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="page-wrapper" class="gray-bg" style="float: left;width: 60%;margin-left: 0px;">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="ibox float-e-margins">

                                <div class="ibox-content">

                                    <div class="flot-chart">
                                        <div class="flot-chart-content" id="flot-line-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        {!! Html::script('assets/js/bootstrap.min.js') !!}

        <script type="text/javascript">
            $(document).ready(function () {
                //                actualizar_buzon();
                setInterval('actualizar_buzon()', 6000);
//                var xaxisLabel = $("<div class='axisLabel xaxisLabel'></div>").text("My X Label").appendTo($('#flot-line-chart'));
//
//                var yaxisLabel = $("<div class='axisLabel yaxisLabel'></div>").text("Response Time (ms)").appendTo($('#flot-line-chart'));
//                yaxisLabel.css("margin-top", yaxisLabel.width() / 2 - 20);
            });

            function  actualizar_buzon() {
                var securitytoken = $('meta[name=token_ajax]').attr('content');
                $.ajax({
                    url: '/DSeptic/admin/message_update',
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