@extends('operator.layout')

@section('content')
<div class="container" style="width: 100%;padding-right: 30px;min-width: 1000px;">
    <div class="row">
        <div style="width: 100%;" class="col-md-10 col-md-offset-1">
            {!! Form::open(array('url' => '/operator/ticket/accept')) !!}
            <table class="table table-bordered" style="margin-right: 20px;text-align: center;">
                <tr>
                    <th style="text-align: center;">Ticket</th>
                    <th style="text-align: center;">Admin Notes</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Status Message</th>
                    <th style="text-align: center;">Response</th>
                </tr>
                <?php
                $status = "";
                switch ($ticket->Status) {
                    case 1:
                        $status = "Assigned";
                        break;
                    case 2:
                        $status = "Accepted";
                        break;
                    case 3:
                        $status = "Rejected";
                        break;
                }
                ?>
                <tr>
                    <td>Ticket {{ $ticket->id }}</td> 
                    <td>{{ $ticket->Admin_Notes }}</td>
                    <td>{{ $status }}</td>
                    <td>{{ $ticket->	Status_Message }}</td>
                    <td>
                        <div style="float: left;">
                            <label>Accept ticket</label>
                            <input name="status" value="yes" type="checkbox" />
                        </div>
                        <div style="float: left;margin-left: 20px;">
                            <label>Reject ticket</label>
                            <input name="status" value="no" type="checkbox" />
                        </div>
                    </td>
                    {!! Form::hidden('id', $ticket->id) !!}
                </tr>                  
            </table>
            {!! Form::submit('Send',['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            <?php // echo $ticket->render();  ?>
        </div>
    </div>
</div>
@endsection