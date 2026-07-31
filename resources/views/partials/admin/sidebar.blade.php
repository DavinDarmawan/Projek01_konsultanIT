<div class="admin-sidebar">
    <div class="brand">
                    <a class="navbar-brand navbar-brand-custom" href="/">
                <img src="{{ asset('storage/logo/icommits.png') }}" alt="Icommits Logo" height="42">
            </a>
        Icommits<span>.</span>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                <i class="bi bi-list-check"></i> Services
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.portfolios*') ? 'active' : '' }}" href="{{ route('admin.portfolios.index') }}">
                <i class="bi bi-grid-3x3-gap"></i> Portfolio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.teams*') ? 'active' : '' }}" href="{{ route('admin.teams.index') }}">
                <i class="bi bi-people"></i> Tim
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.partners*') ? 'active' : '' }}" href="{{ route('admin.partners.index') }}">
                <i class="bi bi-handshake"></i> Partner
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.service-articles*') ? 'active' : '' }}" href="{{ route('admin.service-articles.index') }}">
                <i class="bi bi-file-earmark-text"></i> Artikel Service
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.hero*') ? 'active' : '' }}" href="{{ route('admin.hero.edit', 1) }}">
                <i class="bi bi-image"></i> Hero
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.benefits*') ? 'active' : '' }}" href="{{ route('admin.benefits.index') }}">
                <i class="bi bi-star"></i> Benefits
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.technologies*') ? 'active' : '' }}" href="{{ route('admin.technologies.index') }}">
                <i class="bi bi-cpu"></i> Technologies
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.cta*') ? 'active' : '' }}" href="{{ route('admin.cta.edit', 1) }}">
                <i class="bi bi-megaphone"></i> CTA
            </a>
        </li>
        <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.company*') ? 'active' : '' }}" href="{{ route('admin.company.edit', 1) }}">
        <i class="bi bi-building"></i> Company Info
    </a>
</li>
        <li class="nav-item mt-3">
            <a class="nav-link text-danger" href="/">
                <i class="bi bi-box-arrow-right"></i> Lihat Website
            </a>
        </li>
    </ul>
</div>