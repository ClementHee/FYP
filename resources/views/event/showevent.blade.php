@extends('layouts.app')

<title> {{ $event->name }} </title>

@section('content')
<body>
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{ URL::previous() }}"
               class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                < Back to previous page
            </a>
        </div>

    <div class="card">
        <h4 class="card-header">
            {{ $event->name }}
        </h4>
        
        <div class="">
            <p class="">
                {{ $event->name }}
            </p>

            <p class="">
                {{ $event->start_datetime }}
            </p>

            <p class="">
                {{ $event->end_datetime }}
            </p>
        </div>
        
    </div>
       
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