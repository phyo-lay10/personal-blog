@extends('admin-panel.master')
@section('title', 'project create')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h5 class="card-title">Project Create Form</h5>
                    </div>
                    <form action="{{url('admin/projects')}}" method="POST"> @csrf 
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="mb-1">Name</label>
                                <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid  @enderror" placeholder="Enter project name">
                                @error('name')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="url" class="mb-1">URL</label>
                                <input type="text" name="url" id="url" value="{{old('url')}}"  class="form-control @error('url') is-invalid  @enderror" placeholder="Enter project url">
                                @error('url')
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