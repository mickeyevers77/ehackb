<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="/">EHACKB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{ Request::is('schedule') ? 'active' : '' }}">
                <a class="nav-link" href="/schedule">Schedule</a>
            </li>

            @if(Auth::user())
                @if(Auth::user()->is_admin)
                    <li class="nav-item dropdown {{ Request::is('admin/*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/admin/users">Users</a>
                            <a class="dropdown-item" href="/admin/events">Events</a>
                            <a class="dropdown-item" href="/admin/news">News</a>
                            <a class="dropdown-item" href="/admin/sponsors">Sponsors</a>
                        </div>
                    </li>
                @endif

                <li class="nav-item {{ Request::is('profile') ? 'active' : '' }}">
                    <a class="nav-link" href="/profile">{{ Auth::user()->getFullName() }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input type="submit" value="logout" style="display: none;">
                </form>
            @else
                <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
