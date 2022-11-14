@extends('layouts.app')
<title> System Role Managment</title>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>System Role Management</h2>
        </div>
        <div class="pull-right my-4">
        @can('Create Role')
            <a class="btn btn-success" href="{{ route('usertype.create') }}"> Create New System Role</a>
            @endcan
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-striped table-condensed">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('usertype.show',$role->id) }}">Show</a>
            @can('Edit Role')
                <a class="btn btn-two" href="{{ route('usertype.edit',$role->id) }}">Edit</a>
            @endcan
            @can('Delete Role')
                {!! Form::open(['method' => 'DELETE','route' => ['usertype.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>
{!! $roles->render('pagination::bootstrap-4') !!}

@endsection
