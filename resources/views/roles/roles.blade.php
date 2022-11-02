@extends('layouts.app')

<title> Volunteer Type </title>

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
               href="{{route('roles.create')}}">
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

        @foreach ($vroles as $vrole)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $vrole->name }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('roles.show',$vrole->roleId) }}">Show</a>
<<<<<<< HEAD
               
                    <a class="btn btn-two" href="{{ route('roles.edit',$vrole->roleId) }}">Edit</a>
               
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $vrole->roleId],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
              
=======
                @can('role-edit')
                    <a class="btn btn-two" href="{{ route('roles.edit',$vrole->roleId) }}">Edit</a>
                @endcan
                @can('role-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $vrole->roleId],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endcan
>>>>>>> 83fa7c8866df46d97e6ba3293944129fa04f10c1
            </td>
        </tr>
        @endforeach
    </table>


</body>
@endsection
