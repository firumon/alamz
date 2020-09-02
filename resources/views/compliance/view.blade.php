@extends('layout')

@section('title','Records')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'compliance', 'page' => 'all']) @endcomponent
@stop
