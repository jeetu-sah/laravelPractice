@extends('layout.master')
@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
      <div class="col-sm-12">
          <p>
              Here we will practice Polymorphic Relationships
          </p>
      </div>
    </div>
    <form action="{{route('polymorphic.upload-image',[$id])}}" 
            method="POST" 
            enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <h2>{{$title}}</h2>          
            <div>
              @if(Session::has('msg'))
                 {{ session('msg') }}
              @endif
            </div>
            
        </div>
        
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="customFile">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" />
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group" style="margin-top: 30px;">
                    <button type="submit" name="submit" id="submit" class="btn btn-success">
                        Upload
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>    
@endsection


