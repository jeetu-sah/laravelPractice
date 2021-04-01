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
                      <th><a href="{{route('user.role.show-role',[$user->id])}}">Role</a></th>
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


