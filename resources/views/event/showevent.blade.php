@extends('layouts.app')

<title> {{ $event->name }} </title>

@section('content')
<body>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Event Data</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="pull-right my-4">
                <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
            </div>

            <div class="form-group">
                <strong>Name:</strong>
                {{ $event->name }}
            </p>

            <div class="form-group">
                <strong>Type:</strong>
                {{ $event->type }}
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
    </div>

        <a  class="btn btn-primary" href= "{{route('event.edit',$event->eventId)}} ">
            Edit Event
        </a>

        @can('profile-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['event.destroy', $event->eventId],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan

    </div>
    </body>


</body>
@endsection
