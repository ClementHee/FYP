@extends('layouts.app')

<title> Event Set Types </title>

@section('content')
<body>
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-3xl text-gray-700">
                Event Set Type
            </h1>
        </div>

        <div class="pull-right my-4">
            @can('Create Event Types')
            <a class="btn btn-success"
               href="{{route('eventtypes.create')}}">
                Create Event Set Type
            </a>@endcan
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
<div class="table-responsive">
    <table class="table table-striped table-sm">
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

                @can('Show Event Types')
                    <a class="btn btn-primary my-2" href="{{ route('eventtypes.show',$eventtype->eventtypeId) }}">Show</a>
                @endcan
                @can('Edit Event Types')
                    <a class="btn btn-two my-2" href="{{ route('eventtypes.edit',$eventtype->eventtypeId) }}">Edit</a>
                @endcan
                @can('Delete Event Types')
                    {!! Form::open(['method' => 'DELETE','route' => ['eventtypes.destroy', $eventtype->eventtypeId],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger my-2']) !!}
                    {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </table>
</div>
    {!! $eventtypes->render('pagination::bootstrap-5') !!}

</body>
@endsection
