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
        * { font-family: 'Inter', sans-serif; }
        body {
            background-color: var(--cream);
            color: var(--black);
        }
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .admin-sidebar {
            width: 260px;
            background: white;
            border-right: 4px solid var(--black);
            padding: 20px 0;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }
        .admin-sidebar .brand {
            font-weight: 900;
            font-size: 1.4rem;
            padding: 0 20px 20px;
            border-bottom: 3px solid var(--black);
            margin-bottom: 20px;
        }
        .admin-sidebar .brand span { color: var(--green); }
        .admin-sidebar .nav-link {
            color: var(--black);
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 0;
            border-left: 4px solid transparent;
            transition: 0.15s;
        }
        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background: var(--gray);
            border-left-color: var(--green);
        }
        .admin-sidebar .nav-link i {
            width: 24px;
            margin-right: 8px;
        }
        .admin-content {
            flex: 1;
            padding: 30px;
        }
        .neo-card {
            background: white;
            border: 3px solid var(--black);
            border-radius: 0;
            box-shadow: 6px 6px 0 var(--black);
            padding: 1.5rem;
        }
        .neo-btn {
            background: var(--green);
            color: white;
            border: 3px solid var(--black);
            border-radius: 0;
            padding: 8px 24px;
            font-weight: 700;
            box-shadow: 4px 4px 0 var(--black);
            transition: 0.1s;
            text-decoration: none;
            display: inline-block;
        }
        .neo-btn:hover {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 var(--black);
            color: white;
        }
        .neo-btn-outline {
            background: transparent;
            color: var(--black);
            box-shadow: 4px 4px 0 var(--black);
            border-color: var(--black);
        }
        .neo-btn-outline:hover { background: var(--black); color: white; }
        .neo-btn-danger {
            background: #c62828;
            color: white;
            border-color: var(--black);
            box-shadow: 4px 4px 0 var(--black);
        }
        .neo-btn-danger:hover { background: #b71c1c; color: white; }
        .neo-btn-yellow {
            background: var(--yellow);
            color: var(--black);
            border-color: var(--black);
            box-shadow: 4px 4px 0 var(--black);
        }
        .table-neo {
            border: 3px solid var(--black);
            border-radius: 0;
        }
        .table-neo th {
            background: var(--black);
            color: white;
            font-weight: 700;
        }
        .table-neo td, .table-neo th {
            border-color: var(--black);
            vertical-align: middle;
        }
        .badge-neo {
            background: var(--yellow);
            color: var(--black);
            padding: 4px 12px;
            border: 2px solid var(--black);
            font-weight: 700;
        }
        @media (max-width: 768px) {
            .admin-sidebar { width: 100%; height: auto; position: relative; }
            .admin-wrapper { flex-direction: column; }
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        @include('partials.admin.sidebar')
        <div class="admin-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">@yield('page-title', 'Dashboard')</h2>
                <small class="text-muted">Logged in as Admin</small>
            </div>
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>