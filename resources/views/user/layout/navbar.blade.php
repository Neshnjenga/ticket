<div class="navbar">
    <div class="logo">
        <h3>GetTcket</h3>
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