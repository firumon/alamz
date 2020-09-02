@extends('layout')

@section('title','Pending Records')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'broker', 'page' => 'pending']) @endcomponent
@stop
