@extends('layouts.app')

<title> Manage Event </title>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="">
                Event Management
            </h2>
        </div>

        <div class="pull-right my-4">
            @can('Create Event')
                <a class="btn btn-success" id="export_button"> Export</a>
                @endcan
            </div>
        </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    {!! Form::open(array('route' => 'schedule.store','method'=>'POST')) !!}

    <input
            type="text"
            name="eventId"
            value="{{$id}}"
            class="d-none">
    <table id = "schedule" class="table table-bordered">
        
        <tr>
            <th>Time</th>
            @foreach ($rolesneeded as $roles)
                <th>
                    
                    <select  name ="roles[]" class="col-xs-12 col-sm-12 col-md-12">
                        <option name="role" value="{{$roles->roleId}}" >{{$roles->name}}</option>
                    </select>
                </th>
            @endforeach
        </tr>
        @foreach ($dates as $date)
        <tr>
            <td>
                <input type="date" name="date[]"  class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none" value="{{date('Y-m-d',strtotime($date))}}">
            </td>
            @foreach ($rolesneeded as $roles)
                <td>
                    <select name ="volunteers[]" class="col-xs-12 col-sm-12 col-md-12">
                        @foreach($allvolunteertype as $key => $name)
                            @if($allvolunteertype[$key]->roles==$roles->roleId)
                                <option value="{{$allvolunteertype[$key]->profileId}}">{{$allvolunteertype[$key]->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            @endforeach
        </tr>
        @endforeach
        
    </table>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    {!! Form::close() !!}   
 <script>
    function html_table_to_excel(type)
    {
        var data = document.getElementById('schedule');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

        XLSX.writeFile(file, 'file.' + type);
    }

    const export_button = document.getElementById('export_button');

    export_button.addEventListener('click', () =>  {
        html_table_to_excel('xlsx');
    });
 </script>
@endsection
