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
                  <th>Role</th>
                  <th>User Name</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($roleUser as $role)
                  <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td>{{ $role->pivot->pivotParent->name??"N/A"}}</td>
                      <td>{{ $role->name}}</td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="3">No Record Found !!!</td>
                  </tr>
                  @endforelse
              </tbody>
            </table>
            
        </div>
    </div>
</div>    
@endsection


