<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AL RAMZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script type="text/javascript">
        function download(){
            var downloadurl;
            var dataFileType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById('records');
            var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
            var filename = 'ALRAMZ_RECORDS_{{ date('Y_m_d_H_i_s') }}.xls';
            downloadurl = document.createElement("a");
            document.body.appendChild(downloadurl);
            if(navigator.msSaveOrOpenBlob){
                var blob = new Blob(['\ufeff', tableHTMLData], {
                    type: dataFileType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
            }else{
                downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
                downloadurl.download = filename;
                downloadurl.click();
            }
        }
    </script>
</head>
<body>
@if(empty($records))
    <h4 class="text-center mt-5"> NO RECORDS </h4>
@else
    <div class="d-flex flex-row-reverse p-2 d-print-none">
        <a href="javascript:window.print()" class="btn btn-outline-primary mx-1">Print</a>
        <a href="javascript:download()" class="btn btn-outline-primary mx-1">Download</a>
    </div>
    <div class="table-responsive p-2">
        <table class="table table-sm table-bordered table-striped" id="records">
            <thead class="thead-light"><tr>
                @foreach($records[0] as $th => $Value) <th nowrap>{{ $th }}</th> @endforeach
            </tr></thead>
            <tbody>
                @foreach($records as $values)
                    <tr>
                        @foreach($values as $value) <td nowrap class="p-2">{{ $value }}</td> @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
</body>
</html>
