@extends('layouts.app')

<title> Create Event </title>

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Event</h2>
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
        action="{{route('event.storeevent')}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <p> Name:
        <input
            type="text"
            name="name"
            placeholder="Name"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <p>Type:
        <input
            type="text"
            name="type"
            placeholder="Type"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <p>
        <label class="col-xs-12 col-sm-12 col-md-12" for="date_time">Event Date and Time: </label>

        <input type="datetime-local" name="date_time"  class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <p> Venue:
        <input
            type="text"
            name="venue"
            placeholder="Venue"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <p> Person In Charge:
        <input
            type="text"
            name="pic"
            placeholder="Person In Charge"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
