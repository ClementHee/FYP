@extends('layouts.app')

    <title>Edit Profile</title>

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Profile</h2>
        </div>
    </div>

    <div class="pull-right my-4">
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

        <div class="input-group mb-3">
           <span class="input-group-text">Designation:</span>
        <input
        type="text"
        name="designation"
        class="form-control"
        value="{{$edit_profile->designation}}"
        >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Name:</span>
        <input
            type="text"
            name="name"
            class="form-control"
            value="{{$edit_profile->name}}"
        >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Home Number:</span>
        <input
            type="text"
            name="phone"
            class="form-control"
            value="{{$edit_profile->phone}}"
        >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Phone Number:</span>
        <input
            type="text"
            name="handphoneNo"
            class="form-control"
            value="{{$edit_profile->handphoneNo}}"
        >
        </div>

        <div class="input-group mb-3">
           <span class="input-group-text">Email</span>
        <input
            type="email"
            name="email"
            class="form-control"
            value="{{$edit_profile->email}}"
        >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"> Address: </span>
        <textarea
            name="address"
            placeholder="Address"
            class="form-control"
            rows="3"
            >{{$edit_profile->address}}
        </textarea>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Gender</span>
            <select name = "gender" class="form-control">
                <option value = "Male" {{$edit_profile->gender == "Male" ? 'selected':''}}>Male</option>
                <option value = "Female">Female</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Congregation</span>
        <select name = "congregation" class="form-control">
            @foreach ($congregations as $selection )
                <option value = "{{$selection->name}}" {{$edit_profile->congregation == $selection->name ? 'selected':''}}>
                    {{$selection->name}}
                </option>
            @endforeach
        </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>

@endsection
