@extends('layout.master')
@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-sm-12">
            <h2>Comment Detail</h2>          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SN.</th>
                  <td>{{$commentDetail->id??"N/A"}}</td>
                </tr>
                <tr>
                  <th>User</th>
                  <td>{{$commentDetail->post->user->name??"N/A"}}</td>
                </tr>
                <tr>
                  <th>Post</th>
                  <td>{{$commentDetail->post->title??"N/A"}}</td>
                </tr>
                <tr>
                  <th>Comment</th>
                  <td style="width:500px;">{{$commentDetail->description??"N/A"}}</td>
                </tr>
                <tr>
                  <th>Action</th>
                  <th><a class="btn btn-success" href="{{ route('user.post.comment',[24])}}">Back</a></th>
                </tr>
              </thead>
              <tbody>
                 
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


