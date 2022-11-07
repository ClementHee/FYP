@extends('layouts.app')

<title> Edit Event </title>

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Not Available Time</h2>
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
        action="{{route('not_availabletime.updatethis',['profile'=>$edit_natime->profileId,'time'=>$edit_natime->na_time])}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <p>
            <label for="date_time">Not Available Time </label>
            <input type="date" name="na_time"  class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none" value="{{$edit_natime->na_time}}">
        </p>

        

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
