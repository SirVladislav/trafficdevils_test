<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/main">Dashboard</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            @if (Auth::check())
                <li class="nav-item">
                    <span class="navbar-text mr-3">Привет, {{ Auth::user()->name }}!</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Выйти</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Войти</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
