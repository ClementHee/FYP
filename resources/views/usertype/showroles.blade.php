@extends('layouts.app')
<title>Show System Role</title>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show System Role</h2>
        </div>
        <div class="pull-right my-4">
            <a class="btn btn-primary" href="{{ route('usertype.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="list-group">
            <h3>{{ $role->name }}</h3>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <ol class="list-group list-group-numbered ">
            <strong>Permissions:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                    <li class="list-group-item">
                        <label class="label label-success">
                            {{ $v->name }}
                        </label>
                    </li>
                    @endforeach
                @endif
        </ol>
    </div>
</div>
@endsection
