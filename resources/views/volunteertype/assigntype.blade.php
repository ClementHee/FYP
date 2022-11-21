@extends('layouts.app')

<title> Assign Volunteer Type </title>

@section('content')
<body>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row justify-content-center">
        <h1>
            Assign Volunteer Type
        </h1>
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
        {!! Form::open(array('route' => 'vtypes.store','method'=>'POST')) !!}
            <div class="d-none">
                <strong>Profile ID:</strong>
                <input
                    type="text"
                    name="profileId"
                    value= "{{$profile_id}}"
                >
            </div>

            <div class="">
                <div class="list-group">
                    <strong>Roles:</strong> <br/>
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
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        {!! Form::close() !!}

    </div>
</div>
</body>
@endsection
