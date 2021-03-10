@extends('layout.master')
@section('content')
<div class="container">
  <h2>Post Comments</h2>
  <div class="row">
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
          <form action="{{ route('user.post.comment',[$postComment->id])}}" method="POST">
            @csrf 
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
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-sm-12">
            <h2>Comment List</h2>          
            <div>
              @if(Session::has('msg'))
                 {{ session('msg') }}
              @endif
            
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SN.</th>
                  <th>Email</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($postComment->postComments as $post)
                  <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td style="width: 500px;">{{ $post->description }}</td>
                      <td style="width: 200px;">{{ $post->created_at}}</td>
                      <th>
                          <a class="btn btn-danger" href="{{ route('user.post.comment',[$post->id])}}">Delete</a>

                          <a class="btn btn-info" href="{{ route('user.post.comment-detail',[$post->id])}}">Comment Detail</a>
                      </th>
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


