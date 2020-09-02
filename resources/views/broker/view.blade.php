@extends('layout')

@section('title','Records')

@section('content')
    @component('components.view-page',['role' => 'broker', 'page' => 'all']) @endcomponent
@stop
