@extends('layouts.app')

<title> Manage Event </title>

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="">
                Event Management
            </h2>
        </div>

        <div class="pull-right">
            @can('event-create')
                <a class="btn btn-success" href="{{ route('event.createevent') }}"> Create New Event</a>
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
            <th>Events</th>
            <th width="280px">Action</th>
        </tr>

    @foreach ($events as $key => $events)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $events->name }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('event.showevent',$events->eventId) }}">Show</a>
                @can('event-edit')
                    <a class="btn btn-two" href="{{ route('event.editevent',$events->eventId) }}">Edit</a>
                @endcan
                @can('event-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['event.deleteevent', $events->eventId],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endcan
            </td>
        </tr>
    @endforeach
</table>

@endsection
