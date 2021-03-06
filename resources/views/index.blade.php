@extends('layout.master')
@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
      <div class="col-sm-12">
        <a href="{{ route('index') }}" class="btn btn-success">All Users</a>&nbsp;
        <a href="{{ route('user.user-has-post') }}" class="btn btn-success">Users Has Post</a>
        <a href="{{ route('user.user-does-not-have-post-comment') }}" 
           class="btn btn-success">Users Does Not Post Comment</a>

        <a href="{{ route('user.user-has-post-comment') }}" 
           class="btn btn-success">Users Has Post Comment</a>
           
      </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>{{$title}}</h2>          
            <div>
              @if(Session::has('msg'))
                 {{ session('msg') }}
              @endif
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SN.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($users as $user)
                  <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td>{{ $user->name}}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->created_at}}</td>
                      <th><a href="{{ route('user.post',[$user->id])}}">Post</a></th>
                      <th><a href="{{ route('user.delete',[$user->id])}}">Delete</a></th>
                      <th><a href="{{ route('user.comment',[$user->id])}}">Uses Comment</a></th>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="3">No Record Found !!!</td>
                  </tr>
                  @endforelse
              </tbody>
            </table>
            {{ $users->links()}}
        </div>
    </div>
</div>    
@endsection


