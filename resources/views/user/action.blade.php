@extends('user.app')
@section('title','Action movies')
@section('content')
@foreach ($types as $type )
<div class="card">
  <div class="card-header">
    Action
  </div>
  <div class="card-body">
    <h5 class="card-title">Title:: {{$type->name}}</h5>
    <p class="card-text">Description:: {{$type->description}}</p>
    <p>Price:: <button class="btn btn-warning">{{$type->price}}</button></p>
    <div class="date">
        <p>{{$type->date}}</p>
    </div>
    <div class="image">
        <img src="{{asset($type->image)}}"  width="80" alt="">
    </div>
    <a href="#" class="btn btn-primary">Buy ticket</a>
  </div>
</div>
@endforeach
<!-- <table class="table">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Date</th>
        <th>Description</th>
        <th>Image</th>
    </tr>
    @foreach ($types as $type )
    <tr>
        <td>{{$type->name}}</td>
        <td>{{$type->price}}</td>
        <td>{{$type->date}}</td>
        <td>{{$type->description}}</td>
        <td><img src="{{asset($type->image)}}" height="60" width="60" alt=""></td>
    </tr>
    @endforeach
</table> -->
@endsection