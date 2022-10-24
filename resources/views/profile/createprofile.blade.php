@extends('layouts.app')

<title> Create Profile </title>

@section('content')
<body class="">
<div class="container">
    <div class="row justify-content-center">
        <h1 class="">
            Create new profile
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

<div class="container">
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class='invalid-feedback'>
                Something went wrong
            </div>
            <ul class='invalid-feedback'>
                @foreach ($errors->all() as $error )
                <li class="">
                    {{$error}}
                </li>    
                @endforeach
            </ul>
        @endif
</div>

    <div class="card">
    <form
        action="{{route('profile.store')}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <p> Designation:
        <input
        type="text"
        name="designation"
        placeholder="Designation"
        class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        </p>

        <p> Name:
        <input
            type="text"
            name="name"
            placeholder="Name"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        </p>

        <p> Home Number:
        <input
            type="text"
            name="phone"
            placeholder="Phone"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        </p>

        <p> Phone Number:
        <input
            type="text"
            name="handphoneNo"
            placeholder="Mobile Phone"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        </p>

        <p> Email:
        <input
            type="email"
            name="email"
            placeholder="Email"
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
        </p>

        <p> Address:
        <textarea
            name="address"
            placeholder="Address"
            class="py-10 bg-transparent block border-b-2 w-full h-50 text-xl outline-none"></textarea>
        </p>

        <p> Gender
            <select name = "gender" class="bg-transparent block border-b-2 inline text-2xl outline-none py-3">
                
                <option value = "Male">Male</option>
                <option value = "Female">Female</option>
                
            </select>
        </p>

        <p> Congregation
        <select name = "congregation" class="bg-transparent block border-b-2 inline text-2xl outline-none py-3 ml-20">
            @foreach ($congregations as $selection )
                <option value = "{{$selection->name}}">{{$selection->name}}</option>
            @endforeach
            
        </select>
        </p>
        
        

        <button
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Create Profile
        </button>
    </form>
    </div>
</div>
</body>
@endsection