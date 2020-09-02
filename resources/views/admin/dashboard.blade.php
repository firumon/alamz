@extends('layout')

@php
$head = HEAD_FIELD_DISPLAY;
$records = new \App\Record;
$bStatus = $head['Status - Broker'];
$cStatus = $head['Status - Compliance'];
$users = new \App\User;
@endphp

@section('title','Dashboard')

@section('content')

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-info"><div class="inner"><h3>{{ $records->whereNull($bStatus)->whereNull($cStatus)->count() }}</h3><p>New Records</p></div><div class="icon"><i class="fas fa fa-code-branch"></i></div><a href="{{ route('admin.new') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-warning"><div class="inner"><h3>{{ $records->whereNull($cStatus)->where($bStatus,'Submitted')->count() }}</h3><p>Pending Reviews</p></div><div class="icon"><i class="fas fa fa-edit"></i></div><a href="{{ route('admin.pending') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-danger"><div class="inner"><h3>{{ $records->where($cStatus,'Rejected')->count() }}</h3><p>Rejected</p></div><div class="icon"><i class="fas fa fa-poo-storm"></i></div><a href="{{ route('admin.rejected') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
        <div class="col-12 col-sm-6 col-md-3"><div class="small-box bg-success"><div class="inner"><h3>{{ $records->where($cStatus,'Approved')->count() }}</h3><p>Approved</p></div><div class="icon"><i class="fas fa fa-check-double"></i></div><a href="{{ route('admin.approved') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div></div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card"><div class="card-header"><h3 class="card-title">Recent Activities</h3></div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead><tr><th>#</th><th>Time</th><th>Activity</th><th>User</th></tr></thead>
                        <tbody>
                        @forelse(\App\Activity::latest()->where('created_at','>=',now()->subDays(config('alramz.activity.days'))->toDateTimeString())->get()->take(config('alramz.activity.count')) as $activity)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ date(config('alramz.activity.format'),strtotime($activity->created_at)) }}</td>
                                <td>{!! $activity->activity !!}</td>
                                <td>{{ $activity->user }}</td>
                            </tr>
                            @empty
                            <tr><th colspan="4">No activities within {{ config('alramz.activity.days') }} days</th></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="small-box bg-light"><div class="inner"><h3>{{ $users->where('role','broker')->count() }}</h3><p>Total Brokers</p></div><div class="icon"><i class="fas fa fa-user-edit"></i></div><a href="{{ route('brokers') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div>
            <div class="small-box bg-light"><div class="inner"><h3>{{ $users->where('role','compliance')->count() }}</h3><p>Total Compliance</p></div><div class="icon"><i class="fas fa fa-user-secret"></i></div><a href="{{ route('compliance') }}" class="small-box-footer">View Records <i class="fas fa-arrow-circle-right"></i></a></div>
        </div>
    </div>

@stop
