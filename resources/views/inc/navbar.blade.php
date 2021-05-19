<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('home')}}">Fitness</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ areActiveRoutes(['home', 'informasi'])}}">
                <a class="nav-link" href="{{route('home')}}">Dashboard</a>
            </li>
            <li class="nav-item {{ areActiveRoutes(['profile'])}}">
                <a class="nav-link" href="{{route('profile')}}">Profil</a>
            </li>
            <li class="nav-item {{ areActiveRoutes(['member'])}}">
                <a class="nav-link" href="{{route('member')}}">Kartu Member</a>
            </li>
            <li class="nav-item {{ areActiveRoutes(['contact'])}}">
                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
            </li>
            </ul>
            <a href="{{ route('logout') }}" class="btn btn-outline-danger my-2 my-sm-0">Logout</a>
        </div>
    </nav>