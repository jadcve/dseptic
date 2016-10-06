@extends('layout')
@section('content')
<body class="gray-bg">
<div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h3 class="logo-name">DSeptic</h3>

            </div>
            <h3>Welcome to DSeptic</h3>
           
            <p>Login in.</p>
            <!--<form class="m-t" role="form" action="index.html">-->
                {!! Form::open(['route' => 'auth/login', 'class' => 'form']) !!}
                <div class="form-group">
                    
                    {!! Form::email('email', '', ['class'=> 'form-control','placeholder'=>'name']) !!}
                </div>
                <div class="form-group">
                    
                    {!! Form::password('password', ['class'=> 'form-control','placeholder'=>'password']) !!}
                </div>
                
                {!! Form::submit('login',['class' => 'btn btn-primary']) !!}

                <a href="#"><small>Forgot password?</small></a>
                
            <!--</form>-->
           
        </div>
    </div>
</body>




@endsection