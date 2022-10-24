@extends('layouts.app')

    <title>Edit Profile</title>

@section('content')
<body>
<div class="container">
    <div class="row justify-content-center">
        <h1>
            Edit Profile
        </h1>
        <hr>
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
        action="{{route('profile.update', $edit_profile->profileId)}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <p> Designation:
        <input
        type="text"
        name="designation"
        value="{{$edit_profile->designation}}"
        >
        </p>

        <p> Name:
        <input
            type="text"
            name="name"
            value="{{$edit_profile->name}}"
        >
        </p>

        <p> Home Number: 
        <input
            type="text"
            name="phone"
            value="{{$edit_profile->phone}}"
        >
        </p>

        <p>Phone Numebr:
        <input
            type="text"
            name="handphoneNo"
            value="{{$edit_profile->handphoneNo}}"
        >
        </p>

        <p>Email
        <input
            type="email"
            name="email"
            value="{{$edit_profile->email}}"
        >
        </p>

        <p>Address: 
        <textarea
            name="address"
            placeholder="Address"
            >{{$edit_profile->address}}</textarea>
        </p>

        <p>Gender
            <select name = "gender">
                <option value = "Male" {{$edit_profile->gender == "Male" ? 'selected':''}}>Male</option>
                <option value = "Female">Female</option>
            </select>
        </p>

        <p>Congregation
        <select name = "congregation">
            @foreach ($congregations as $selection )
                <option value = "{{$selection->name}}" {{$edit_profile->congregation == $selection->name ? 'selected':''}}>
                    {{$selection->name}}
                </option>
            @endforeach
        </select>
        </p>

        <p>


        <button
            type="submit">
            Save
        </button>
    </form>
    </div>
    
</div>
</body>
@endsection