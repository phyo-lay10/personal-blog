@extends('admin-panel.master')
@section('title', 'post index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pt-3 border-0">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="card-title">Posts</h6>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('admin/posts/create')}}" class="btn btn-primary btn-sm float-end">Add New</a>
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
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $index => $post)
                                <tr>
                                    <td>{{$index + $posts->firstItem()}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>
                                        <img src="{{asset('storage/post-images/'.$post->image)}}" style="width:100px; height:100px; object-fit:cover" alt="404">
                                    </td>
                                    <td>{{$post->title}}</td>
                                    {{-- <td>{{$post->content}}</td> --}}
                                    <td><textarea rows="4"  readonly>{{$post->content}}</textarea></td>
                                    <td>
                                        <form action="{{route('posts.destroy',$post->id)}}" method="post"> @csrf @method('delete')
                                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-warning ">Edit</a>
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are u sure u wanna delete?')">Delete</button>
                                            <a href="{{url('admin/posts/'.$post->id)}}" class="btn btn-sm btn-info">Comments</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 pt-4">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    
