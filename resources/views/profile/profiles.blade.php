@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Profile Management</h2>
        </div>
        <div class="pull-right my-4">
        @can('Create Profile')
            <a class="btn btn-success" href="{{ route('profile.create') }}"> Create New Profile</a>
            @endcan
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
        @can('Edit Profile')
        <th width="280px">Action</th>
        @endcan
    </tr>

    @foreach ($profiles as $key => $profile)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $profile->name }}</td>
        @can('Edit Profile')
        <td>
            <a class="btn btn-primary" href="{{ route('profile.show',$profile->profileId)}}">Show</a>
           
                <a class="btn btn-two" href="{{ route('profile.edit',$profile->profileId) }}">Edit</a>
            
            @can('Delete Profile')
                {!! Form::open(['method' => 'DELETE','route' => ['profile.destroy', $profile->profileId],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
        @endcan
    </tr>
    @endforeach
</table>
{!! $profiles->render() !!}

@endsection
