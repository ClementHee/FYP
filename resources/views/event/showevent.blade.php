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
        Laravel App
    </title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-4/5 mx-auto">
        <div class="pt-10">
            <a href="{{ URL::previous() }}"
               class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                < Back to previous page
            </a>
        </div>

        <h4 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 sm:py-20">
            {{ $event->name }}
        </h4>



        <div class="pt-10 pb-10 text-gray-900 text-xl">
            <p class="font-bold text-2xl text-black pt-10">
                {{ $event->name }}
            </p>

            <p class="text-base text-black pt-10">
                {{ $event->date_time }}
            </p>
        </div>
       
        <a  class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400" href= "{{route('event.editevent',$event->eventId)}} ">
            Edit Event
        </a>
        <form action=" {{route ('event.deleteevent',$event->eventId)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="primary-btn inline text-base sm:text-xl bg-red-500 mt-10 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-red-400">
                Delete
            </button>
        </form>
    </div>
    </body>
</html>