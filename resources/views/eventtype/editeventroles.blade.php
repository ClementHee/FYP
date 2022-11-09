@extends('layouts.app')

<title> Edit Volunteer Type </title>

@section('content')
<body>
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-3xl text-gray-700">
            Edit Roles Needed
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

<div class="container ">
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

    <div class="card">

        <div class="container">

                {!! Form::model($eventtype, ['method' => 'PATCH','route' => ['eventroles.update', $eventtypeId]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="d-none">
                            <strong>Event ID:</strong>
                            <input
                                type="text"
                                name="eventtypeId"
                                value= {{$eventtypeId}}
                                class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">


                        </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Roles:</strong>
                            <br/>
                            @foreach($alltypes as $value)
                                <div clas="form-check">
                                    <label class="form-check-label" for="{{$value->roleId}}">
                                    <input type="checkbox" class="form-check-input" id="" name="r[]" value="{{$value->roleId}}" @if (in_array($value->roleId,$eventtype))
                                        checked='checked'
                                    @endif>
                                    {{$value->name}}
                                    </label>
                                </div>
                            <br/>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
          
                {!! Form::close() !!}
           
        </div>
        </body>
    </div>

</div>
</body>
@endsection
