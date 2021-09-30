@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-6 col-md-offset-2">
          <div class="panel panel-default">
            @if(session('status'))
            <div class="alert alert-danger" role="alert">
                {{session('status')}}
            </div>
            @endif
              <div class="panel-heading">Login</div>
              <div class="panel-body">   

                <form action="{{route('login')}}" method="POST">
                    @csrf
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
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>              

              </div>
          </div>
      </div>
  </div>
</div>
    

@endsection