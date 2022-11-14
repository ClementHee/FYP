@extends('layouts.app')

<title> Create Profile </title>

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Profile</h2>
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
        action="{{route('profile.store')}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text">Designation:</span>
        <input
            class="form-control"
            type="text"
            name="designation"
            placeholder="Mr">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Name:</span>
        <input
            class="form-control"
            type="text"
            name="name"
            placeholder="Name">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Home Number:</span>
        <input
            type="text"
            name="phone"
            placeholder="Phone"
            class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Phone Number:</span>
        <input
            type="text"
            name="handphoneNo"
            placeholder="Mobile Phone"
            class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Email</span>
        <input
            type="email"
            name="email"
            class="form-control"
            @if (isset($email))
                value="{{$email}}" readonly
            @else
                placeholder="Email"
            @endif>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"> Address: </span>
        <textarea
            name="address"
            rows="3"
            placeholder="Address"
            class="form-control">
        </textarea>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Gender</span>
            <select name = "gender" class="form-control">

                <option value = "Male">Male</option>
                <option value = "Female">Female</option>

            </select>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Congregation</span>
        <select name = "congregation" class="form-control">
            @foreach ($congregations as $selection )
                <option value = "{{$selection->name}}">{{$selection->name}}</option>
            @endforeach

        </select>
    </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
@endsection
