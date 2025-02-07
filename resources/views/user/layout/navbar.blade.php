<div class="navbar">
    <style>
        .active{
            background-color: white;
            color: red !important;
        }

    </style>
    <div class="logo">
        <h3>Get Ticket</h3>
    </div>
    <div class="ac">
    @auth()
        <a href="{{route('home')}}" class="{{ request()->routeIs('home') ? 'active':'' }}">Home</a>
        <a href="">About</a>
        <a href="{{ route('check', ['name' => 'Action']) }}" class="{{  request()->route('name') == 'Action' ? 'active' : '' }}">Action</a>
        <a href="{{ route('check', ['name' => 'Animation']) }}" class="{{  request()->route('name') == 'Animation' ? 'active' : '' }}">Animation</a>
        <a href="{{ route('check', ['name' => 'Horror']) }}" class="{{  request()->route('name') == 'Horror' ? 'active' : '' }}">Horror</a>
        <a href="{{ route('check', ['name' => 'Syphy']) }}" class="{{  request()->route('name') == 'Syphy' ? 'active' : '' }}">Syfy</a>

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