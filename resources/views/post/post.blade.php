@extends('layout.master')
@section('content')
<div class="container">
  <h2>Upload Post</h2>
  <div class="row mb-5">
      <div class="col-sm-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('success'))
          <div class="alert alert-success">
                 {{ session('success') }}
          </div>
        @endif
          <form action="{{ route('user.post.store',[$userPost->id])}}" method="POST">
            @csrf 
              <div class="form-group">
                <label for="email">Title</label>
                <input class="form-control" 
                          name="title"
                          placeholder="title" 
                          id="description" />
              </>
              <div class="form-group">
                <label for="email">Comment</label>
                <textarea class="form-control" 
                          name="description"
                          placeholder="Comment" 
                          id="description"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Comment</button>
          </form>
      </div>
  </div>
</div>
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
                  <th>Title</th>
                  <th>Description</th>
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
