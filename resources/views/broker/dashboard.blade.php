@extends('layout')

@section('title','Dashboard')


@section('content')
    @php
        $head = HEAD_FIELD_DISPLAY; $bStatus = $head['Status - Broker']; $cStatus = $head['Status - Compliance'];
        $records = new \App\Record;
    @endphp

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-info"><div class="inner"><h3>{{ $records->whereNull($bStatus)->whereNull($cStatus)->count() }}</h3><p>Records to be submitted</p></div><div class="icon"><i class="fas fa fa-code-branch"></i></div><a href="{{ route('broker.new') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-warning"><div class="inner"><h3>{{ $records->whereNull($cStatus)->where($bStatus,'Pending')->count() }}</h3><p>Records in pending</p></div><div class="icon"><i class="fas fa fa-edit"></i></div><a href="{{ route('broker.pending') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-warning"><div class="inner"><h3>{{ $records->whereNull($bStatus)->where($cStatus,'Incomplete')->count() }}</h3><p>Incomplete Records</p></div><div class="icon"><i class="fas fa fa-star-half-alt"></i></div><a href="{{ route('broker.incomplete') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-danger"><div class="inner"><h3>{{ $records->where($bStatus,'Submitted')->where($cStatus,'Rejected')->count() }}</h3><p>Rejected</p></div><div class="icon"><i class="fas fa fa-poo-storm"></i></div><a href="{{ route('broker.rejected') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header"><div class="card-title"><h4>Rejected Records</h4></div></div>
                <div class="card-body">
                    @php $view = config('alramz.views.broker.dashboard.rejected'); extract(records($view['paginate'],$view['conditions']),EXTR_OVERWRITE); @endphp
                    @component('components.records-list',['view' => $view, 'records' => $records, 'links' => $links, 'search' => false]) @endcomponent
                </div>
            </div>
            <div class="card">
                <div class="card-header"><div class="card-title"><h4>Incomplete Records</h4></div></div>
                <div class="card-body">
                    @php $view = config('alramz.views.broker.dashboard.incomplete'); extract(records($view['paginate'],$view['conditions']),EXTR_OVERWRITE); @endphp
                    @component('components.records-list',['view' => $view, 'records' => $records, 'links' => $links, 'search' => false]) @endcomponent
                </div>
            </div>
            <div class="card">
                <div class="card-header"><div class="card-title"><h4>Pending Records</h4></div></div>
                <div class="card-body">
                    @php $view = config('alramz.views.broker.dashboard.pending'); extract(records($view['paginate'],$view['conditions'],false),EXTR_OVERWRITE); @endphp
                    @component('components.records-list',['view' => $view, 'records' => $records, 'links' => $links, 'search' => false]) @endcomponent
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            @php $records = new \App\Record; @endphp
            <div class="small-box bg-success"><div class="inner"><h3>{{ $records->where($bStatus,'Submitted')->count() }}</h3><p>Total Submitted</p></div><div class="icon"><i class="fas fa fa-check"></i></div><a href="{{ route('broker.submitted') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div>
            <div class="small-box bg-warning"><div class="inner"><h3>{{ $records->where($bStatus,'Submitted')->whereNull($cStatus)->count() }}</h3><p>Pending review from compliance</p></div><div class="icon"><i class="fas fa fa-star-half"></i></div><a href="{{ route('broker.unreviewed') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div>
            <div class="small-box bg-success"><div class="inner"><h3>{{ $records->where($bStatus,'Submitted')->where($cStatus,'Approved')->count() }}</h3><p>Approved</p></div><div class="icon"><i class="fas fa fa-check-double"></i></div><a href="{{ route('broker.approved') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div>
        </div>
    </div>

@stop
