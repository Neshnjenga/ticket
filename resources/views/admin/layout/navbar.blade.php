
<div class="navbar">
    <div class="logo">
        <h3>GetTcket</h3>
    </div>
    <div class="ac">
    @auth()
        <a href="{{route('home')}}">Home</a>
        <a href="{{route('')}}">About</a>
        <a href="{{route('view')}}">View movies</a>
        <a href="{{route('upload')}}">Upload</a>
        <a href="{{route('')}}">Action</a>
        <a href="{{route('')}}">Animation</a>
        <a href="{{route('')}}">Horror</a>
        <a href="{{route('')}}">Syfy</a>
        @else
        <a href="{{route('login')}}">Home</a>
        <a href="{{route('register')}}">About</a>
        @endauth
    </div>
    <div class="navs">
        @auth()
        <a href="{{route('logout')}}">Logout</a>
        @else
        <a href="{{route('login')}}">Login</a>
        <a href="{{route('register')}}">Register</a>
        @endauth
    </div>
</div>