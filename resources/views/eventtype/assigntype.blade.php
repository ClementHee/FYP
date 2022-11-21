@extends('layouts.app')

<title> Assign Volunteer Roles </title>

@section('content')
<body>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row justify-content-center">
        <h2>
            Assign Roles for Event
        </h2>
    </div>

<div class="container">
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class='invalid-feedback'>
                Something went wrong
            </div>
            <ul class='invalid-feedback'>
                @foreach ($errors->all() as $error )
                <li class="py-2">
                    {{$error}}
                </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

<div class="container border border-0">
        {!! Form::open(array('route' => 'eventroles.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="d-none">

                    <input
                        type="text"
                        name="eventtypeId"
                        value= "{{$eventtypeId}}"
                        class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">


                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Roles:</strong><br/>
                    <ul class="list-group">
                    @foreach($vroles as $value)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <label class="form-check-label stretched-link">
                            {{ Form::checkbox('types[]', $value->roleId, false, array('class' => 'name')) }}
                            {{$value->name}}
                            </label>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
</div>

</body>
@endsection
