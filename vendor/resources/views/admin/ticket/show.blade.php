@extends('admin.layout')
@section('content')
<body class="gray-bg">
<div class="jumbotron">
   <div class="container">
      <div class="show-content">
         <div class="panel panel-default">
            <div class="panel-body">
               <div>
                  <h2>{{ $ticket->Admin_Notes }}</h2>
                  <p>
                     <strong>Status: </strong> {{ $ticket->Status }}<br>
                  </p>                  
                  <p>
                     <strong>Status Message: </strong> {{ $ticket->Status_Message }}<br>
                  </p>
                  <p>
                     <strong>Repair ID: </strong> {{ $ticket->Repair_ID }}<br>
                  </p>
                  <p>
                     <strong>Customer:</strong> {{ $ticket->Customer }}<br>
                  </p>
                  <p>
                     <strong>Date: </strong> {{ $ticket->Date }}<br>
                  </p>                  
                  <p>
                     <strong>Repair Performed: </strong> {{ $ticket->Repair_Performed }}<br>
                  </p>
                  <p>
                     <strong>Warranty: </strong> {{ $ticket->Warranty }}<br>
                  </p> 
                  <p>
                     <strong>Notes: </strong> {{ $ticket->Notes }}<br>
                  </p> 
                  <p>
                     <strong>Technician:</strong> {{ $ticket->Technician }}<br>
                  </p> 
                  <p>
                     <strong>Price: </strong> {{ $ticket->Price }}<br>
                  </p> 
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop
</body>