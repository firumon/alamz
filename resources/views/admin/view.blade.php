@extends('layout')

@section('title','Records')

@section('button') <a href="{{ route('import') }}" class="btn btn-primary">IMPORT</a> @stop

@section('content')
    @component('components.view-page',['role' => 'admin', 'page' => 'all']) @endcomponent
@stop
