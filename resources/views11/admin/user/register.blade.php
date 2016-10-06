@extends('admin.layout')
@section('content')

<body class="gray-bg">

    <div style="margin-bottom: 30px;width: 80%;position: inherit;float: left;margin-left: 10%;margin-top: 0px;" class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h3 class="logo-name">DSeptic</h3>

            </div>
            <h3>Register to DSeptic</h3>
            <p>Create account.</p>
            <!--<form class="m-t" role="form" action="login.html">-->
            {!! Form::open(['route' => 'auth/register', 'class' => 'form','style' => 'float: left;width:100%;']) !!}
            <div class="form-group" style="float: left;width: 45%;">
                {!! Form::input('text', 'name', '',  ['class'=> 'form-control', 'placeholder'=>'name']) !!}
            </div>
            <div class="form-group" style="float: left;width: 45%;margin-left: 5%;">
                {!! Form::email('email', '', ['class'=> 'form-control','placeholder'=>'email','onblur'=>'validate_email();','id'=>'email']) !!}
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
                    {!! Form::input('text', 'PERMIT', '',  ['class'=> 'form-control', 'placeholder'=>'Permit','style' => 'float: left;width:45%;']) !!}
                </div>                
                <div class="form-group">
                    {!! Form::input('text', 'ZIP_CODE', '',  ['class'=> 'form-control', 'placeholder'=>'Zip Code','style' => 'float: left;width:45%;margin-left:5%;']) !!}
                </div>
            </div>
            <div id="phoneaction" style="margin-top: 10px;display: none;float: left;width: 100%;">
                <label style="float: left;margin-right: 1%;margin-top: 10px;">Work Phone</label>
                <div class="form-group" style="float: left;width: 35%;">
                    {!! Form::input('text', 'PHONE', '',  ['class'=> 'form-control', 'placeholder'=>'Work Phone']) !!}
                </div>
                <div class="form-group" style="float: left;width: 45%;margin-left: 3%;">
                    <label style="float: left;margin-right: 20px;margin-top: 10px;">Phone Company</label>
                    <select style="width: 60%;float: left;" class="form-control" name="ID_PHONE_COMPANY" id="ID_PHONE_COMPANY">
                        <?php
                        foreach ($phonecompany as $company) {
                            ?>
                            <option value="{!! $company->id!!}">{!!$company->PHONE_COMPANY!!}</option>
                        <?php } ?>
                    </select>
                    <!--                    <a id="second-phone" href="javascript:" style="float: left;margin-left: 20px;font-size: 25px;">
                                            <span class="glyphicon glyphicon-plus-sign"></span>
                                        </a>-->
                </div>
            </div>
            <div id="phoneaction2" style="display: none;float: left;width: 100%;">
                <label style="float: left;margin-right: 1%;margin-top: 10px;">Home Phone</label>
                <div class="form-group" style="float: left;width: 35%;">
                    {!! Form::input('text', 'PHONE2', '',  ['class'=> 'form-control', 'placeholder'=>'Home Phone']) !!}
                </div>
                <div class="form-group" style="float: left;width: 45%;margin-left: 3%;">
                    <label style="float: left;margin-right: 4%;margin-top: 10px;">Phone Company</label>
                    <select style="width: 60%;float: left;" class="form-control" name="ID_PHONE_COMPANY2" id="ID_PHONE_COMPANY2">
                        <?php
                        foreach ($phonecompany as $company) {
                            ?>
                            <option value="{!! $company->id!!}">{!!$company->PHONE_COMPANY!!}</option>
                        <?php } ?>
                    </select>
                    <!--                    <a id="third-phone" href="javascript:" style="float: left;margin-left: 20px;font-size: 25px;">
                                            <span class="glyphicon glyphicon-plus-sign"></span>
                                        </a>-->
                </div>
            </div>
            <div id="phoneaction3" style="display: none;float: left;width: 100%;margin-bottom: 20px;">
                <label style="float: left;margin-right: 1%;margin-top: 10px;">Cell Phone</label>
                <div class="form-group" style="float: left;width: 35%;">
                    {!! Form::input('text', 'PHONE3', '',  ['class'=> 'form-control', 'placeholder'=>'Cell phone']) !!}
                </div>
                <div class="form-group" style="float: left;width: 45%;margin-left: 5%;">
                    <label style="float: left;margin-right: 20px;margin-top: 10px;">Phone Company</label>
                    <select style="width: 60%;float: left;" class="form-control" name="ID_PHONE_COMPANY3" id="ID_PHONE_COMPANY3">
                        <?php
                        foreach ($phonecompany as $company) {
                            ?>
                            <option value="{!! $company->id!!}">{!!$company->PHONE_COMPANY!!}</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label style="width: 100%;text-align: center;">Roles</label>
                <select class="form-control" name="rol_id" id="rol_id" >
                    <?php
                    foreach ($roles as $rol) {
                        ?>
                        <option value="{!! $rol->id!!}">{!!$rol->name!!}</option>
                    <?php } ?>
                </select>
            </div>
            <div id="contrasena">
                <div class="form-group" style="float: left;width: 45%;">
                    {!! Form::password('password', ['class'=> 'form-control','placeholder'=>'password']) !!}
                </div>
                <div class="form-group" style="float: left;width: 45%;margin-left: 5%;">
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
            $('#second-phone').click(function () {
                $('#phoneaction2').css('display', 'block');
            });
            $('#rol_id').change(function () {
                $('#contrasena').css('display', 'block');
                if ($('#rol_id').val() == 3) {
                    $('#datacustomer').css('display', 'block');
                    $('#phoneaction').css('display', 'block');
                    $('#phoneaction2').css('display', 'block');
                    $('#phoneaction3').css('display', 'block');
                    $('#contrasena').css('display', 'none');
                } else if ($('#rol_id').val() == 2) {
                    $('#datacustomer').css('display', 'none');
                    $('#phoneaction').css('display', 'block');
                    $('#phoneaction2').css('display', 'block');
                    $('#phoneaction3').css('display', 'block');
                } else {
                    $('#datacustomer').css('display', 'none');
                    $('#phoneaction').css('display', 'none');
                    $('#phoneaction2').css('display', 'none');
                    $('#phoneaction3').css('display', 'none');
                }

            });
        });
        
        function validate_email(){
            var securitytoken = $('meta[name=token_ajax]').attr('content');
            var email = $('#email').val();

            $.ajax({
                url: '/DSeptic/admin/validate_email',
                type: "post",
//                dataType: "json",
                data: {_token: securitytoken,
                email:email},
                success: function (data) {
                    if(parseInt(data.email.id) > 0){
                        alert('mail is already used');
                    }
                }
            });
        }
    </script>
</body>

@endsection