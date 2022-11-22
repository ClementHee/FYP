@extends('layouts.app')

<title> Generate Schedule </title>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 margin-tb">
            <h2 class="">
                Generate Schedule
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

<div class="table-responsive">
    <table id = "schedule" class="table table-striped table-sm">

        <tr class="text-center">
            <th>Time</th>
            @foreach ($rolesneeded as $roles)
                <th>

                    <select  name ="roles[]" class="form-control" >
                        <option name="role" value="{{$roles->roleId}}" >{{$roles->name}}</option>
                    </select>
                </th>
            @endforeach
        </tr>
        @foreach ($dates as $date)
        <tr>
            <td>
                <input type="date" name="date[]"  id="date" class="form-control {{date('Y-m-d',strtotime($date))}}" value="{{date('Y-m-d',strtotime($date))}}" readonly>
            </td>
            @foreach ($rolesneeded as $roles)
                <td>
                    <select name ="volunteers[]" id ="roles{{date('Y-m-d',strtotime($date))}}" class="form-control">
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
</div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    {!! Form::close() !!}


 <script>
    /*$(document).ready(function(){
        $('select').on('change', function(event ) {
        var prevValue = $(this).data('previous');
        $('select').not(this).find('option[value="'+prevValue+'"]').show();
        var value = $(this).val();
        $(this).data('previous',value); $('select').not(this).find('option[value="'+value+'"]').hide();
        });
    });*/
    function html_table_to_excel(type)
    {
        var data = document.getElementById('schedule');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

        XLSX.writeFile(file, 'schedule.' + type);
    }

    const export_button = document.getElementById('export_button');

    export_button.addEventListener('click', () =>  {
        html_table_to_excel('xlsx');
    });

    let $form = $('form');
    $(document).ready(function(){
    var date=[];
    $('tr #date').each(function(){
        var x = new Date($(this).val());
        var day = x.getDate();
        var month = x.getMonth() + 1;
        var year = x.getFullYear();
        if (day < 10) {
            day = "0" + day;
        }
        if (month < 10) {
            month = "0" + month;
        }
        date.push(year + "-" + month + "-" + day);
    });
    var y ={!! json_encode($ntime->toArray(), JSON_HEX_TAG) !!};
    
    for(var i =0; i<y.length;i++){
        for(var c =0; c<date.length;c++){
            if (y[i].na_time==date[c]){ 
            $(".form-control"+"."+y[i].na_time).each(function(){
                
               
                $('td #roles'+y[i].na_time).find('option[value="'+y[i].profileId+'"]').remove();
               
            });  

        }  
        }
    }

    $form.find("select").each((i, el) => {
        let $options = $(el).find('option');
        let index = Math.floor(Math.random() * $options.length);
        $options.eq(index).prop('selected', true);
    });
    
}); 
    



   
   


 </script>

@endsection
