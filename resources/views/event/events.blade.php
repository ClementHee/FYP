@extends('layouts.app')

<title> Events </title>

@section('content')
<body class="w-full h-full bg-gray-100">
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-3xl text-gray-700">
                Events
            </h1>
            <hr class="border border-1 border-gray-300 mt-10">
        </div>

        <div class="py-10 sm:py-20">
            <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
               href="{{route('event.create')}}">
                Create Event
            </a>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="container">
            <div class = "invalid-feedback">
                Warning
            </div>
            <div class="invalid-feedback">
                {{session()->get('message')}}
            </div>
        </div>
    @endif

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
    @endforeach
</body>
@endsection