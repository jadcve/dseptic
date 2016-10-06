@extends('operator.layout')
@section('content')
<div class="container" style="width: 100%;padding-right: 30px;min-width: 1000px;">
	<div class="row">
		<div style="width: 100%;" class="col-md-10 col-md-offset-0">
                    <div style="width: 100%;float: left;margin-left: 10px;margin-top: 30px; margin-right: 0px" class="row  border-bottom white-bg dashboard-header">

                    <table id="tabla_ticketoperator" class="table table-bordered" style="text-align: center;margin-right: 5px;">
              <tr>
                <th style="color: #000 !important;">Ticketsss</th>
                <th style="color: #000 !important;">Admin Notes</th>
                <th style="color: #000 !important;">Status</th>
                <th style="color: #000 !important;">Status Message</th>
              </tr>
              @foreach ($tickets as $ticket)
              <?php 
              $status="Closed";
              $accion = 'process';
              switch ($ticket->Status) {
                  case 1:
                      $status = "Assigned";
                      $accion = 'accept';
                      break;
                  case 2:
                      $status = "Accepted";
                      $accion = "process";
                      break;
                  case 3:
                      $status = "Rejected";
                      break;
                  case 4:
                      $status = "Process";
                      $accion = "process";
                      break;
                      
              }
              ?>
                  <tr>
                      <td width="50" style="color: #000 !important;"> <a href="/DSeptic/operator/ticket/{{$accion}}/{{ $ticket->id}} ">Ticket {{ $ticket->id }} </a></td> 
                    <td width="50" style="color: #000 !important;">{{ $ticket->Admin_Notes }}</td>
                    <td width="50" style="color: #000 !important;">{{ $status }}</td>
                    <td width="50" style="color: #000 !important;">{{ $ticket->	Status_Message }}</td>
                  </tr>
              @endforeach
          </table>
          <?php // echo $ticket->render(); ?>
		</div>
                </div>
	</div>
</div>
@endsection
