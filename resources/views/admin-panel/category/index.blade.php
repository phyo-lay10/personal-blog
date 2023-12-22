@extends('admin-panel.master')
@section('title', 'project index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pt-3 border-0">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="card-title">Categories</h6>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('admin/categories/create')}}" class="btn btn-primary btn-sm float-end">Add New</a>
                            </div>
                        </div>
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <form action="{{route('categories.destroy',$category->id)}}" method="post"> @csrf @method('delete')
                                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are u sure u wanna delete?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 pt-4">
                        {{$categories->links()}}
                        {{-- {{$projects->links("pagination::bootstrap-5")}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    
