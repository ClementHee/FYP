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
            <div class="form-group">
                <strong>Name:</strong>
                {{ $event->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type:</strong>
                {{ $event->type }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Time:</strong>
                {{ $event->date_time }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Venue:</strong>
                {{ $event->venue }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Person In Charge:</strong>
                {{ $event->pic }}
            </div>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
        </div>

    </div>

</body>
@endsection
