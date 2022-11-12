@extends('layouts.app')

<title> Manage Event </title>

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="">
                Event Management
            </h2>
        </div>

        <div class="pull-right my-4">
            @can('Create Event')
                <a class="btn btn-success" href="{{ route('event.create') }}"> Create New Event</a>
                @endcan
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
            <th>Type</th>
            <th>Time Start</th>
            <th>Time End</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($events as $key => $event)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->eventtype }}</td>
            <td>{{ $event->start_datetime }}</td>
            <td>{{ $event->end_datetime }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('event.show',$event->eventId) }}">Show</a>
                @can('Edit Event')
                  <a class="btn btn-two" href="{{ route('event.edit',$event->eventId) }}">Edit</a>

                @endcan
                @can('Delete Event')
                    {!! Form::open(['method' => 'DELETE','route' => ['event.destroy', $event->eventId],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </table>
    {!! $events->render('pagination::bootstrap-4') !!}
@endsection
