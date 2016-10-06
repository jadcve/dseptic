@extends('operator.layout')

@section('content')
<div class="container" style="width: 100%;padding-right: 30px;min-width: 1000px;">
	<div class="row">
		<div style="width: 100%;" class="col-md-10 col-md-offset-1">
                    <table id="tabla_ticketoperator" class="table table-bordered" style="text-align: center;margin-right: 20px;">
              <tr>
                <th>Ticket</th>
                <th>Admin Notes</th>
                <th>Status</th>
                <th>Status Message</th>
              </tr>
              @foreach ($tickets as $ticket)
              <?php 
              $status="";
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
                      <td width="50"> <a href="/DSeptic/operator/ticket/{{$accion}}/{{ $ticket->id}} ">Ticket {{ $ticket->id }} </a></td> 
                    <td width="50">{{ $ticket->Admin_Notes }}</td>
                    <td width="50">{{ $status }}</td>
                    <td width="50">{{ $ticket->	Status_Message }}</td>
                  </tr>
              @endforeach
          </table>
          <?php // echo $ticket->render(); ?>
		</div>
	</div>
</div>
@endsection