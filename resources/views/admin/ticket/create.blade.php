@extends('admin.layout')
@section('content') 

<div id="page-wrapper" class="gray-bg" style="float: left; width: 100%; margin-left: 0px;">
    <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.ticket.store', 'class' => 'form','id'=>'form_create_ticket']) !!}

                        <div class="form-group" style="width: 60%;">
                            <label>Permit Id</label>
                            {!! Form::text('PERMIT_ID','', ['class'=> 'form-control','id'=>'PERMIT_ID']) !!}
                        </div>
                        <div class="form-group" style="width: 60%;">
                            <label>Customer</label>
                            <select onchange="actualizarcustomer();" class="form-control" name="ID_CUSTOMER" id="ID_CUSTOMER">
                                <option selected="true"></option>
                                <?php
                                foreach ($customers as $custom) {
                                    ?>
                                    <option value="{!! $custom->id!!}">{!!$custom->name!!}</option>
                                <?php } ?>
                            </select>
                            <!--{!! Form::select('ID_TECH', $operators, null, array('class' => 'form-control'))!!}-->
                        </div>

                        <div class="form-group" style="width: 55%;float: left;">
                            <label>Address</label>
                            {!! Form::text('ADDRESS','', ['class'=> 'form-control','id'=>'ADDRESS']) !!}
                        </div>
                         <div class="form-group" style="width: 35%;float: left;margin-left: 5%;">
                            <label>State</label>
                            <select  onchange="actualizarcity();" class="form-control" name="ID_STATE" id="STATE">
                                <option value=NULL selected="true"></option>
                                <?php
                                foreach ($state as $sta) {
                                    ?>
                                    <option value="{!! $sta->id!!}">{!!$sta->STATE!!}</option>
                                <?php } ?>
                            </select>
                            <!--{!! Form::select('ID_TECH', $operators, null, array('class' => 'form-control'))!!}-->
                        </div>
