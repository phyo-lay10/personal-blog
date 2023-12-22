@extends('ui-panel.master')
@section('title','posts')
@section('content')
  <div class="row">
    <div class="col-md-8">
      <div class="row">
          <div class="col-md-12">
            @foreach ($posts as $post)
                <div class="post">
                    <img src="{{asset('storage/post-images/'.$post->image)}}" alt="404" height="350px" width="100%" class="object-fit-cover rounded">
                    <br><br>
                        <h5><strong>{{$post->title}}</strong></h5>
                    <br>
                    <p> {{substr($post->content,0,100)}} </p>
                    <a href="{{url('posts/'. $post->id .'/details')}}">
                        <button class="btn btn-info">See More <i class="fas fa-angle-double-right"></i> </button>
                    </a>
                </div>
            @endforeach
            {{$posts->links()}}
          </div>
      </div>
    </div>
    <div class="col-md-4">
        <div class="siderbar">
            <form action="{{url('search_post')}}" method="GET"> @csrf
                  <div class="input-group">
                      <input type="text" name="search_data" class="form-control" placeholder="Search">
                      <button class="btn btn-success">
                          Search <i class="fa fa-search"></i>
                      </button>
                  </div>
            </form>
            <hr>
            <h5>Categories</h5>
            <ul>
                @foreach ($categories as $category)
                <li> <a href="{{url('search_post_by_category/'.$category->id)}}">{{$category->name}}</a> </li>
                @endforeach
            </ul>
        </div>
        {{$categories->links()}}
    </div>
  </div>
@endsection




                    
  