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
{{--    <select class="form-control" onchange="location.href = '?broker=' + this.value"><option value="-">Select Broker</option>@forelse($brokers as $broker) <option value="{{ $broker->name }}" {{ request('broker') === $broker->name ? 'selected' : '' }}>{{ $broker->name }}</option> @empty <option>No Brokers Found</option> @endforelse</select>--}}
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
                        @foreach($counts as $head => $count) <td>{{ $count }}</td> @php $Total[$head] += intval($count) @endphp @endforeach
                    </tr>
                @empty
                    <tr><td ><div class="jumbotron text-center">No records</div></td></tr>
                @endforelse
                </tbody>
                @if(!empty($Total))<tfoot><tr><th>Total</th>@foreach($Total as $th => $total) <th>{{ $total }}</th> @endforeach</tr></tfoot>@endif
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
    {{--            <select class="form-control" onchange="location.href = '?broker=' + this.value"><option value="-">-- Select --</option>@forelse($brokers as $broker) <option value="{{ $broker->name }}" {{ request('broker') === $broker->name ? 'selected' : '' }}>{{ $broker->name }}</option> @empty <option>No Brokers Found</option> @endforelse</select>--}}
            </div>
        </form>
    @endif
@stop

@push('js')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <script>
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
    </script>
@endpush
