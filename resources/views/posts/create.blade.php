@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
              <div class="panel-heading">Create Post</div>
              <div class="panel-body">                        
                <form action="{{route('posts.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" placeholder="Title">                      
                      @error('title')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Body</label>
                        <textarea class="form-control" name="body" rows="4" placeholder="Body Text"></textarea>                     
                        @error('body')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div> 

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
               

              </div>
          </div>
      </div>
  </div>
</div>
    

@endsection