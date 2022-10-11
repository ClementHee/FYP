<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Create Event</title>

    <title>Document</title>

    @vite('resources/css/app.css')
</head>
<body>
<div class="w-4/5 mx-auto">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            Create new Event
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

<div class="m-auto ">
    <div class="pb-8">
        @if ($errors->any())
            <div class='bg-red-500 text-white font-bold rounded-t px-4 py-2'>
                Something went wrong
            </div>
            <ul class='border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-text-red-700'>
                @foreach ($errors->all() as $error )
                <li class="py-2">
                    {{$error}}
                </li>    
                @endforeach
            </ul>
        @endif
    </div>
    <form
        action="{{route('event.storeevent')}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

      
        <input
            type="text"
            name="name"
            placeholder="Name"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

        <input
            type="text"
            name="type"
            placeholder="Type"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
       
            <label for="date_time">Event Date and Time</label>
            <input type="datetime-local" name="date_time"  class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
            
        <input
            type="text"
            name="venue"
            placeholder="Venue"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        <input
            type="text"
            name="pic"
            placeholder="Person In Charge"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        
       
      
        </br>
        
        <button
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Create Event
        </button>
    </form>
</div>
</body>
</html>