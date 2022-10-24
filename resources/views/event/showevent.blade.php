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
<<<<<<< HEAD
            </p>

            <p class="">
                {{ $event->start_datetime }}
            </p>

            <p class="">
                {{ $event->end_datetime }}
            </p>
=======
            </div>
>>>>>>> fbdbbe68f596037dbaebab6e032193c6e7ae08dd
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
<<<<<<< HEAD
       
        <a  class="" href= "{{route('event.edit',$event->eventId)}} ">
            Edit Event
        </a>
        <form action=" {{route ('event.destroy',$event->eventId)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="primary-btn inline text-base sm:text-xl bg-red-500 mt-10 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-red-400">
                Delete
            </button>
        </form>
    </div>
    </body>
@endsection
=======

</body>
@endsection
>>>>>>> fbdbbe68f596037dbaebab6e032193c6e7ae08dd
