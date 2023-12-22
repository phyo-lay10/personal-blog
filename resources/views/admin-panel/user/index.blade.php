@extends('admin-panel.master')
@section('title', 'user index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">User</h3>
                    </div>
                    <div class="card-body">
                        @if (session('successMsg'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div>{{session('successMsg')}}</div>
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>
                                    <form action="{{url('admin/users/'.$user->id.'/delete')}}" method="POST"> @csrf 
                                        @method('delete')
                                        <a href="{{{url('admin/users/'.$user->id. '{id}/edit')}}}" class="btn btn-warning btn-sm text-white">Edit</a>
                                        <button class="btn btn-danger btn-sm text-white" onclick="return confirm('Are u sure u wanna delete?')">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection