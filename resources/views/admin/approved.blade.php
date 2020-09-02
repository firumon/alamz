@extends('layout')

@section('title','Approved Records')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'admin', 'page' => 'approved']) @endcomponent
@stop
