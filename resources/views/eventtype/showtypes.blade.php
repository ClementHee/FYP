@extends('layouts.app')
<title> Show Event Sets </title>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Event Sets</h2>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name: </strong>
            {{ $eventtypes->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Events in this category: </strong>
            @foreach ( $assignedevents as $assignedevent )
                {{ $assignedevent->name }},
            @endforeach

        </div>
        <div class="form-group">
            <strong>Roles needed: </strong>
            @foreach ( $rolesneeded as $roleneeded )
                {{ $roleneeded->name }},
            @endforeach

        </div>
    </div>
    <div class="pull-right my-4">
        <a class="btn btn-primary" href="{{ route('eventtypes.index') }}"> Back</a>
        <a class="btn btn-primary" href="{{ route('eventroles.edit',$eventtypes->eventtypeId) }}"> Assign Roles for event</a>
    </div>

</div>
@endsection
