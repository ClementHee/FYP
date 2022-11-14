@extends('layouts.app')
<title> {{ $roles->name }}</title>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Roles</h2>
        </div>
        <div class="pull-right my-4">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="list-group">
            <h3>{{ $roles->name }}</h3>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <ol class="list-group list-group-numbered">
            <strong>Members Allocated: </strong>
            @foreach ( $assignedprofiles as $assignedprofile )
                <li class="list-group-item">{{ $assignedprofile->name }}</li>
            @endforeach

        </ol>
    </div>
</div>
@endsection
