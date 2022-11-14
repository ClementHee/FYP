@extends('layouts.app')

<title> Volunteer Roles </title>

@section('content')
<body class="w-full h-full bg-gray-100">
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                Volunteer Roles
            </h2>
        </div>

        <div class="pull-right my-4">
            <a class="btn btn-success"
               href="{{route('roles.create')}}">
                Create  Volunteer Roles
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
<div class="table table-responsive">
    <table class="table table-striped table-sm">
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
                <a class="btn btn-primary my-1" href="{{ route('roles.show',$vrole->roleId) }}">Show</a>

                <a class="btn btn-two my-1" href="{{ route('roles.edit',$vrole->roleId) }}">Edit</a>

                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $vrole->roleId],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger my-1']) !!}
                {!! Form::close() !!}

            </td>
        </tr>
        @endforeach
    </table>
</div>
    {!! $vroles->render('pagination::bootstrap-5') !!}

</body>
@endsection
