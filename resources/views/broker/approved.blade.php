@extends('layout')

@section('title','Approved Records')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'broker', 'page' => 'approved']) @endcomponent
@endsection
