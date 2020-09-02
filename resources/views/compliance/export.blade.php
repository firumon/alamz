@extends('layout')

@section('title','Export')

@section('back-button',true)

@section('content')
    @if(session()->has('success')) <div class="alert alert-success">Import Success.. Imported {{ session()->get('success') }} records</div>@endisset
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="post" target="_blank" action="{{ route('records.preview') }}">@csrf
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label>Account</label>
                                <select class="form-control" multiple name="{{ HEAD_FIELD_DISPLAY['ACCOUNT NAME'] }}[]"><option value="" selected>All</option>@foreach(\App\Record::select(HEAD_FIELD_DISPLAY['ACCOUNT NAME'])->distinct()->get() as $account) <option value="{{ $account->{ HEAD_FIELD_DISPLAY['ACCOUNT NAME'] } }} }}">{{ $account->{ HEAD_FIELD_DISPLAY['ACCOUNT NAME'] } }}</option> @endforeach</select>
                            </div>

                            <div class="form-group col-4">
                                <label>Submit Type</label>
                                <select class="form-control" multiple name="{{ HEAD_FIELD_DISPLAY['Submit Type'] }}[]"><option value="" selected>All</option>@foreach(array_keys(config('alramz.submit')) as $type) <option value="{{ $type }}">{{ $type }}</option> @endforeach</select>
                            </div>

                            <div class="form-group col-4">
                                <label>Compliance Status</label>
                                <select class="form-control" multiple name="{{ HEAD_FIELD_DISPLAY['Status - Compliance'] }}[]"><option value="" selected>All</option>@foreach(config('alramz.options.ComplianceStatus') as $status) <option value="{{ $status }}">{{ $status }}</option> @endforeach</select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Broker</label>
                                <select class="form-control" multiple name="{{ HEAD_FIELD_DISPLAY['BROKER'] }}[]"><option value="" selected>All</option>@foreach(\App\User::where('role','broker')->get() as $broker) <option value="{{ $broker->name }}">{{ $broker->name }}</option> @endforeach</select>
                            </div>

                            <div class="form-group col-6">
                                <label>Broker Status</label>
                                <select class="form-control" multiple name="{{ HEAD_FIELD_DISPLAY['Status - Broker'] }}[]"><option value="" selected>All</option>@foreach(config('alramz.options.BrokerStatus') as $status) <option value="{{ $status }}">{{ $status }}</option> @endforeach</select>
                            </div>
                        </div>
                        <hr />
                        <div class="form-group">
                            <h4>Fields</h4>
                            <div class="row">
                                @foreach(config('alramz.head') as $type => $fields)
                                    @if(!empty($fields)) </div><div class="row mt-2"> @endif
                                    @foreach($fields as $field)
                                        <div class="col custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="chkbx-field-{{ $field }}" name="field[]" value="{{ HEAD_FIELD_DISPLAY[$field] }}" checked>
                                            <label class="custom-control-label" for="chkbx-field-{{ $field }}">{{ $field }}</label>
                                        </div>
                                        @if($loop->iteration % 4 === 0) </div><div class="row mt-2"> @endif
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="row mt-2">
                                @foreach(config('alramz.head_program') as $type => $fields)
                                    @if(!empty($fields)) </div><div class="row mt-2"> @endif
                                    @foreach($fields as $field)
                                        <div class="col custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="chkbx-field-{{ $field }}" name="field[]" value="{{ HEAD_FIELD_DISPLAY[$field] }}" checked>
                                            <label class="custom-control-label" for="chkbx-field-{{ $field }}">{{ $field }}</label>
                                        </div>
                                        @if($loop->iteration % 4 === 0) </div><div class="row mt-2"> @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-5">&nbsp;</div>
                            <div class="col-2"><input type="submit" name="action" value="Preview" class="btn btn-info btn-block"></div>
{{--                            <div class="col-5"><input type="submit" name="action" value="Download" class="btn btn-warning btn-block"></div>--}}
                            <div class="col-5">&nbsp;</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
