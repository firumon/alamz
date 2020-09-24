@extends('layout')

@php
    $hasDate = false;
    $title = 'Select Date To Generate Report';
    if (request('start') && request('end')){
        $hasDate = true;
        $title = 'Report - ' . request('start') . ' TO ' . request('end');
    }
@endphp

@section('title',$title)

@section('button')
    @if($hasDate)
        <form><div class="form-inline">
                <input type="text" class="form-control-sm text-center" name="start" id="datepicker-start">
                &nbsp; TO &nbsp; <input type="text" class="form-control-sm text-center" name="end" id="datepicker-end">
                &nbsp; &nbsp; <input type="submit" class="btn btn-info btn-sm" value="Regenerate" />
            </div></form>
    @endif
@stop

@section('content')
    @if($hasDate)
        @php
            $records = recordsBetween(request('start'),request('end'))->groupBy(headValues(config('alramz.fields.broker_name')))->map(function($item){ return statusCount($item); })->toArray();
            $Total = [];
        @endphp
        <div class="table-responsive">
            <table class="table table-sm" id="report-list-table">
                @if(!empty($records))<thead><tr><th>Broker</th>@foreach($records[array_key_first($records)] as $th => $count) <th>{{ $th }}</th>@php $Total[$th] = 0 @endphp @endforeach</tr></thead>@endif
                <tbody>
                @forelse($records as $broker => $counts)
                    <tr>
                        <td>{{ $broker }}</td>
                        @foreach($counts as $head => $count) <td class="{{ $head }}">{{ $count }}</td> @php $Total[$head] += intval($count) @endphp @endforeach
                    </tr>
                @empty
                    <tr><td ><div class="jumbotron text-center">No records</div></td></tr>
                @endforelse
                </tbody>
                @if(!empty($Total))<tfoot>
                    <tr><th>Total</th>@foreach($Total as $th => $total) <th class="{{ $th }}">{{ $total }}</th> @endforeach</tr>
                    <tr><th colspan="{{ count($Total)+1 }}" class="text-right"><button class="btn btn-warning btn-sm" onclick="download()">Export as Excel</button></th></tr>
                </tfoot>@endif
            </table>
        </div>
    @else
        <form>
            <div class="jumbotron text-center">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="start">Start Date</label>
                            <input type="text" class="form-control text-center" name="start" id="datepicker-start">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="start">End Date</label>
                            <input type="text" class="form-control text-center" name="end" id="datepicker-end">
                        </div>
                    </div>
                    <div class="col-4 offset-4">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Generate" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@stop

@push('js')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <script>
        $(function(){
            $('.Clearance').each(function(i,e){ $(e).html((parseInt($(e).text()) !== 0) ? '&#10004;' : '&#10008;') });
        })
        $('#datepicker-start').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format:'YYYY-MM-DD'
            }
        })
        $('#datepicker-end').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format:'YYYY-MM-DD'
            },
            startDate: moment().subtract(30, 'days')
        })
        function download(){
            var downloadurl;
            var dataFileType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById('report-list-table');
            var btnHTMLData = $('tfoot tr:eq(1)',$(tableSelect)).html(); $('tfoot tr:eq(1)',$(tableSelect)).remove();
            var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
            $('tfoot',$(tableSelect)).append($('<tr>').html(btnHTMLData));
            var filename = 'ALRAMZ_RECORD_STATUS_{{ date('Y_m_d_H_i_s') }}.xls';
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
@endpush
