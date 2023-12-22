@extends('admin-panel.master')
@section('title', 'skill edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header border-0">
                        <h5 class="card-title">Edit Form</h5>
                    </div>
                    <form action="{{route('skills.update', $skill->id)}}" method="POST"> @csrf @method('put')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="mb-1">Name</label>
                                <input type="text" name="name" id="name" value="{{$skill->name ?? old('name')}}" class="form-control @error('name') is-invalid  @enderror" placeholder="Enter skill name">
                                @error('name')
                                    <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="percent" class="mb-1">Percent</label>
                                <input type="text" name="percent" id="percent" value="{{$skill->percent ?? old('percent')}}"  class="form-control @error('percent') is-invalid  @enderror" placeholder="Enter skill percent">
                                @error('percent')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer border-0">
                            <button class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                {{-- card nae design ma lote yin de lo lote --}}
                {{-- <h5>Create Form</h5>
                <form action="{{url('admin/skills')}}" method="POST"> @csrf 
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid  @enderror" placeholder="Enter skill name">
                        @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="percent">Percent</label>
                        <input type="text" name="percent" id="percent" value="{{old('percent')}}"  class="form-control @error('percent') is-invalid  @enderror" placeholder="Enter skill percent">
                        @error('percent')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <button class="btn btn-sm btn-primary">Submit</button>
                </form> --}}
            </div>
        </div>
    </div>
@endsection