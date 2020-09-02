@extends('layout')

@section('title','Import')

@section('content')
    @if(session()->has('success')) <div class="alert alert-success">Import Success.. Imported {{ session()->get('success') }} records</div>@endisset
    @unless($records)
        <div class="card">
            <form method="post">@csrf
                <input type="hidden" name="import" value="Step1">
                <div class="card-body">
                    <textarea name="data" class="form-control" rows="10"></textarea>
                </div>
                <div class="card-footer">
                    <input type="submit" name="action" value="Load Data" class="btn btn-info btn-block">
                </div>
            </form>
        </div>
    @else
        <style> input[type="text"]{ min-width: 50px; border: none; } </style>
        <form method="post">@csrf
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive bg-white">
                        <table class="table table-sm">
                            <thead><tr>@foreach($head as $th)<th nowrap="nowrap">{{ $th }}</th>@endforeach</tr></thead>
                            <tbody>
                                @forelse($records as $r => $row)
                                    <tr>@foreach($row as $k => $col)<td nowrap="nowrap"><input name="data[{{ $r }}][{{ $fields[$head[$k]] }}]" type="text" value="{!! $col !!}" style="width:{{ strlen($col)*7.5 }}px;"></td>@endforeach</tr>
                                @empty
                                    <tr><td nowrap="nowrap" colspan="{{ count($head) }}">NO RECORDS</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" name="action" value="Insert Data" class="btn btn-info btn-block">
                </div>
            </div>
        </form>
    @endunless
@stop
