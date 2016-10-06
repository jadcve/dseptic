@extends('admin.layout')

@section('content')
<body>
    
    <div id="page-wrapper" class="gray-bg" style=";width: 100%;margin-left: 0px;">
<div class="container" style="width: 100%;padding-right: 30px;">
	<div class="row">
		<div style="width: 100%;" class="col-md-10 col-md-offset-0">
                    <div style="width: 100%;float: left;margin-left: 10px;margin-top: 50px;" class="row  border-bottom white-bg dashboard-header">
      @if(!$users->isEmpty())
      <table class="table table-bordered" style="margin-right: 20px;">
          <tr class="active">
                <th>Name</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Action</th>
              </tr>
              @foreach ($users as $user)
                  <tr>
                    <td width="30">{{ $user->name }}</td>
                    <td width="30">{{ $user->email }}</td>
                    <td width="30">{{ $user->userRol->name }}</td>
                    <td width="30" style="color: #000 !important;"> <a class="btn btn-success btn-md" href="/DSeptic/admin/user/{{ $user->id}}" <?php if($user->rol_id==1){ ?> style="pointer-events:none; " <?php } ?> >Edit</a></td> 
                  </tr>
              @endforeach
              {!! $users->render() !!}
          </table>
          <?php // echo $ticket->render(); ?>
      @endif
		</div>
                </div>
	</div>
</div>
    </div>
    @endsection
</body>
