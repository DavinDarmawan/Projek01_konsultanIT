<div class="admin-sidebar">
    <div class="brand">
    <a href="/" class="text-decoration-none d-flex flex-column align-items-center">

       <img
    src="{{ asset('storage/logo/icommits.png') }}"
    alt="Icommits Logo"
    style="width:80px; height:auto;"
    class="mb-2">

        <div class="brand-text">
            Icommits<span>.</span>
        </div>

    </a>
</div>
    <ul class="nav flex-column">

    <li class="menu-title">
        MAIN
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="menu-title mt-3">
        CONTENT
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}"
            href="{{ route('admin.services.index') }}">
            <i class="bi bi-list-check"></i>
            <span>Services</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.portfolios*') ? 'active' : '' }}"
            href="{{ route('admin.portfolios.index') }}">
            <i class="bi bi-grid-3x3-gap"></i>
            <span>Portfolio</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.hero*') ? 'active' : '' }}"
            href="{{ route('admin.hero.edit', 1) }}">
            <i class="bi bi-image"></i>
            <span>Hero</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.benefits*') ? 'active' : '' }}"
            href="{{ route('admin.benefits.index') }}">
            <i class="bi bi-star"></i>
            <span>Benefits</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.technologies*') ? 'active' : '' }}"
            href="{{ route('admin.technologies.index') }}">
            <i class="bi bi-cpu"></i>
            <span>Technologies</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.cta*') ? 'active' : '' }}"
            href="{{ route('admin.cta.edit', 1) }}">
            <i class="bi bi-megaphone"></i>
            <span>CTA</span>
        </a>
    </li>

    <li class="menu-title mt-3">
        COMPANY
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.company*') ? 'active' : '' }}"
            href="{{ route('admin.company.edit', 1) }}">
            <i class="bi bi-building"></i>
            <span>Company Info</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.service-articles*') ? 'active' : '' }}"
            href="{{ route('admin.service-articles.index') }}">
            <i class="bi bi-file-text"></i>
            <span>Service Articles</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.teams*') ? 'active' : '' }}"
            href="{{ route('admin.teams.index') }}">
            <i class="bi bi-people"></i>
            <span>Teams</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.partners*') ? 'active' : '' }}"
            href="{{ route('admin.partners.index') }}">
            <i class="bi bi-briefcase"></i>
            <span>Partners</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link text-danger" href="/">
            <i class="bi bi-globe"></i>
            <span>Lihat Website</span>
        </a>
    </li>

</ul>
</div>