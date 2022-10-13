@extends('layouts.app')

<title> Edit Event </title>

@section('content')
<body>
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-3xl text-gray-700">
            Create new Event
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

<div class="container ">
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class='invalid-feedback'>
                Something went wrong
            </div>
            <ul class='invalid-feedback'>
                @foreach ($errors->all() as $error )
                <li class="py-2">
                    {{$error}}
                </li>    
                @endforeach
            </ul>
        @endif
    </div>

    <div class="card">
    <form
        action="{{route('event.updateevent', $edit_event->eventId)}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
      
        <p>Name: 
        <input
            type="text"
            name="name"
            value="{{$edit_event->name}}"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        </p>

        <p>Type:
        <input
            type="text"
            name="type"
            value="{{$edit_event->type}}"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        </p>

        <p> 
            <label for="date_time">Event Date and Time</label>
            <input type="datetime-local" name="date_time"  class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none" value="{{$edit_event->date_time}}">
        </p>

        <p> Venue:
        <input
            type="text"
            name="venue"
            value="{{$edit_event->venue}}"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        </p>

        <p> Person In Charge:
        <input
            type="text"
            name="pic"
            value="{{$edit_event->pic}}"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        </p>
        
        <button
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Save
        </button>
    </form>
    </div>

</div>
</body>
@endsection