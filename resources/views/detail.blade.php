@extends('layout')

@php
$Head = HEAD_FIELD_DISPLAY;
$record = \App\Record::find($id);
$role = \Illuminate\Support\Facades\Auth::user()->role;
@endphp

@section('title','Record Detail')

@section('button') <a class="btn-warning btn" href="{{ url()->previous() }}"><i class="fas fa fa-fw fa-angle-double-left"></i> Back</a> @stop

@section('content')
    <style> p.text-muted { height: 25px; } </style>
    <div class="card">
        <div class="card-body px-5">
            <div class="row">
                @foreach($Head as $display => $field)
                    @continue($display === 'Attachment')
                    <div class="col-12 col-sm-6 px-0"><strong>{{ $display }}</strong><p class="text-muted">{{ $record->$field }}</p><hr></div>
                @endforeach
                @if($record->{ $Head['Attachment'] })
                        <div class="col-12 col-sm-6 px-0"><strong>Attachment</strong><p class="text-muted"><a href="{{ \Illuminate\Support\Facades\Storage::disk('attachment')->url($record->{ $Head['Attachment'] }) }}" download>Download Attachment</a></p><hr></div>
                    @endif
            </div>
        </div>
    </div>
@stop
