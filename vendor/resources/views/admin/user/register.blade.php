@extends('admin.layout')
@section('content')

<body class="gray-bg">

    <div style="margin-bottom: 30px;" class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h3 class="logo-name">DSeptic</h3>

            </div>
            <h3>Register to DSeptic</h3>
            <p>Create account.</p>
            <!--<form class="m-t" role="form" action="login.html">-->
            {!! Form::open(['route' => 'auth/register', 'class' => 'form','style' => 'width: 150%;float: left;margin-left: -25%;']) !!}
            <div class="form-group">
                {!! Form::input('text', 'name', '',  ['class'=> 'form-control', 'placeholder'=>'name']) !!}
            </div>
            <div id="datacustomer" style="display: none;">
                <div class="form-group">
                    {!! Form::input('text', 'LAST_NAME', '',  ['class'=> 'form-control', 'placeholder'=>'last name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::input('text', 'ADDRESS', '',  ['class'=> 'form-control', 'placeholder'=>'Address']) !!}
                </div>
                <div class="form-group">
                    {!! Form::input('text', 'ADDRESS_ALTERNATIVE', '',  ['class'=> 'form-control', 'placeholder'=>'Alternative Address']) !!}
                </div>
                <div class="form-group">
                    {!! Form::input('text', 'PERMIT', '',  ['class'=> 'form-control', 'placeholder'=>'Permit']) !!}
                </div>                
                <div class="form-group">
                    {!! Form::input('text', 'ZIP_CODE', '',  ['class'=> 'form-control', 'placeholder'=>'Zip Code']) !!}
                </div>
            </div>
            <div id="phoneaction" style="display: none;">
                <div class="form-group">
                    {!! Form::input('text', 'PHONE', '',  ['class'=> 'form-control', 'placeholder'=>'Phone']) !!}
                </div>
                <div class="form-group" style="float: left;width: 100%;">
                    <label style="float: left;margin-right: 20px;margin-top: 10px;">Phone Company</label>
                    <select style="width: 235px;float: left;" class="form-control" name="ID_PHONE_COMPANY" id="ID_PHONE_COMPANY">
                        <?php
                        foreach ($phonecompany as $company) {
                            ?>
                            <option value="{!! $company->id!!}">{!!$company->PHONE_COMPANY!!}</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div id="phoneaction2" style="display: none;">
                <div class="form-group">
                    {!! Form::input('text', 'PHONE2', '',  ['class'=> 'form-control', 'placeholder'=>'Phone']) !!}
                </div>
                <div class="form-group">
                    <label>Phone Company</label>
                    <select class="form-control" name="ID_PHONE_COMPANY2" id="ID_PHONE_COMPANY2">
                        <?php
                        foreach ($phonecompany as $company) {
                            ?>
                            <option value="{!! $company->id!!}">{!!$company->PHONE_COMPANY!!}</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div id="phoneaction3" style="display: none;">
                <div class="form-group">
                    {!! Form::input('text', 'PHONE3', '',  ['class'=> 'form-control', 'placeholder'=>'Phone']) !!}
                </div>
                <div class="form-group">
                    <label>Phone Company</label>
                    <select class="form-control" name="ID_PHONE_COMPANY3" id="ID_PHONE_COMPANY3">
                        <?php
                        foreach ($phonecompany as $company) {
                            ?>
                            <option value="{!! $company->id!!}">{!!$company->PHONE_COMPANY!!}</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group" style="float: left;width: 100%;">
                {!! Form::email('email', '', ['class'=> 'form-control','placeholder'=>'email']) !!}
            </div>
            <div class="form-group">
                <label>Rol</label>
                <select class="form-control" name="rol_id" id="rol_id" >
                    <?php
                    foreach ($roles as $rol) {
                        ?>
                        <option value="{!! $rol->id!!}">{!!$rol->name!!}</option>
                    <?php } ?>
                </select>
            </div>
            <div id="contrasena">
                <div class="form-group">
                    {!! Form::password('password', ['class'=> 'form-control','placeholder'=>'password']) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password_confirmation', ['class'=> 'form-control', 'placeholder'=>'password confirmation'])!!}
                </div>
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

            <!--</form>-->

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
//    $('.i-checks').iCheck({
//        checkboxClass: 'icheckbox_square-green',
//        radioClass: 'iradio_square-green'
//    });
            $('#rol_id').change(function () {
                $('#contrasena').css('display', 'block');
                if ($('#rol_id').val() == 3) {
                    $('#datacustomer').css('display', 'block');
                    $('#phoneaction').css('display', 'block');
                    $('#contrasena').css('display', 'none');
                } else if ($('#rol_id').val() == 2) {
                    $('#datacustomer').css('display', 'none');
                    $('#phoneaction').css('display', 'block');
                } else {
                    $('#datacustomer').css('display', 'none');
                    $('#phoneaction').css('display', 'none');
                }

            });
        });
    </script>
</body>

@endsection