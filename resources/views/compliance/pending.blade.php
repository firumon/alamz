@extends('layout')

@section('title','Records to be reviewed')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'compliance', 'page' => 'pending']) @endcomponent
@stop
