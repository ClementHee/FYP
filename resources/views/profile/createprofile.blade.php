<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Create Profile</title>

    <title>Document</title>

</head>
<body>
<div class="w-4/5 mx-auto">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            Create new profile
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
        action="{{route('profile.storeprofile')}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input
        type="text"
        name="designation"
        placeholder="Designation"
        class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

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
            placeholder="Address"
            class="py-10 bg-transparent block border-b-2 w-full h-50 text-xl outline-none"></textarea>
        
    
            <select name = "gender" class="bg-transparent block border-b-2 inline text-2xl outline-none py-3">
                
                <option value = "Male">Male</option>
                <option value = "Female">Female</option>
                
            </select>
       
      
        <select name = "congregation" class="bg-transparent block border-b-2 inline text-2xl outline-none py-3 ml-20">
            @foreach ($congregations as $selection )
                <option value = "{{$selection->name}}">{{$selection->name}}</option>
            @endforeach
            
        </select>
        </br>
        
        <label for="is_volunteer" class="text-gray-500 text-2xl">
            Is Volunteer
        </label>
    
        <input
            type="checkbox"
            class="bg-transparent block border-b-2 inline text-2xl outline-none mb-10 mt-10"
            name="is_volunteer">
      
        
        <label for="is_staff" class="text-gray-500 text-2xl ml-10" >
            Is Staff
        </label>
    
        <input
            type="checkbox"
            class="bg-transparent block border-b-2 inline text-2xl outline-none mb-10 "
            name="is_staff">
        </br>
        
        <button
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Create Profile
        </button>
    </form>
</div>
</body>
</html>