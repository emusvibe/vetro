@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">  
                <div class="panel-heading">
                    Dashboard                 
                </div>
                <div class="panel-heading">Your Posts 
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <a href="{{route('posts.create')}}" class="btn btn-primary">Create Post</a>
                  </div>
                
                <div class="panel-body">  
                    @if(count($posts) > 0)                
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <td>Action</td>                            
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>                           
                            <td><form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                <a class="btn btn-success" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                &nbsp;
                                @csrf
                                @method('DELETE')          
                                <button type="submit" class="btn btn-danger">Delete</button>
                             </form></td>                                 
                        </tr>
                        @endforeach
                    </table>                   
                    @else
                    <p>Your have no posts</p>
                    @endif
                </div>
        </div>
    </div>
  </div>
@endsection