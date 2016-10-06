@extends('operator.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body" >
                    {!! Form::open(array('url' => '/operator/ticket/process/'.$ticket->id)) !!}
                    <?php if($ticket->Status == 3){ ?>
                    <div class="form-group" style="float: left;">
                        <label style="float: left;">Change Ticket Status Process</label>
                        <input style="float: left;margin-left: 10px;margin-top: 3px;" name="Status" value="4" type="checkbox" />
                    </div>
                    <?php }else{ ?>
                    <div class="form-group" style="float: left;">
                        <label style="float: left;">Closed Ticket</label>
                        <input style="float: left;margin-left: 10px;margin-top: 3px;" name="Status" value="5" type="checkbox" />
                    </div>
                    <?php } ?>
                    <div class="form-group"  style="float: left;margin-left: 30px;width: 50%;">
                        <a id="show_infoticket" class="btn btn-info" href="javascript:">Show Ticket Information</a>
                    </div>
                    <div id="data_ticket"  style="display: none;float: left;width: 100%;">
                        <div class="form-group">
                            <label>Admin Notes</label>
                            {!! Form::text('Admin_Notes',Input::old('Admin_Notes'), ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Status Message</label>
                            {!! Form::text('Status_Message',Input::old('Status_Message'), ['class'=> 'form-control']) !!}
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
                    </div>
                    <div style="float: none;clear: both;">                            
                        {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#show_infoticket").click(function() {
                                if($("#data_ticket").css('display')=='none'){
                                    $("#data_ticket").css('display','block');
                                    $("#show_infoticket").text('Hidden Ticket Information');
                                }else{
                                    $("#data_ticket").css('display','none');
                                    $("#show_infoticket").text('Show Ticket Information');
                                }
                            });
                        });
                    </script>
                    
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection