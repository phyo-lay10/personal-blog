@extends('admin-panel.master')
@section('title', 'post edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header border-0">
                        <h5 class="card-title">Post Edit Form</h5>
                    </div>
                    <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data"> @csrf @method('put')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="category" class="mb-1">Category</label> <br/>
                                <select name="category_id" id="category" class="form-control @error('category') is-invalid  @enderror">
                                    <optgroup label="Select Category">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}"
                                                {{$post->category_id == $category->id ? 'selected' : ''}}
                                            >{{$category->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('category')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="mb-1">Image</label> <br/>
                                <input type="file" name="image" id="image" class="@error('image') is-invalid  @enderror mb-3 "> <br/>
                                <img src="{{asset('storage/post-images/'.$post->image)}}" style="width:100px; height:100px; object-fit:cover" alt="404">
                                @error('image')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="mb-1">Title</label> <br/>
                                <input type="text" name="title" id="title" value="{{old('title') ?? $post->title}}" class="form-control @error('title') is-invalid  @enderror" placeholder="Enter post title">
                                @error('title')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="content" class="mb-1">Content</label> <br/>
                                <textarea name="content" id="content" cols="30" rows="10" class=" @error('content') is-invalid  @enderror form-control" placeholder="Message ...">{{old('content') ?? $post->content}}</textarea>
                                @error('content')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer border-0">
                            <button class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
@endsection