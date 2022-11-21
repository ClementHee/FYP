@extends('layouts.app')

<title> {{ $event->name }} </title>

@section('content')
<body>

    <div class="pull-right my-4">
        <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Event Data</h2>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $event->name }}
                    </div>

                    <div class="form-group">
                        <strong>Type:</strong>
                        {{ $event->eventtype }}
                    </div>

                    <div class="form-group">
                        <strong>Start Time:</strong>
                        {{ $event->start_datetime }}
                    </div>

                    <div class="form-group">
                        <strong>End Time:</strong>
                        {{ $event->end_datetime }}
                    </div>

                    <div class="form-group">
                        <strong>Venue:</strong>
                        {{ $event->venue }}
                    </div>

                    <div class="form-group">
                        <strong>Person In Charge:</strong>
                        {{ $event->pic }}
                    </div>

                    <div class="button-group">
                        <a  class="btn btn-primary my-2" href= "{{route('event.edit',$event->eventId)}} ">
                            Edit Event
                        </a>

                        <a class="btn btn-two my-2" href="{{ route('generateschedule',$event->eventId) }}">Generate Schedule</a>
                        <a class="btn btn-two my-2" href="{{ route('schedule.show',$event->eventId) }}">Show Schedule</a>

                            {!! Form::open(['method' => 'DELETE','route' => ['schedule.destroy', $event->eventId],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete Schedule', ['class' => 'btn btn-danger my-2']) !!}
                            {!! Form::close() !!}

                                {!! Form::open(['method' => 'DELETE','route' => ['event.destroy', $event->eventId],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete Event', ['class' => 'btn btn-danger my-2']) !!}
                                {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
@endsection
