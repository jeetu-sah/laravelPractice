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
                  <th>Image</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($products as $product)
                    @php
                        $images = $product->image;
                    @endphp
                  <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td>
                        @if($images != NULL)

                          {{ $images->name}}
                        @endif
                      </td>
                      <td>{{ $product->name}}</td>
                      <td>{{ $product->description}}</td>
                      <th><a href="{{route('polymorphic.image',[$product->id])}}">Image</a></th>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="3">No Record Found !!!</td>
                  </tr>
                  @endforelse
              </tbody>
            </table>
           {{ $products->links()}}
        </div>
    </div>
</div>    
@endsection


