@extends('admin.app')
@section('title','Get movies')
@section('content')
<a href="/add" class="btn btn-secondary" style="margin:10px;">Add movie</a>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Movie id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Date</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    @foreach ($datas as $data )
    <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->movieId}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->price}}</td>
        <td>{{$data->date}}</td>
        <td>{{$data->description}}</td>
        <td><img src="{{asset($data->image)}}" height="60" width="60" alt=""></td>
        <td>
            <a href="" class="btn btn-primary">Edit</a>
            <a href="" class="btn btn-danger">Danger</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection