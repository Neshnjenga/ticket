@extends('user.app')
@section('title','Animation Movies')
@section('content')
@foreach ($types as $type )
<div class="card">
  <div class="card-header">
    Animation
  </div>
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;">{{$type->name}}</h5>
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
@endsection