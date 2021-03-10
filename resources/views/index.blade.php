@extends('layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Users List</h2>          
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


