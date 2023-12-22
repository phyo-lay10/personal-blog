@extends('admin-panel.master')
@section('title', 'category edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h5 class="card-title">Category Edit Form</h5>
                    </div>
                    <form action="{{route('categories.update', $category->id)}}" method="POST"> @csrf @method('put')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="mb-1">Name</label>
                                <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
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