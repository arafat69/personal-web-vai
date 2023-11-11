<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-link {{ request()->routeIs('root') ? 'active' : '' }}" href="{{ route('root') }}">
                    Home
                </a>
                <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                    About
                </a>
                <a class="nav-link {{ request()->routeIs('teaching') ? 'active' : '' }}" href="{{ route('teaching') }}">
                    Teaching Philosophy
                </a>
                <a class="nav-link {{ request()->routeIs('curriculum') ? 'active' : '' }}"
                    href="{{ route('curriculum') }}">
                    Curriculum Vitae &Research
                </a>
                <a class="nav-link {{ request()->routeIs('course') ? 'active' : '' }}" href="{{ route('course') }}">
                    Course Information
                </a>
            </div>
        </div>
    </div>
</nav>
