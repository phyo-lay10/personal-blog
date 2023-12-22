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
                                <h6 class="card-title">Projects</h6>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('admin/projects/create')}}" class="btn btn-primary btn-sm float-end">Add New</a>
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
                                    <th>URL</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->name}}</td>
                                    <td>{{$project->url}}</td>
                                    <td>
                                        <form action="{{route('projects.destroy', $project->id)}}" method="post"> @csrf @method('delete')
                                            <a href="{{route('projects.edit', $project->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are u sure u wanna delete?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 pt-4">
                        {{$projects->links()}}
                        {{-- {{$projects->links("pagination::bootstrap-5")}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    
