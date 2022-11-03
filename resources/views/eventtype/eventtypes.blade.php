@extends('layouts.app')

<title> Event Types </title>

@section('content')
<body class="w-full h-full bg-gray-100">
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-3xl text-gray-700">
                Volunteer Type
            </h1>
        </div>

        <div class="pull-right my-4">
            <a class="btn btn-success"
               href="{{route('eventtypes.create')}}">
                Create  Type
            </a>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="container">
            <div class = "invalid-feedback">
                Warning
            </div>
            <div class="invalid-feedback">
                {{session()->get('message')}}
            </div>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($eventtypes as $eventtype)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $eventtype->name }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('eventtypes.show',$eventtype->eventtypeId) }}">Show</a>
               
                    <a class="btn btn-two" href="{{ route('eventtypes.edit',$eventtype->eventtypeId) }}">Edit</a>
               
                    {!! Form::open(['method' => 'DELETE','route' => ['eventtypes.destroy', $eventtype->eventtypeId],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
              
            </td>
        </tr>
        @endforeach
    </table>


</body>
@endsection
