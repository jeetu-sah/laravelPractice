@extends('layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Post List</h2>          
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
                  @forelse ($userPost->posts as $post)
                  <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td style="width: 200px;">{{ $post->title}}</td>
                      <td style="width: 200px;">{{ $post->description }}</td>
                      <td>{{ $post->created_at}}</td>
                      <th><a href="{{ route('user.post.comment',[$post->id])}}">Comment</a></th>
                   
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
