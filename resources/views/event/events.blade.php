<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    <title>
        Church Management System
    </title>
    

</head>
<body class="w-full h-full bg-gray-100">
    <div class="w-4/5 mx-auto">
        <div class="text-center pt-20">
            <h1 class="text-3xl text-gray-700">
                Events
            </h1>
            <hr class="border border-1 border-gray-300 mt-10">
        </div>

        <div class="py-10 sm:py-20">
            <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
               href="{{route('event.createevent')}}">
                Create Event
            </a>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="mx-auto w-4/5 pb-10">
            <div class = "bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Warning
            </div>
            <div class="border border-t-1 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                {{session()->get('message')}}
            </div>
        </div>
    @endif

    @foreach($events as $event)
        <div class="w-4/5 mx-auto pb-10">
            <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
                <div class="w-11/12 mx-auto pb-10">
                    <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all " >
                        <a href="{{route('event.showevent',$event->eventId)}}">
                            {{ $event->name }}
                        </a>
                    </h2>

                    <p class="text-gray-900 text-lg py-8 break-words">
                        {{ $event->email }}
                        {{ $event->handphoneNo }}
                    </p>
                    
                   
                    
                </div>
            </div>
        </div>
    @endforeach
</body>
</html>