<!--                        <div class="form-group" style="width: 35%;float: left;margin-left: 5%;">
                            <label>State</label>
                            {!! Form::text('State','', ['class'=> 'form-control']) !!}
                        </div>-->
                        <div class="form-group" style="width: 55%;float: left;">
                            <label>Address 2 (Apart#,Suite)</label>
                            {!! Form::text('ADDRESS2','', ['class'=> 'form-control','id'=>'ADDRESS2']) !!}
                        </div>
                        <div class="form-group" style="width: 35%;float: left;margin-left: 5%;">
                            <label>City</label>
                            <select  class="form-control" name="ID_CITY" id="ID_CITY" value="NULL">
                                
                            </select>
                        </div>
                        <div class="form-group" style="width: 55%;float: left;margin-top: 0px;">
                            <label>Zip Code</label>
                            {!! Form::text('ZIP_CODE','', ['class'=> 'form-control','id'=>'ZIP_CODE']) !!}
                        </div>
                        <div class="form-group" style="width: 35%;float: left;margin-left: 5%;">
                            <label>Phone Number</label>
                            {!! Form::text('PHONE_NUMBER','', ['class'=> 'form-control','id'=>'PHONE_NUMBER']) !!}
                        </div>
                        <div class="form-group" style="width: 55%;float: left;">
                            <label>Email</label>
                            {!! Form::text('EMAIL','', ['class'=> 'form-control','id'=>'EMAIL']) !!}
                        </div>
                        <div class="form-group" style="width: 35%;float: left;margin-left: 5%;">
                            <label>Gate Code</label>
                            {!! Form::text('GATE_CODE','', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group" style="width: 55%;float: left;margin-top: 20px;">
                            <label>Tech</label>
                            <select class="form-control" name="ID_TECH" id="ID_TECH">
                                <?php
                                foreach ($operators as $operator) {
                                    ?>
                                    <option value="{!! $operator->id!!}">{!!$operator->name!!}</option>
                                <?php } ?>
                            </select>
                            <!--{!! Form::select('ID_TECH', $operators, null, array('class' => 'form-control'))!!}-->
                        </div>
                        <div class="form-group " style="float: left;width: 35%;margin-left: 5%;">
                            <div class="col-sm-14">
                                <label>Date</label>
                                <div class="input-group date">
                                    {!! Form::text('Date','', ['class'=> 'form-control', 'id' => 'date']) !!}
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
                                </div>
                            </div>
                            <br><br><br>
                        </div>
                        <div class="form-group" style="width: 55%;float: left;height: 1px;"></div>
                        <div class="form-group" style="width: 35%;float: left;margin-top: -55px;margin-left: 5%;">
                            <label>System Brand</label>
                            {!! Form::text('SYSTEM_BRAND','', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group" style="width: 40%;float: left;margin-left: 5%;margin-right: 2%;">
                            <label>Work Phone</label>
                            {!! Form::text('PHONE','', ['class'=> 'form-control','id'=>'PHONE']) !!}
                        </div>
                        <div class="form-group" style="width: 40%;float: left;margin-left: 5%;margin-right: 2%;">
                            <label>Home Phone</label>
                            {!! Form::text('PHONE2','', ['class'=> 'form-control','id'=>'PHONE2']) !!}
                        </div>
                        <div class="form-group" style="width: 35%;float: left;margin-left: 5%;margin-right: 2%;">
                            <label>Cell Phone</label>
                            {!! Form::text('PHONE3','', ['class'=> 'form-control','id'=>'PHONE3']) !!}
                        </div>
                        <div class="form-group" style="float: left;width: 100%;">
                            <label>Admin Notes</label>
                            {!! Form::textarea('Admin_Notes', '', ['class'=> 'form-control']) !!}
                        </div>
                        <!--                        <div class="form-group ">
                        
                                                    <label>Status Message</label>
                                                    {!! Form::text('Status_Message','', ['class'=> 'form-control']) !!}
                                                </div>
                        
                        
                                                <div class="form-group">
                                                    <label>Repair Performed</label>
                                                    {!! Form::text('Repair_Performed','', ['class'=> 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label>Paid</label>
                                                    {!! Form::text('PAID','', ['class'=> 'form-control']) !!}
                                                </div>
                        
                        
                                                <div class="form-group">
                                                    <label>Apartment</label>
                                                    {!! Form::text('Apartment','', ['class'=> 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label>Notes</label>
                                                    {!! Form::textarea('Notes','', ['class'=> 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label>Technician</label>
                                                    {!! Form::text('Technician','', ['class'=> 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    {!! Form::text('Price','', ['class'=> 'form-control']) !!}
                                                </div>-->

                        {!! Form::hidden('Status', '2', array('id' => 'Status')) !!}
                        {!! Form::hidden('ID_ADMIN', $userId) !!}
                        <div style="float: left;width: 100%;">                            
                            <a class="btn btn-primary" id="saveticket" style="text-decoration: none;">
                                Save
                            </a>
                            <!--{!! Form::submit('Save',['class' => 'btn btn-primary']) !!}-->
                        </div>
                        {!! Form::close() !!}
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        //    $(".date-picker").datepicker();
        //    $(".date-picker").on("change", function () {
        //        var id = $(this).attr("id");
        //    });
        $(document).ready(function () {
            $("#date").datepicker({
                format: 'yyyy/mm/dd'
            });
            $("#saveticket").click(function() {
                if($("#STATE").val()!="NULL"){
                    $( "#form_create_ticket" ).submit();
                }else{
                    alert("You must choose a state and city for the ticket");
                }
            });
        });
        function  actualizarcustomer() {
            var securitytoken = $('meta[name=token_ajax]').attr('content');
            var idcustomer = $('#ID_CUSTOMER').val();
            if(idcustomer == "")
                 document.getElementById("form_create_ticket").reset();
            $.ajax({
                url: '/DSeptic/admin/updatecustomer_info',
                type: "post",
//                dataType: "json",
                data: {_token: securitytoken,
                id:idcustomer},
                success: function (data) {
                    $('#ADDRESS').val(data.customer.ADDRESS);
                    $('#ADDRESS2').val(data.customer.ADDRESS_ALTERNATIVE);
                    $('#ZIP_CODE').val(data.customer.ZIP_CODE);
                    $('#PERMIT_ID').val(data.customer.PERMIT);
                    $('#PHONE_NUMBER').val(data.user.PHONE);
                    $('#EMAIL').val(data.user.email);
                    $('#PHONE').val(data.user.PHONE);
                    $('#PHONE2').val(data.user.PHONE2);
                    $('#PHONE3').val(data.user.PHONE3);
                }
            });
        }
        
        function actualizarcity(){
            var securitytoken = $('meta[name=token_ajax]').attr('content');
            var idstate = $('#STATE').val();
            
            $.ajax({
                url: '/DSeptic/admin/updatecity',
                type: "post",
//                dataType: "json",
                data: {_token: securitytoken,
                idstate:idstate},
                success: function (data) {
                    $('#ID_CITY').html(data);
                    
                }
            });
        }
    </script>
</body>
@endsection