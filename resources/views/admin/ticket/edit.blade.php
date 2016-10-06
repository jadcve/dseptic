@extends('admin.layout')
@section('content')

    <div id="page-wrapper" class="gray-bg" style="float: left;width: 100%;margin-left: 0px;">
    <div class="container">
        <div class="row" style="padding-top: 50px;">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body" >
                        {!! Form::model($ticket, ['route' => ['admin.ticket.update', $ticket->id], 'method' => 'patch']) !!}
                        <?php
                        if ($ticket->Status == 3) {
                            $ticket->Status = 1;
                            ?>
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
                        <?php }else{ ?>
                         {!! Form::hidden('ID_TECH', Input::old('ID_TECH'), array('id' => 'ID_TECH')) !!}
                        <?php } ?>
                        <div class="form-group" >
                            <label>Admin Notes</label>
                            {!! Form::text('Admin_Notes',Input::old('Admin_Notes'), ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Status Message</label>
                            {!! Form::text('Status_Message',Input::old('Status_Message'), ['class'=> 'form-control']) !!}
                        </div>
                        <!--                            <div class="form-group">
                                                        <label>Repair ID</label>
                                                        {!! Form::text('Repair_ID',Input::old('Repair_ID'), ['class'=> 'form-control']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Customer</label>
                                                        {!! Form::text('Customer',Input::old('Customer'), ['class'=> 'form-control']) !!}
                                                    </div>-->
                        <div class="form-group " >
                            <div style="margin-right: 40%;margin-bottom: 20px;" class="col-sm-6">
                                <label>Date</label>
                                <div class="input-group date">
                                    {!! Form::text('Date',Input::old('Date'), ['class'=> 'form-control', 'id' => 'date']) !!}
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Repair Performed</label>
                            {!! Form::text('Repair_Performed',Input::old('Repair_Performed'), ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Warranty</label>
                            {!! Form::text('Warranty',Input::old('Warranty'), ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>	Notes</label>
                            {!! Form::text('Notes',Input::old('Notes'), ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Technician</label>
                            {!! Form::text('Technician',Input::old('Technician'), ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            {!! Form::text('Price',Input::old('Price'), ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group" >
                            <label>Issue Description</label>
                            {!! Form::textarea('PROBLEMS', $ticket->PROBLEMS, ['class'=> 'form-control', 'rows' => 4]) !!}
                        </div>
                        {!! Form::hidden('Status', Input::old('Status'), array('id' => 'Status')) !!}
                        <div>                            
                            {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div> 
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
    @endsection
