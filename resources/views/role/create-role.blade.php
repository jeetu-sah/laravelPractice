@extends('layout.master')
@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
      <div class="col-sm-12">
          <p>
              Here we will practice Many To Many relationship.
          </p>
          @include('role.component.header')
           
      </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>{{$title}}</h2>          
            <div>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if(Session::has('msg'))
                 {{ session('msg') }}
              @endif
            </div>
            <form action="{{ route('user.role.store')}}" method="POST">
            @csrf 
              <div class="form-group">
                <label for="email">Title</label>
                <input class="form-control" 
                          name="role_name"
                          placeholder="Role Name" 
                          id="role_name" />
              </div>
              <div class="form-group">
                <label for="email">Description</label>
                <textarea class="form-control" 
                          name="description"
                          placeholder="Description" 
                          id="description"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Comment</button>
          </form>
        </div>
    </div>
</div>    
@endsection


