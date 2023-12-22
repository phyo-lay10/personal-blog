@extends('ui-panel.master')
@section('title','post-details')
@section('content')
  <div class="row">
    <div class="col-md-12 post-details">
        <img src="{{asset('storage/post-images/'. $post->image)}}" style="object-fit: cover; height: 500px" alt="404" height="450px" width="100%" class="object-fit-cover rounded">
        <br><br>
        <small> 
            <strong> 
                <i class="fa fa-calendar" aria-hidden="true"></i>
                Posted On:
            </strong>
                {{date('d-M-Y', strtotime($post->created_at))}}
        </small>
        <br>
        {{-- <small>
            <strong> 
                <i class="fa fa-edit" aria-hidden="true"></i>
                Written By:
            </strong> 
            Ye Myint Soe (The Happy Coder)
        </small>
        <br> --}}
        <small>
            <strong>
              <i class="fa fa-list"></i> Category:
            </strong>
            {{$post->category->name}}
        </small>
        <br><br>
        <h5><strong>{{$post->title}}</strong></h5>
        <p style="text-align: justify;">
          {{$post->content}}
        </p>
        <div>
            <form method="POST"> @csrf
                <div>
                    <span>
                        {{$likes->count()}}  {{$likes->count() > 1 ? 'likes' : 'like'}} &nbsp; &nbsp;
                    </span>
                    <span>
                        {{$dislikes->count()}} {{$dislikes->count() > 1 ? 'dislikes' : 'dislike'}} &nbsp;
                    </span>
                    <span>
                        {{count($comments)}} {{count($comments) > 1 ? 'comments' : 'comment'}}
                    </span>      
                </div>
                <button formaction="{{url('post/like/'.$post->id)}}" class="btn btn-sm btn-success like 
                    @if($likeStatus) 
                        @if($likeStatus->type == 'like') disabled  @endif
                    @endif">
                    <i class="far fa-thumbs-up"></i> Like 
                </button>
                <button formaction="{{url('post/dislike/'.$post->id)}}" class="btn btn-sm btn-danger dislike
                    @if($likeStatus)
                        @if($likeStatus->type == 'dislike') disabled @endif
                    @endif">
                    <i class="far fa-thumbs-down"></i> Dislike 
                </button>
                <button type="button" class="btn btn-sm btn-info comment" data-toggle="collapse" data-target="#collapseExample">
                    <i class="far fa-comment"></i> Comment 
                </button>
            </form>
        </div>
        <br>
        <div class="comment-form">
            <div class="collapse" id="collapseExample">
                <form action="{{url('post/comment/'.$post->id)}}" method="POST"> @csrf
                    <div class="form-group">
                        <textarea name="text" required cols="30" rows="5"></textarea>
                        <br>
                        <button class="btn btn-primary btn-sm">
                            <i class="far fa-paper-plane"></i> Submit
                        </button>
                    </div>
                </form>
                <br>
                @foreach ($comments as $comment)
                    <div class="comment-show">
                        <img src="https://pluspng.com/img-png/user-png-icon-male-user-icon-512.png" alt="" width="30px"> {{ $comment->user->name }}
                        <div class=" comment-box mt-2">
                            {{$comment->text}}
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
  </div>
@endsection