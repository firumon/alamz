@extends('layout')

@section('title','Un Reviewed Records')

@section('back-button',true)

@section('content')
    @component('components.view-page',['role' => 'broker', 'page' => 'unreviewed']) @endcomponent
@endsection
