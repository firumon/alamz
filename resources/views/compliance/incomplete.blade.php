@extends('layout')

@section('title','Incomplete Records')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'compliance', 'page' => 'incomplete']) @endcomponent
@stop
