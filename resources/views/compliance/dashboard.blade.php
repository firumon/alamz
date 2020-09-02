@extends('layout')

@section('title','Dashboard')

@php
    $head = HEAD_FIELD_DISPLAY; $bStatus = $head['Status - Broker']; $cStatus = $head['Status - Compliance'];
    $records = new \App\Record;
@endphp

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-info"><div class="inner"><h3>{{ $records->where($bStatus,'Submitted')->whereNull($cStatus)->count() }}</h3><p>Records to review</p></div><div class="icon"><i class="fas fa fa-star-half"></i></div><a href="{{ route('compliance.pending') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a></div></div>
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-success"><div class="inner"><h3>{{ $records->where($cStatus,'Approved')->count() }}</h3><p>Total Approved</p></div><div class="icon"><i class="fas fa fa-check-double"></i></div><a href="{{ route('compliance.approved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a></div></div>
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-warning"><div class="inner"><h3>{{ $records->where($cStatus,'Rejected')->count() }}</h3><p>Total Rejected</p></div><div class="icon"><i class="fas fa fa-poo-storm"></i></div><a href="{{ route('compliance.rejected') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a></div></div>
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-warning"><div class="inner"><h3>{{ $records->where($cStatus,'Incomplete')->count() }}</h3><p>Total Incomplete</p></div><div class="icon"><i class="fas fa fa-star-half-alt"></i></div><a href="{{ route('compliance.incomplete') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a></div></div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><div class="card-title"><h4>Records to Review</h4></div></div>
                <div class="card-body">
                    @php $view = config('alramz.views.compliance.dashboard.pending'); extract(records($view['paginate'],$view['conditions'],false)); @endphp
                    @component('components.records-list',['view' => $view, 'records' => $records, 'links' => $links, 'search' => false]) @endcomponent
                    @component('components.mark-modal',['view' => $view, 'records' => $records]) @endcomponent
                    @component('components.mark-modal',['view' => $view, 'records' => $records]) @endcomponent
                    @push('js')
                        <script type="text/javascript"> const records = @json(collect($records->items())->keyBy->id); </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>

@stop
