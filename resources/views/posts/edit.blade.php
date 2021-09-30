@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
              <div class="panel-heading">Edit Post</div>
              <div class="panel-body">                        
                <form action="{{route('posts.update', $post->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" value="{{$post->title}}">                      
                      @error('title')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Body</label>
                        {{-- <textarea class="form-control" name="body" rows="3"> {{ old('body', $post->body) }}</textarea>                      --}}
                       
                        <textarea class="form-control" name="body" placeholder="Body Text">{{ $post->body }}</textarea>
                        @error('body')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div> 

                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
               

              </div>
          </div>
      </div>
  </div>
</div>
    

@endsection