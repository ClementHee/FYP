@extends('layouts.app')

<title> Create Profile </title>

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Profile</h2>
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
        action="{{route('profile.store')}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <p> Designation:
        <input
            class="col-xs-12 col-sm-12 col-md-12"
            type="text"
            name="designation"
            placeholder="Designation">
        </p>

        <p> Name:
        <input
            class="col-xs-12 col-sm-12 col-md-12"
            type="text"
            name="name"
            placeholder="Name">
        </p>

        <p> Home Number:
        <input
            type="text"
            name="phone"
            placeholder="Phone"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <p> Phone Number:
        <input
            type="text"
            name="handphoneNo"
            placeholder="Mobile Phone"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <p> Email:
        <input
            type="email"
            name="email"
            placeholder="Email"
            class="col-xs-12 col-sm-12 col-md-12">
        </p>

        <p> Address:
        <textarea
            name="address"
            placeholder="Address"
            class="col-xs-12 col-sm-12 col-md-12"></textarea>
        </p>

        <p> Gender
            <select name = "gender" class="col-xs-12 col-sm-12 col-md-12">

                <option value = "Male">Male</option>
                <option value = "Female">Female</option>

            </select>
        </p>

        <p> Congregation
        <select name = "congregation" class="col-xs-12 col-sm-12 col-md-12">
            @foreach ($congregations as $selection )
                <option value = "{{$selection->name}}">{{$selection->name}}</option>
            @endforeach

        </select>
        </p>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
@endsection
