@extends('layout')

@section('title','Submitted Records')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'broker', 'page' => 'submitted']) @endcomponent
@stop
