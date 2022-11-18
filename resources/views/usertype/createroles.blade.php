@extends('layouts.app')
<title> Create New System Role</title>
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New System Role</h2>
        </div>
        <div class="pull-right my-4">
            <a class="btn btn-primary" href="{{ route('usertype.index') }}"> Back</a>
        </div>
    </div>
</div>
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

{!! Form::open(array('route' => 'usertype.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name',null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="list-group">
            @foreach($permission as $value)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label class="form-check-label stretched-link">
                    {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                    {{ $value->name }}

                </label>
            </li>
            @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
