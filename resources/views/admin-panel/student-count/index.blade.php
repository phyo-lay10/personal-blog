@extends('admin-panel.master')
@section('title', 'student count index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pt-3 border-0">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="card-title">Student Count</h6>
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

                        @if (count($studentCounts) < 1)
                            <form action="{{url('admin/student_counts/store')}}"    method="POST"> @csrf
                                <div class="input-group mb-3">
                                    <input type="number" name="count" class="form-control @error('count') is-invalid @enderror">
                                    <button class="btn btn-primary" type="submit">
                                        Create
                                    </button>
                                    @error('count')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </form>
                        @endif

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Count</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($student)
                                    <tr>
                                        <td>{{$student->count}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info" id="addBtn">Add more student</button>

                                            <form action="{{url('admin/student_counts/'.$student->id. '/update')}}" method="post" class="col-md-6" style="display: none" id="addForm"> @csrf @method('put')
                                                <div class="input-group">
                                                    <input type="number"  required  name="count" class="form-control @error('count') is-invalid @enderror" placeholder="Enter student count">
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                    @error('count')
                                                        <span class="invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 pt-4">
                        {{-- {{$projects->links()}} --}}
                        {{-- {{$projects->links("pagination::bootstrap-5")}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $('#addBtn').click(function() {
            $('#addForm').css('display','block');
            $(this).css('display','none');
        });
    });

    // $(document).ready(function() {
    //     $(document).on('click', '#addBtn', function() {
    //         $('#addForm').css('display', 'block');
    //         $(this).css('display', 'none');
    //     });
    // });
</script>
@endsection