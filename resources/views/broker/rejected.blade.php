@extends('layout')

@section('title','Rejected Records')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'broker', 'page' => 'rejected']) @endcomponent
@endsection
