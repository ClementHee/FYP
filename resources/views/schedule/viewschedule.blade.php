@extends('layouts.app')
<title> View Schedule </title>

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="">
                View Schedule
            </h2>
        </div>

        
    </div>


    @if ($message = Session::get('message'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

<div id="content1" class="table-responsive">
    <table id="schedule" class="table table-striped table-sm">
        <tr class="text-center">
            <th>
                Time
            </th>
            @foreach ($rolesneeded as $role )
                <th>
                    {{$role[0]->name}}
                </th>
            @endforeach
        </tr>
        @foreach ($dates as $date)
        <tr>
            <td class="text-center" id="date" >
                {{$date->eventdate}}
            </td>
            @foreach ($rolesneeded as $role)
                <td class="text-center">
                    @foreach($schedule as $key => $name)
                        @if($schedule[$key]->eventdate==$date->eventdate)
                            @if($schedule[$key]->roles==$role[0]->roleId)
                                {{$schedule[$key]->name}}
                            @endif

                        @endif
                    @endforeach
                </td>
            @endforeach
        </tr>
        @endforeach
    </table>
</div>

<a class="btn btn-success" id="export_button_pdf"> Export to PDF</a>
<a class="btn btn-success" id="export_button"> Export to Excel</a>


<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<script type="text/javascript">
    var d = $('tr #date');
    var x = new Date(d.html()); 
    var month = x.getMonth()+1;
    var year = x.getFullYear();
    month = getMonthName(month);
    function html_table_to_excel(type)
    {
        
        var data = document.getElementById('schedule');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

        XLSX.writeFile(file, month + " "+ year + ' Schedule.' + type);
    }

    const export_button = document.getElementById('export_button');

    export_button.addEventListener('click', () =>  {
        html_table_to_excel('xlsx');
    });

    var specialElementHandlers = {
    // element with id of "bypass" - jQuery style selector
    '.no-export': function (element, renderer) {
        // true = "handled elsewhere, bypass text extraction"
        return true;
        }
    };


    $('body').on("click", "#export_button_pdf", function () {
     
        html2canvas($('#content1')[0], {
            onrendered: function (canvas) {
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download(month+" "+year+ " Schedule.pdf");
            }
        });
    });

    function getMonthName(monthNumber) {
        const date = new Date();
        date.setMonth(monthNumber - 1);

        // Using the browser's default locale.
        return date.toLocaleString([], { month: 'long' });
    }
</script>

@endsection
