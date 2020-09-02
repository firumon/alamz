@extends('layout')

@php
$user = \Illuminate\Support\Facades\Auth::user();
@endphp

@section('title',$user->name)

@section('content')
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <strong><i class="fas fa-user-tie mr-1"></i>Name</strong><p class="text-muted">{{ $user->name }}</p><hr>
                    <strong><i class="fas fa-envelope-square mr-1"></i>Email</strong><p class="text-muted">{{ $user->email }}</p><hr>
                    <strong><i class="fas fa-user-graduate mr-1"></i>Role</strong><p class="text-muted">{{ $user->role }}</p><hr>
                    <strong><i class="fas fa-hourglass-start mr-1"></i>Status</strong><p class="text-muted">{{ $user->status }}</p>
                </div>
            </div>
        </div>
        <div class="col-7">
            <form action="" method="post">@csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-3">Name</label>
                            <div class="col-9">
                                <input class="form-control" autocomplete="off" type="text" name="name" id="name" value="{{ $user->name }}">
                            </div>
                            <span class="offset-3 text-muted">Name should be same as name in records for Broker and Compliance</span>
                        </div>
                        <div class="form-group row"><label for="email" class="col-3">Email</label><div class="col-9"><input class="form-control" autocomplete="off" type="text" name="email" id="email" value="{{ $user->email }}"></div></div>
                        <div class="form-group row"><label for="password" class="col-3">Password</label><div class="col-9"><input class="form-control" autocomplete="off" type="password" name="password" id="password" value="" placeholder="Leave empty for no change"></div></div>
                    </div>
                    <div class="card-footer text-right">
                        <input type="submit" name="submit" value="Update" class="btn-success btn">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
