@extends('layout')

@section('title',(request('broker') && request('broker') !== '-') ? request('broker') : 'Select Broker')
@php
    $brokers = \App\User::where('role','broker')->get();
@endphp

@section('button')
    <select class="form-control" onchange="location.href = '?broker=' + this.value"><option value="-">Select Broker</option>@forelse($brokers as $broker) <option value="{{ $broker->name }}" {{ request('broker') === $broker->name ? 'selected' : '' }}>{{ $broker->name }}</option> @empty <option>No Brokers Found</option> @endforelse</select>
@stop

@section('content')
    @if(request('broker') && request('broker') !== '-')
        @php
            $records = \App\Record::withoutGlobalScopes()->where(HEAD_FIELD_DISPLAY['BROKER'],request('broker'))->get();
            $bStatus = HEAD_FIELD_DISPLAY['Status - Broker']; $cStatus = HEAD_FIELD_DISPLAY['Status - Compliance'];
        @endphp
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4"><div class="small-box bg-info"><div class="inner"><h3>{{ $records->whereNull($bStatus)->whereNull($cStatus)->count() }}</h3><p>Records to be submitted</p></div><div class="icon"><i class="fas fa fa-code-branch"></i></div><a href="{{ route('compliance.broker',['broker' => request('broker'),'status' => 'new']) }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
            <div class="col-12 col-sm-6 col-md-4"><div class="small-box bg-warning"><div class="inner"><h3>{{ $records->whereNull($cStatus)->where($bStatus,'Pending')->count() }}</h3><p>Records in pending</p></div><div class="icon"><i class="fas fa fa-edit"></i></div><a href="{{ route('compliance.broker',['broker' => request('broker'),'status' => 'pending']) }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
            <div class="col-12 col-sm-6 col-md-4"><div class="small-box bg-warning"><div class="inner"><h3>{{ $records->whereNull($bStatus)->where($cStatus,'Incomplete')->count() }}</h3><p>Incomplete Records</p></div><div class="icon"><i class="fas fa fa-star-half-alt"></i></div><a href="{{ route('compliance.broker',['broker' => request('broker'),'status' => 'incomplete']) }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
            <div class="col-12 col-sm-6"></div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-3"><div class="small-box bg-success"><div class="inner"><h3>{{ $records->where($bStatus,'Submitted')->count() }}</h3><p>Total Submitted</p></div><div class="icon"><i class="fas fa fa-check"></i></div><a href="{{ route('compliance.broker',['broker' => request('broker'),'status' => 'submitted']) }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
            <div class="col-12 col-sm-3"><div class="small-box bg-warning"><div class="inner"><h3>{{ $records->where($bStatus,'Submitted')->whereNull($cStatus)->count() }}</h3><p>Compliance review pending</p></div><div class="icon"><i class="fas fa fa-star-half"></i></div><a href="{{ route('compliance.broker',['broker' => request('broker'),'status' => 'unreviewed']) }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
            <div class="col-12 col-sm-3"><div class="small-box bg-success"><div class="inner"><h3>{{ $records->where($bStatus,'Submitted')->where($cStatus,'Approved')->count() }}</h3><p>Approved</p></div><div class="icon"><i class="fas fa fa-check-double"></i></div><a href="{{ route('compliance.broker',['broker' => request('broker'),'status' => 'approved']) }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
            <div class="col-12 col-sm-3"><div class="small-box bg-danger"><div class="inner"><h3>{{ $records->where($bStatus,'Submitted')->where($cStatus,'Rejected')->count() }}</h3><p>Rejected</p></div><div class="icon"><i class="fas fa fa-poo-storm"></i></div><a href="{{ route('compliance.broker',['broker' => request('broker'),'status' => 'rejected']) }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
        </div>
        @if(request('status'))
            @php
                $view = config('alramz.views.compliance.broker.' . request('status'));
                $view['conditions'] = array_merge($view['conditions'],['BROKER' => request('broker')]);
            @endphp
            @component('components.view-page',['role' => 'compliance', 'page' => null, 'view' => $view, 'gScope' => false]) @endcomponent
        @endif
    @else
        <div class="jumbotron text-center">
            <select class="form-control" onchange="location.href = '?broker=' + this.value"><option value="-">-- Select --</option>@forelse($brokers as $broker) <option value="{{ $broker->name }}" {{ request('broker') === $broker->name ? 'selected' : '' }}>{{ $broker->name }}</option> @empty <option>No Brokers Found</option> @endforelse</select>
        </div>
    @endif
@stop
