@extends('layouts.app')

<title> Edit Event </title>

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Event</h2>
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
        action="{{route('event.update', $edit_event->eventId)}}"
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

        

        <p>
            <label for="date_time">From </label>
            <input type="datetime-local" name="start_datetime"  class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none" value="{{$edit_event->start_datetime}}">
        </p>

        <p>
            <label for="date_time">To: </label>
            <input type="datetime-local" name="end_datetime"  class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none" value="{{$edit_event->end_datetime}}">
        </p>

        <p> Venue:
        <input
            type="text"
            name="venue"
            value="{{$edit_event->venue}}"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <p> Person In Charge:
        <input
            type="text"
            name="pic"
            value="{{$edit_event->pic}}"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>
        <p> Event Type
            <select name = "eventtype" class="col-xs-12 col-sm-12 col-md-12">
                @foreach ($eventtypes as $selection )
                    <option value = "{{$selection->name}}">{{$selection->name}}</option>
                @endforeach
    
            </select>
            </p>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
