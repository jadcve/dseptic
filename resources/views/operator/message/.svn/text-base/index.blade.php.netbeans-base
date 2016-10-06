@extends('operator.layout')

@section('content')
<div class="container" style="width: 100%;padding-right: 30px;min-width: 1000px;">
	<div class="row">
		<div style="width: 100%;color: #FFF;" class="col-md-10 col-md-offset-1">
      @if(!$message->isEmpty())
      <table id="list_message" class="table table-bordered" style="margin-right: 20px;text-align: center;">
              <tr>
                <th>Ticket</th>
                <th>Status</th>
                <th>Content</th>
                
              </tr>
              @foreach ($message as $mess)
                  <tr>
                    <td> <a href="/DSeptic/operator/message/{{ $mess->id}} ">Ticket {{ $mess->ID_TICKET }} </a></td>
                    <?php if($mess->Status==1){ ?>
                    <td>Unread </td>
                    <?php }else{ ?>
                        <td>Read</td>
                    <?php } ?>
                    <td>{{ $mess->CONTENT }}</td>
                  </tr>
              @endforeach
          </table>
          <?php // echo $ticket->render(); ?>
      @endif
		</div>
	</div>
</div>
@endsection