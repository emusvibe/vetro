@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        

          <div class="panel panel-default">
            @if(session('error'))       

            <div class="alert alert-danger" role="alert">
              <strong>{{session('error')}}</strong> 
          </div>            
            @endif

            @if(session('success'))        

            <div class="alert alert-success" role="alert">
              <strong>{{session('success')}}</strong> 
          </div>            
            @endif

              <div class="panel-heading">All Posts
                &nbsp;
                &nbsp;
                
                <a href="{{route('posts.create')}}" class="btn btn-primary">Create Post</a>
              </div>
              
              <div class="panel-body">                  
                  @if(count($posts) > 0)
                  @foreach($posts as $post)
                      <h2><a href="/posts/{{$post->id}}">{{ $post->title}}</a></h2>
                      <h3>{{$post->body}}</h3>
                      <small>Written {{$post->created_at->diffForHumans()}} by {{$post->user->name}}</small>
                      <hr>
                      @auth
                      @if(!$post->likedBy(auth()->user()))                                          
                      <form action="{{route('posts.likes', $post)}}" method="POST">
                        <button type="submit" class="btn btn-success"><i class="fa fa-thumbs-up"></i></button>                        
                        @csrf
                      </form>
                      @else
                      &nbsp;                      
                      <form action="{{route('posts.likes', $post)}}" method="POST">
                        @csrf
                        @method('DELETE')          
                        <button type="submit" class="btn btn-danger"><i class="fa fa-thumbs-down"></i></button>
                      </form> 
                      @endif
                      @endauth                   
                       
                       <span>{{$post->likes->count()}} {{ Str::plural('like', 
                        $post->likes->count())}}</span>                      
                                      
                      <hr>
                  @endforeach
                  {{$posts->links()}}
                @else
                    <p>No Posts Found</p>
                @endif

              </div>
          </div>
      </div>
  </div>
</div>
    

@endsection