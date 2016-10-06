@extends('admin.layout')

@section('content')
<body class="gray-bg">
<div class="container" style="width: 100%;padding-right: 50px;min-width: 1000px;">
	<div class="row">

		<div style="width: 100%; padding-right: 50px; " class="col-lg-10 col-md-offset-0">

		<div style="width: 100%;color: #FFF;" class="col-md-10 col-md-offset-1">

      @if(!$tickets->isEmpty())
      <table class="table table-bordered" style="margin-right: 10px;">
          <tr class="active">
                <th>Status</th>
                <th>Status Message</th>
                <th>Technician</th>
                <th>Admin</th>
                <!--<th>Customer</th>-->
                <th>Date</th>
                <th>Repair Performed</th>
                <th>Warranty</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              @foreach ($tickets as $ticket)

              <tr>
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
                    <td width="50">{{ $status }}</td>
                    <td width="50">{{ $ticket->Status_Message }}</td>
                    <td width="50">{{ $ticket->userOperator->name }}</td>
                    <td width="50">{{ $ticket->userAdmin->name }}</td>
                    <!--<td width="50">{{ $ticket->Customer }}</td>-->
                    <td width="30">{{ $ticket->Date }}</td>
                    <td width="30">{{ $ticket->Repair_Performed }}</td>
                    <td width="30">{{ $ticket->Warranty }}</td>
                    <td width="30">{{ $ticket->Price }}</td>
                    
                    <td width="60" align="center">
                      {!! Html::link(route('admin.ticket.edit', $ticket->id), 'Edit', array('class' => 'btn btn-success btn-md')) !!}
                    </td>
                    <td width="60" align="center">
                      {!! Form::open(array('route' => array('admin.ticket.destroy', $ticket->id), 'method' => 'DELETE')) !!}
                          <button type="submit" class="btn btn-danger btn-md">Delete</button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
              @endforeach
          </table>
          <?php // echo $ticket->render(); ?>
      @endif
		</div>
	</div>
</div>
@endsection
</body>