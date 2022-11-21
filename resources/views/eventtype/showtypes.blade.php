@extends('layouts.app')
<title> Show Event Sets </title>
@section('content')

    <h2> Show Event Sets</h2>
    <div class="pull-right my-4">
        <a class="btn btn-primary" href="{{ route('eventtypes.index') }}"> Back</a>
        <a class="btn btn-primary" href="{{ route('eventroles.edit',$eventtypes->eventtypeId) }}"> Assign Roles for event</a>
    </div>

<div class="card">
    <div class="card-header">
        <h2>{{ $eventtypes->name }}</h2>
    </div>
    <div class="card-body">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <ul class="list-group">
                <strong>Events in this category: </strong>
                @foreach ( $assignedevents as $assignedevent )
                <li class="list-group-item">
                    {{ $assignedevent->name }}
                @endforeach
                </li>
            </ul>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <ul class="list-group">
            <strong>Roles needed: </strong>
            @foreach ( $rolesneeded as $roleneeded )
            <li class="list-group-item">
                {{ $roleneeded->name }}
            </li>
            @endforeach
            </ul>
        </div>
        </div>
            <div class="pull-right my-4">
            <a class="btn btn-primary" href="{{ route('eventroles.edit',$eventtypes->eventtypeId) }}"> Edit Roles for Events</a>
            </div>
    </div>
</div>
@endsection
