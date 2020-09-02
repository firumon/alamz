@extends('layout')

@section('title','Pending Records')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'admin', 'page' => 'pending']) @endcomponent
@stop
