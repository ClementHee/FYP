@extends('layouts.app')

<title> Manage Event </title>

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="">
                Event Management
            </h2>
        </div>

<<<<<<< HEAD
        <div class="py-10 sm:py-20">
            <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
               href="{{route('event.create')}}">
                Create Event
            </a>
=======
        <div class="pull-right">
            @can('event-create')
                <a class="btn btn-success" href="{{ route('event.createevent') }}"> Create New Event</a>
            @endcan

>>>>>>> fbdbbe68f596037dbaebab6e032193c6e7ae08dd
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

<<<<<<< HEAD
    @foreach($events as $event)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all " >
                        <a href="{{route('event.show',$event->eventId)}}">
                            {{ $event->name }}
                        </a>
                    </h2>
                    </div>

                    <div>
                        <p>
                            {{ $event->email }}
                        </p>
                        <p>
                            {{ $event->type }}
                        </p>
                        <p>
                            {{ $event->start_datetime }}
                        </p>
                        <p>
                            {{ $event->end_datetime }}
                        </p>
                    </div>
                   
                    
                </div>
            </div>
        </div>
=======
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
>>>>>>> fbdbbe68f596037dbaebab6e032193c6e7ae08dd
    @endforeach
</table>

@endsection
