@extends('admin.layout')

@section('content')
<div class="container" style="width: 100%;padding-right: 30px;min-width: 1000px;">
	<div class="row">
		<div style="width: 100%;" class="col-md-10 col-md-offset-1">
      @if(!$users->isEmpty())
      <table class="table table-bordered" style="margin-right: 20px;">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Rol</th>
              </tr>
              @foreach ($users as $user)
                  <tr>
                    <td width="50">{{ $user->name }}</td>
                    <td width="50">{{ $user->email }}</td>
                    <td width="50">{{ $user->userRol->name }}</td>
                  </tr>
              @endforeach
          </table>
          <?php // echo $ticket->render(); ?>
      @endif
		</div>
	</div>
</div>
@endsection