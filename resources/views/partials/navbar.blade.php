<nav class="navbar navbar-expand-lg neo-navbar sticky-top">
    <div class="container">
<a class="navbar-brand" href="/">
    <img src="{{ asset('storage/logo/icommits.png') }}" alt="Logo" style="height: 30px; width: auto; margin-right: 8px; display: inline-block;">
    Icommits<span>.</span>
</a>
        <button class="navbar-toggler border-2 border-black" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Kontak</a></li> <!-- BARU -->
                <li class="nav-item">
                    <a class="nav-link neo-btn neo-btn-yellow" href="/contact" style="padding: 8px 24px; font-size: 0.9rem;">
                        Hubungi Kami
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>