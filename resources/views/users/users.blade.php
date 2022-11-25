@extends('layouts.app')
<title>Users Managment</title>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right my-4">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="table-responsive">
<table class="table table-striped table-sm">
    <tr>
        <th>No.</th>
        <th>Email</th>
        <th> System Roles</th>
        <th width="280px">Action</th>
    </tr>
@foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>

        <td>{{ $user->email }}</td>

        <td>
            @if(!empty($user->getRoleNames()))
           
                @foreach($user->getRoleNames() as $v)
                    <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                @endforeach
            @endif
        </td>
        <td>
            <a class="btn btn-primary my-1" href="{{ route('users.show',$user->accountId) }}">Show</a>
            <a class="btn btn-two my-1" href="{{ route('users.edit',$user->accountId) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->accountId],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger my-1']) !!}
                {!! Form::close() !!}
        </td>
    </tr>
@endforeach
</table>
</div>
{!! $data->render('pagination::bootstrap-5') !!}

@endsection
