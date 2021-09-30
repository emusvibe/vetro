@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-6 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Register</div>
              <div class="panel-body">                        
                <form action="{{route('register')}}" method="POST">
                    @csrf

                    <div class="form-group">                      
                      <input type="text" class="form-control" name="name" placeholder="Your name" value="{{old('name')}}">                      
                      @error('name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="form-group">                      
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}">                      
                        @error('username')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">                      
                        <input type="email" class="form-control" name="email" placeholder="Your email" value="{{old('email')}}">                      
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">                      
                        <input type="password" class="form-control" name="password" placeholder="Choose a password">                      
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">                      
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat your password">                 
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>              

              </div>
          </div>
      </div>
  </div>
</div>
    

@endsection