@extends('admin-panel.master')
@section('title', 'user edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">User Table</h3>
                    </div>
                    <form action="{{url('admin/users/'.$user->id.'/update')}}" method="POST">@csrf @method('put')
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <optgroup label="Select Status">
                                            <option value="admin" @if ($user->status == 'admin')
                                                selected
                                            @endif>Admin</option>
                                            <option value="user" @if ($user->status == 'user')
                                                selected
                                            @endif>User</option>
                                        </optgroup>
                                    </select>
                                </div>
                        </div>
                        <div class="card-footer border-0">
                            <button class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection