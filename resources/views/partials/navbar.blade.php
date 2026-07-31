<header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand navbar-brand-custom" href="/">
                <img src="{{ asset('storage/logo/icommits.png') }}" alt="Icommits Logo" height="42">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom @yield('home')" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom @yield('about')" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom @yield('contact')" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>

                <!-- CTA Button -->
                <div class="d-flex">
                    <a href="https://wa.me/6281990300100" class="btn btn-custom btn-custom-primary">
                        Mulai Konsultasi <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>