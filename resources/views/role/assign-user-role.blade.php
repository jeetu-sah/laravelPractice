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
              @if(Session::has('success'))
                 {!! session('success') !!}
              @endif
            </div>
         </div>
    </div>
    <form action="{{ route('user.role.assign_role',[$user_id])}}" method="POST">
      @csrf 
        <div class="row">
          @foreach ($userRoles->roles as $assignRole)
            <div class="col-sm-3 mt-2">
              <input type="checkbox" 
                    name="role[]" id="role"
                    value="{{$assignRole->id}}" checked> {{$assignRole->name}}
            </div>
          @endforeach
          <br />
        </div>
        <div class="row">
          @foreach ($userNotHaveRole as $role)
            <div class="col-sm-3 mt-2">
              <input type="checkbox" 
                    name="role[]" id="role"
                    value="{{$role->id}}"> {{$role->name}}
            </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col-sm-3 mt-2">
            <button type="submit" class="btn btn-info" name="submit">Assign Role</button>
          </div>
        </div>
      </form>
</div>    
@endsection


