@extends('layouts.app')

@section('content')
<div><a class="btn btn-primary pull-left" href="{{route('posts.index')}}">Back to Posts</a></div>

<div class="container">  
  <div class="row">   
      <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">            
              <div class="panel-heading">{{ $post->title}}</div>
              <div class="panel-body">                        
                      <h3>{{$post->body}}</h3>
                      <small>Written {{$post->created_at->diffForHumans()}} by {{$post->user->name}} </small>      
                                             
                      <hr>         
                      @if(!Auth::guest())
                      @if(Auth::user()->id == $post->user_id)                      
                          <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                            <a class="btn btn-success" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                            &nbsp;
                            @csrf
                            @method('DELETE')          
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>                      
                        @endif
                    @endif  
                    &nbsp;                
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
                     
                     
                     <span>{{$post->likes->count()}} {{ Str::plural('like', 
                      $post->likes->count())}}</span>                  
                    
                                    
                    <hr>
                                        
                        <hr>

                      
              </div>
          </div>
      </div>
  </div>
</div>

    

@endsection