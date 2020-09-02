@extends('layout')

@php
if(request()->getMethod() === 'POST'){
    if(request()->submit === 'Update Detail' && request()->filled(['id'])){
        \App\User::where('id',request()->id)->update(request()->merge(['role' => 'broker'])->only(['name','email','role','status']));
        \App\Activity::activity('Updated details of user ' . request('name'));
    } else {
        \App\User::create(request()->merge(['role' => 'broker'])->only(['name','email','role','password']));
        \App\Activity::activity('Created new user ' . request('name') . ', with role ' . request('role'));
    }
}
$users = \App\User::where('role','broker')->get();
@endphp

@section('title','Brokers')

@section('content')

    <form class="" method="post">@csrf
        <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add new Broker</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body px-3">
                            <div class="form-group row mb-2">
                                <label for="form_name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9"><input type="text" name="name" class="form-control" id="form_name"></div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="form_email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9"><input type="email" name="email" class="form-control" id="form_email"></div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="form_password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9"><input type="password" name="password" class="form-control" id="form_password"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" value="Add Broker" class="btn btn-primary">
                        </div>
                </div>
            </div>
        </div>
    </form>
    <form class="" method="post">@csrf
        <div class="modal fade" tabindex="-1" role="dialog" id="updateModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Broker</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body px-3">
                            <div class="form-group row mb-2">
                                <input type="hidden" name="id" value="">
                                <label for="form_name2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9"><input type="text" name="name" class="form-control" id="form_name2"></div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="form_email2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9"><input type="email" name="email" class="form-control" id="form_email2"></div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="form_status2" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9"><select name="status" id="form_status2" class="form-control"><option value="Active">Active</option><option value="Inactive">Inactive</option></select></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" value="Update Detail" class="btn btn-primary">
                        </div>
                </div>
            </div>
        </div>
    </form>

{{--    @section('add','OK')--}}

    @section('button')<button class="btn btn-primary" onclick="AddBroker()">Add Broker</button>@stop

    <div class="table-responsive">
        <table class="table table-sm">
            <thead><tr><th>#</th><th>Name</th><th>Email</th><th>Status</th><th></th></tr></thead>
            <tbody>
                @forelse($users as $user)
                    <tr><td>{{ $loop->iteration }}</td><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->status }}</td><td><button class="btn btn-xs btn-warning" onclick="UpdateModal({{ $user->id }})">Update</button></td></tr>
                @empty
                    <tr><td colspan="5">No Brokers found!!!</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

@stop

@push('js')
    <script type="text/javascript">
        let users = @json($users->keyBy->id);
        function AddBroker() {
            $('#addModal').modal('show');
        }
        function UpdateModal(id) {
            $.each(['id','name','email','status'],function (i,name) {
                $('[name="'+name+'"]','#updateModal').val(users[id][name]);
            });
            $('#updateModal').modal('show');
        }
    </script>
@endpush
