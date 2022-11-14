@extends('layouts.app')

<title> Create Event </title>

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Event</h2>
        </div>
    </div>

    <div class="pull-right my-4">
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
        action="{{route('event.store')}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text">Name:</span>
        <input
            type="text"
            name="name"
            placeholder="Name"
            class="form-control">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="date_time">From: </label>
            <input type="datetime-local" name="start_datetime"  class="form-control">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="date_time">To: </label>
            <input type="datetime-local" name="end_datetime"  class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Venue:</span>
        <input
            type="text"
            name="venue"
            placeholder="Venue"
            class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Person In Charge:</span>
        <input
            type="text"
            name="pic"
            placeholder="Person In Charge"
            class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Event Type:</span>
            <select name = "eventtype" class="form-control">
                @foreach ($eventtypes as $selection )
                    <option value = "{{$selection->name}}">{{$selection->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
