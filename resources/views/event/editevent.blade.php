@extends('layouts.app')

<title> Edit Event </title>

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Event</h2>
        </div>
    </div>

    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
    </div>
</div>

{{-- Basic error catcher --}}
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <form
        action="{{route('event.updateevent', $edit_event->eventId)}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <p>Name:
        <input
            type="text"
            name="name"
            value="{{$edit_event->name}}"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <p>Type:
        <input
            type="text"
            name="type"
            value="{{$edit_event->type}}"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <p>
            <label for="date_time">Event Date and Time</label>
            <input type="datetime-local" name="date_time" class="col-xs-12 col-sm-12 col-md-12" value="{{$edit_event->date_time}}">
        </p>

        <p> Venue:
        <input
            type="text"
            name="venue"
            value="{{$edit_event->venue}}"
            class="col-xs-12 col-sm-12 col-md-12"">
        </p>

        <p> Person In Charge:
        <input
            type="text"
            name="pic"
            value="{{$edit_event->pic}}"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
