<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-sm-12">
            <h2>Uers Comments</h2>      
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
                  @forelse ($userData->userPostComment as $post)
                  <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td style="width: 500px;">{{ $post->description }}</td>
                      <td style="width: 200px;">{{ $post->created_at}}</td>
                      <th>
                          <a href="{{ route('user.post.comment',[$post->id])}}">Delete</a>
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

</body>
</html>
