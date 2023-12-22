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
                                <h6 class="card-title">Comments</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('successMsg'))
                            <div class="alert alert-success alert-dismissible">
                                <div>{{session('successMsg')}}</div>
                                <button class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        <table class="table table-bordered table-hover">
                            <tbody>
                                @if ($comments->count() < 1)
                                    No comment found!
                                @else
                                    @foreach ($comments as $index => $comment)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$comment->text}}</td>
                                        <td>
                                            <form action="{{url('admin/comment/'.$comment->id.'/show_hide')}}" method="post"> @csrf
                                                {{-- for 2 btns --}}
                                                {{-- @if($comment->status == 'show')
                                                    <button class="btn btn-sm btn-danger">Hide</button>
                                                @else
                                                    <button class="btn btn-sm btn-success">Show</button>
                                                @endif --}}

                                                {{-- for 1 btn --}}
                                                <button class="btn btn-sm {{$comment->status == 'show' ? 'btn-danger' : 'btn-success'}}">
                                                {{$comment->status == 'hide' ? 'Show' : 'Hide'}}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 pt-4">
                        {{-- {{$categories->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    
