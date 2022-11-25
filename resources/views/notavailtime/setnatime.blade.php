@extends('layouts.app')

<title> Set Not Available Time </title>

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Set Not Available Time</h2>
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

{!! Form::open(array('route' => 'not_availabletime.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="d-none">
            <strong>Profile ID:</strong>
            <input
                type="text"
                name="profileId"
                value= "{{$profileId}}"
                class>


        </div>
        <div class="form-group">
            <strong>Not available time</strong>
            {!! Form::date('na_time', null, array('placeholder' => 'Type','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
