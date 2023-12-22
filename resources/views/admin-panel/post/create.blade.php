@extends('admin-panel.master')
@section('title', 'post create')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header border-0">
                        <h5 class="card-title">Post Create Form</h5>
                    </div>
                    <form action="{{url('admin/posts')}}" method="POST" enctype="multipart/form-data"> @csrf 
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="category" class="mb-1">Category</label> <br/>
                                <select name="category_id" id="category" class="form-control @error('category_id') is-invalid  @enderror">
                                    <optgroup label="Select Category">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="mb-1">Image</label> <br/>
                                <input type="file" name="image" id="image" value="" class="@error('image') is-invalid  @enderror">
                                @error('image')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="mb-1">Title</label> <br/>
                                <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control @error('title') is-invalid  @enderror" placeholder="Enter post title">
                                @error('title')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="content" class="mb-1">Content</label> <br/>
                                <textarea name="content" id="content" rows="5" class=" @error('content') is-invalid  @enderror form-control" placeholder="Message ...">{{old('content')}}</textarea>
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