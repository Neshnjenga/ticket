@extends('user.app')
@section('title','Syfy Movies')
@section('content')

<div class="row">
@foreach ($types as $type )
    <div class="col-lg-3">
        
    <div class="card mb-3">
    <div class="card-header">
    {{$name}}
  </div>
  <img src="{{asset($type->image)}}" height="300" class="card-img-top" alt="...">
  <div class="card-body">

    <h5 class="card-title"> {{$type->name}}</h5>
    <p class="card-text">{{$type->description}}</p>
    <p class="card-text">{{$type->date}}</p>
    <div class="row" >
    <div class="col-lg-6">
    <p class="card-text"  ><button class="btn btn-warning">{{$type->price}}</button></p>
    </div>
    <div class="col-lg-6">
    <a href="#" class="btn btn-primary">Buy ticket</a>
    </div>
    </div>
    
  </div>
</div>
</div>
@endforeach
</div>
@endsection