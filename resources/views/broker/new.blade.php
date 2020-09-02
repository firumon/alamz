@extends('layout')

@section('title','New Records to Submit')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'broker', 'page' => 'new']) @endcomponent
@stop
