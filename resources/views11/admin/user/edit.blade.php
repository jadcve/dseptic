@extends('admin.layout')
@section('content')

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h3 class="logo-name">DSeptic</h3>

            </div>
            <p>Update account.</p>
            <!--<form class="m-t" role="form" action="login.html">-->
            {!! Form::open(array('url' => '/admin/user_update', 'id'=>'form_updateuser')) !!}
            <div class="form-group">
                <label>Name</label>
                {!! Form::input('text', 'name', $user->name,  ['class'=> 'form-control', 'placeholder'=>'name']) !!}
            </div>
            <div class="form-group">
                <label>Email</label>
                {!! Form::email('email',  $user->email, ['class'=> 'form-control','placeholder'=>'email']) !!}
            </div>
            <div class="form-group" style="float: left;width: 100%;">
                <label style="float: left;margin-right: 20px;margin-top: 10px;">Phone Company</label>
                
                <select style="width: 235px;float: left;" class="form-control" name="ID_PHONE_COMPANY" id="ID_PHONE_COMPANY">
                    <?php
                    foreach ($phonecompany as $company) {
                        ?>
                    <option value="{!! $company->id!!}" <?php if($user->ID_PHONE_COMPANY == $company->id){ ?>selected=""<?php } ?> >{!!$company->PHONE_COMPANY!!}</option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Phone</label>
                {!! Form::input('text', 'PHONE', $user->PHONE,  ['class'=> 'form-control', 'placeholder'=>'Phone']) !!}
            </div>
            <div class="form-group">
                <label>New Password</label>
                {!! Form::password('password', ['class'=> 'form-control','placeholder'=>'password', 'id' => 'new_password']) !!}
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                {!! Form::password('password_confirmation', ['class'=> 'form-control', 'placeholder'=>'password confirmation', 'id' => 'confir_password'])!!}
            </div>
            {!! Form::hidden('id', $user->id, array('id' => 'userid')) !!}

            <button type="submit" class="btn btn-primary block full-width m-b">Update</button>
            {!! Form::close() !!}

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
  


</body>

@endsection