@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Profile Management</h2>
        </div>
        <div class="pull-right">
        @can('profile-create')
<<<<<<< HEAD
            <a class="btn btn-success" href="{{ route('profile.create') }}"> Create New Profile</a>
            @endcan
=======
            <a class="btn btn-success" href="{{ route('profile.createprofile') }}"> Create New Profile</a>
        @endcan
>>>>>>> fbdbbe68f596037dbaebab6e032193c6e7ae08dd
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($profiles as $key => $profile)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $profile->name }}</td>
        <td>
<<<<<<< HEAD
            <a class="btn btn-info" href="{{ route('profile.show',$profile->profileId) }}">Show</a>
            @can('profile-edit')
                <a class="btn btn-primary" href="{{ route('profile.edit',$profile->profileId) }}">Edit</a>
=======
            <a class="btn btn-primary" href="{{ route('profile.showprofile',$profile->profileId) }}">Show</a>
            @can('profile-edit')
                <a class="btn btn-two" href="{{ route('profile.editprofile',$profile->profileId) }}">Edit</a>
>>>>>>> fbdbbe68f596037dbaebab6e032193c6e7ae08dd
            @endcan
            @can('profile-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['profile.destroy', $profile->profileId],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>
{!! $profiles->render() !!}

@endsection
