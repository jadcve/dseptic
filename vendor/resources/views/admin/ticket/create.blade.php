@extends('admin.layout')
@section('content')
<body class="gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.ticket.store', 'class' => 'form']) !!}

                        <div class="form-group">
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
                        <div class="form-group">
                            <label>Customer</label>
                            <select class="form-control" name="ID_CUSTOMER" id="ID_CUSTOMER">
                                <?php
                                foreach ($customers as $custom) {
                                    ?>
                                    <option value="{!! $custom->id!!}">{!!$custom->name!!}</option>
                                <?php } ?>
                            </select>
                            <!--{!! Form::select('ID_TECH', $operators, null, array('class' => 'form-control'))!!}-->
                        </div>
                        <div class="form-group">
                            <label>Admin Notes</label>
                            {!! Form::textarea('Admin_Notes', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group ">

                            <label>Status Message</label>
                            {!! Form::text('Status_Message','', ['class'=> 'form-control']) !!}
                        </div>

                        <div class="form-group " >
                            <div class="col-sm-6">
                                <label>Date</label>
                                <div class="input-group date">
                                    {!! Form::text('Date','', ['class'=> 'form-control', 'id' => 'date']) !!}
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
                                </div>
                            </div>
                            <br><br><br>
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
                            <label>System Brand</label>
                            {!! Form::text('SYSTEM_BRAND','', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Permit Id</label>
                            {!! Form::text('PERMIT_ID','', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Apartment</label>
                            {!! Form::text('Apartment','', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Gate Code</label>
                            {!! Form::text('GATE_CODE','', ['class'=> 'form-control']) !!}
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
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            {!! Form::textarea('ADDRESS','', ['class'=> 'form-control']) !!}
                        </div>
                        {!! Form::hidden('Status', '1', array('id' => 'Status')) !!}
                        {!! Form::hidden('ID_ADMIN', $userId) !!}
                        <div>                            
                            {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
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
        });
    </script>
</body>
@endsection