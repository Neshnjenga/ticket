@extends('admin.app')
@section('title','Upload movies')
@section('content')
<form action="{{route('addpost')}}" method="post" enctype="multipart/form-data">
    @csrf
    @php
    use App\Models\Movie;
    $movies = Movie::all();
    @endphp
    @if ($errors->any())
        @foreach ($errors->all() as $error )
        <p style="color:red;">{{$error}}</p>
        @endforeach
        @endif
        @if (session('error'))
        <p style="color:red;">{{session('error')}}</p>
        @endif
        @if (session('success'))
        <p style="color:green;">{{session('success')}}</p>
        @endif
    <label for="">Genre</label>
    <select name="movieId" id="">
        <option value="" selected disabled>Choose movie genre</option>
        @foreach ($movies as $movie )
        <option value="{{$movie->id}}">{{$movie->name}}</option>
        @endforeach
    </select>
    <label for="">Movie Name</label>
    <input type="text" placeholder="Enter the movie name" name="name">
    <label for="">Price</label>
    <input type="text" name="price" placeholder="Enter the ticket price" >
    <label for="">Date and Time</label>
    <input type="datetime-local" name="date">
    <label for="">Description</label>
   <textarea name="description" id="" placeholder="Enter the movie description"></textarea>
    <label for="">Image</label>
    <input type="file" name="image" placeholder="Choose image">
    <button type="submit" class="btn btn-outline-primary">Upload</button>
</form>
@endsection