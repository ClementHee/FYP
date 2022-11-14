@extends('layouts.app')

<title> View Schedule </title>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="">
                View Schedule
            </h2>
        </div>

        <div class="pull-right my-4">
            @can('Create Event')
                <a class="btn btn-success" id="export_button"> Export</a>

            @endcan
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
            <td class="text-center">
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

    <button class="btn btn-secondary" id="export" onclick="exportPDF('content1')">Save</button>
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




    var specialElementHandlers = {
    // element with id of "bypass" - jQuery style selector
    '.no-export': function (element, renderer) {
        // true = "handled elsewhere, bypass text extraction"
        return true;
    }
};

function exportPDF(id) {
    var doc = new jsPDF('p', 'pt', 'a4');
    //A4 - 595x842 pts
    //https://www.gnu.org/software/gv/manual/html_node/Paper-Keywords-and-paper-size-in-points.html


    //Html source
    var source = document.getElementById(id);
console.log(source);
    var margins = {
        top: 10,
        bottom: 10,
        left: 10,
        width: 595
    };

    doc.fromHTML(
        source, // HTML string or DOM elem ref.
        margins.left,
        margins.top, {
            'width': margins.width,
            'elementHandlers': specialElementHandlers
        },

        function (dispose) {
            // dispose: object with X, Y of the last line add to the PDF
            //          this allow the insertion of new lines after html
            doc.save('Test.pdf');
        }, margins);
}
</script>
@endsection
