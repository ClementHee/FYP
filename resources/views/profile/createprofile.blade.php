<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="w-4/5 mx-auto">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            Add new post
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

<div class="m-auto pt-20">
    <form
        action="{{route('profile.storeprofile')}}"
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
            name="phone"
            placeholder="Phone"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
       
        <input
            type="text"
            name="handphoneNo"
            placeholder="Mobile Phone"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

        <input
            type="email"
            name="email"
            placeholder="Email"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        
       
        <textarea
            name="address"
            placeholder="address"
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>
        
        <input
            type="text"
            name="gender"
            placeholder="Gender"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

        <select name = "congregation">
            @foreach ($congregations as $selection )
                <option value = "{{$selection->name}}">{{$selection->name}}</option>
            @endforeach
        </select>

        <label for="is_volunteer" class="text-gray-500 text-2xl">
            Is Volunteer
        </label>
        <input
            type="checkbox"
            class="bg-transparent block border-b-2 inline text-2xl outline-none"
            name="is_volunteer">

        <label for="is_staff" class="text-gray-500 text-2xl">
            Is Staff
        </label>
        <input
            type="checkbox"
            class="bg-transparent block border-b-2 inline text-2xl outline-none"
            name="is_staff">

        <input
            type="text"
            name="designation"
            placeholder="Designation"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

        <button
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit Post
        </button>
    </form>
</div>
</body>
</html>