@extends('layouts.app')

    <title>Edit Profile</title>

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Profile</h2>
        </div>
    </div>

    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('profile.index') }}"> Back</a>
    </div>
</div>

{{-- Basic error catcher --}}
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

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
        class="col-xs-12 col-sm-12 col-md-12"
        value="{{$edit_profile->designation}}"
        >
        </p>

        <p> Name:
        <input
            type="text"
            name="name"
            class="col-xs-12 col-sm-12 col-md-12"
            value="{{$edit_profile->name}}"
        >
        </p>

        <p> Home Number:
        <input
            type="text"
            name="phone"
            class="col-xs-12 col-sm-12 col-md-12"
            value="{{$edit_profile->phone}}"
        >
        </p>

        <p>Phone Numebr:
        <input
            type="text"
            name="handphoneNo"
            class="col-xs-12 col-sm-12 col-md-12"
            value="{{$edit_profile->handphoneNo}}"
        >
        </p>

        <p>Email
        <input
            type="email"
            name="email"
            class="col-xs-12 col-sm-12 col-md-12"
            value="{{$edit_profile->email}}"
        >
        </p>

        <p>Address:
        <textarea
            name="address"
            placeholder="Address"
            class="col-xs-12 col-sm-12 col-md-12"
            >{{$edit_profile->address}}</textarea>
        </p>

        <p>Gender
            <select name = "gender" class="col-xs-12 col-sm-12 col-md-12">
                <option value = "Male" {{$edit_profile->gender == "Male" ? 'selected':''}}>Male</option>
                <option value = "Female">Female</option>
            </select>
        </p>

        <p>Congregation
        <select name = "congregation" class="col-xs-12 col-sm-12 col-md-12">
            @foreach ($congregations as $selection )
                <option value = "{{$selection->name}}" {{$edit_profile->congregation == $selection->name ? 'selected':''}}>
                    {{$selection->name}}
                </option>
            @endforeach
        </select>
        </p>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>

@endsection
