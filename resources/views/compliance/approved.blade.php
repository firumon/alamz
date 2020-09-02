@extends('layout')

@section('title','Approved Records')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'compliance', 'page' => 'approved']) @endcomponent
@stop
