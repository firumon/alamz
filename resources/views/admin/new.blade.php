@extends('layout')

@section('title','New Records')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'admin', 'page' => 'new']) @endcomponent
@stop
