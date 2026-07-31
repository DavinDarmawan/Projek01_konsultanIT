<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Icommits')</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --black: #1a1a1a;
            --cream: #faf8f5;
            --green: #2e7d32;
            --blue: #1565c0;
            --yellow: #f9d342;
            --gray: #e8e5e0;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }

        html {
            font-family: 'Inter', sans-serif;
            font-size: 16px;
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--cream);
            color: var(--black);
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .admin-sidebar {
            width: 260px;
            background: #fff;
            border-right: 2px solid var(--black);
            padding: 1.5rem 0;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            transition: none;
        }

        .admin-sidebar .brand {
            font-size: 1rem;
            font-weight: 800;
            padding: 0 1.5rem;
            margin-bottom: 1.25rem;
            border-bottom: 1px solid #e5e5e5;
        }

        .admin-sidebar .brand-text {
            display: inline-block;
        }

        .admin-sidebar .brand span {
            color: var(--green);
        }

        .admin-sidebar .nav {
    padding: 0 12px;
    margin-bottom: 0;
}

        .menu-title{
    padding:18px 16px 8px;
    font-size:.72rem;
    font-weight:700;
    color:#9ca3af;
    letter-spacing:1px;
    text-transform:uppercase;
}

    .admin-sidebar .nav-link{
    display:flex;
    align-items:center;
    gap:12px;
    color:var(--black);
    font-size:.95rem;
    font-weight:500;
    padding:12px 16px;
    margin:4px 8px;
    border-radius:12px;
    transition: background .25s ease, color .25s ease;
}

        .admin-sidebar .nav-link i{
    width:24px;
    text-align:center;
    font-size:1.1rem;
    flex-shrink:0;
}

        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background: #f3f4f6;
            color: var(--green);
        }

        .admin-sidebar .nav-link.active {
            box-shadow: inset 5px 0 0 var(--green);
        }

        .admin-content {
            flex: 1;
            padding: 1.5rem 1.5rem 2rem;
        }

        .admin-navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding-bottom: 0.75rem;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #e5e5e5;
        }

        .page-title {
            margin: 0;
            font-size: 1.35rem;
            font-weight: 700;
        }

        .user-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        .btn-ghost {
            width: 44px;
            height: 44px;
            padding: 0;
            border: 1px solid #ddd;
            border-radius: 12px;
            background: #fff;
            color: var(--black);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background 0.25s ease, border-color 0.25s ease, transform 0.25s ease;
        }

        .btn-ghost:hover {
            background: #f3f4f6;
            border-color: #ccc;
            transform: translateY(-1px);
        }

        .btn-ghost:focus-visible {
            outline: 3px solid rgba(46, 125, 50, 0.35);
            outline-offset: 2px;
        }

        .admin-wrapper.sidebar-collapsed .admin-sidebar {
            width: 80px;
        }

 
.admin-wrapper.sidebar-collapsed .admin-sidebar .brand{
    padding:0.75rem 0;
}

.admin-wrapper.sidebar-collapsed .admin-sidebar .brand-text{
    display:none;
}

.admin-wrapper.sidebar-collapsed .admin-sidebar .menu-title{
    display:none;
}

.admin-wrapper.sidebar-collapsed .admin-sidebar .sidebar-divider{
    display:none;
}

.admin-wrapper.sidebar-collapsed .admin-sidebar .nav-link{
    justify-content:center;
    padding:12px 0;
}

.admin-wrapper.sidebar-collapsed .admin-sidebar .nav-link span{
    display:none;
}

.admin-wrapper.sidebar-collapsed .admin-sidebar .nav-link i{
    margin:0;
    min-width:auto;
    font-size:1.25rem;
}

        .admin-wrapper.sidebar-collapsed .admin-sidebar .nav-link.active {
            box-shadow: none;
        }

        .admin-offcanvas .offcanvas-body{
    padding:0;
}

.admin-offcanvas .admin-sidebar{

    display:block;

    width:100%;

    height:auto;

    max-height:none;

    position:static;

    border-right:none;

    box-shadow:none;

    background:#fff;

    padding:1rem 0;

}

.admin-offcanvas .admin-sidebar .brand{

    margin-bottom:1rem;

    padding-bottom:1rem;

    border-bottom:1px solid #e5e5e5;

}

.admin-offcanvas .nav-link{

    display:flex;

    align-items:center;

    gap:.75rem;

    padding:.9rem 1.25rem;

    color:#1a1a1a;

    font-weight:500;

}

.admin-offcanvas .nav-link i{

    width:22px;

    text-align:center;

}

.admin-offcanvas .menu-title{

    padding:18px 20px 8px;

    font-size:.72rem;

    font-weight:700;

    color:#9ca3af;

    letter-spacing:1px;

    text-transform:uppercase;

}

        @media (max-width: 991.98px) {
            .admin-navbar {
                flex-wrap: wrap;
                align-items: flex-start;
            }

            .page-title {
                flex: 1 1 100%;
            }
        }

        @media (max-width: 767.98px) {
            .admin-wrapper {
                flex-direction: column;
            }

            .admin-sidebar {
                display: none;
            }

            .admin-content {
                padding: 1.25rem 1rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <aside class="d-none d-md-flex" aria-label="Admin sidebar">
            @include('partials.admin.sidebar')
        </aside>

        <div class="admin-content">
            <header class="admin-navbar">
                <button
                    id="sidebarToggle"
                    type="button"
                    class="btn btn-ghost"
                    aria-controls="adminSidebarMobile"
                    aria-expanded="false"
                    aria-label="Toggle sidebar">
                    <i class="bi bi-list fs-4"></i>
                </button>

                <h1 class="page-title">
                    @yield('page-title', 'Dashboard')
                </h1>

                <div class="user-status text-secondary">
                    <i class="bi bi-person-circle fs-5"></i>
                    <span class="d-none d-md-inline">Logged in as Admin</span>
                    <span class="d-inline d-md-none">Admin</span>
                </div>
            </header>

            <main class="admin-main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <div class="offcanvas offcanvas-start admin-offcanvas" tabindex="-1" id="adminSidebarMobile" aria-labelledby="adminSidebarMobileLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title mb-0" id="adminSidebarMobileLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            @include('partials.admin.sidebar')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const wrapper = document.querySelector('.admin-wrapper');
            const adminSidebarMobile = document.getElementById('adminSidebarMobile');
            const mobileOffcanvas = bootstrap.Offcanvas.getOrCreateInstance(adminSidebarMobile);

            const sidebar = document.querySelector('.admin-sidebar');

if (sidebar) {
    const savedScroll = localStorage.getItem('sidebarScroll');

    if (savedScroll) {
        sidebar.scrollTop = parseInt(savedScroll);
    }

    sidebar.addEventListener('scroll', function () {
        localStorage.setItem('sidebarScroll', sidebar.scrollTop);
    });
}

            if (window.innerWidth > 768 && localStorage.getItem('adminSidebarCollapsed') === 'true') {
                wrapper.classList.add('sidebar-collapsed');
            }

            sidebarToggle.addEventListener('click', function () {
                if (window.innerWidth > 768) {
                    wrapper.classList.toggle('sidebar-collapsed');
                    localStorage.setItem('adminSidebarCollapsed', wrapper.classList.contains('sidebar-collapsed'));
                } else {
                    mobileOffcanvas.toggle();
                }
            });

            window.addEventListener('resize', function () {
                if (window.innerWidth <= 768) {
                    wrapper.classList.remove('sidebar-collapsed');
                }
            });
        });
    </script>
</body>
</html>