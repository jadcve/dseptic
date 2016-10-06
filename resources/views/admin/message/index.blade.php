@extends('admin.layout')
@section('content')

    <div id="page-wrapper" class="gray-bg" style="float: left;width: 100%;margin-left: 0px;">
	<div class="row">
		<div style="width: 100%;color: #000;margin-top: 50px;" class="col-md-10 col-md-offset-0">
                    <div id="wrapper">
                        <div style="width: 100%;float: left;margin-left: 10px;margin-top: 10px;" class="row  border-bottom white-bg dashboard-header">
                            @if(!$message->isEmpty())
                            <table id="list_message" class="table table-bordered" style="margin-right: 20px;text-align: center;">
                                <tr>
                                    <th>Ticket</th>
                                    <th>Status</th>
                                    <th>Content</th>
                                </tr>
                                @foreach ($message as $mess)
                                <tr>
                                    <td> <a href="/DSeptic/admin/message/{{ $mess->id}} ">Ticket {{ $mess->ID_TICKET }} </a></td>
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
        </div>
    </div>
</div>
@endsection