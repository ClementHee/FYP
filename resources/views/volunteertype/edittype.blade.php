@extends('layouts.app')

<title> Edit Volunteer Type </title>

@section('content')
<body>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row justify-content-center">
        <h1>
            Edit Volunteer Type
        </h1>
    </div>

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

    <div class="container border border-0">
        {!! Form::model($volunteer_type, ['method' => 'PATCH','route' => ['vtypes.update', $profileId]]) !!}
        <div class="d-none">
            <strong>Profile ID:</strong>
            <input
            type="text" name="profileId" value= {{$profileId}} class="">
        </div>

        <div class="">
            <ul class="list-group ">
                <strong>Roles:</strong> <br/>
                    @foreach($alltypes as $value)
                        <li class="list-group-item">
                            <label class="form-check-label stretched-link">
                                {{ Form::checkbox('types[]', $value->roleId, in_array($value->roleId, $volunteer_type) ? true : false, array('class' => 'name')) }}
                                {{$value->name}}
                            </label>
                        </li>
                    @endforeach
            </ul>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary my-4">Save</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
</body>
@endsection
