<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Icommits IT Consultant Indonesia')</title>
    
    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --black: #1a1a1a;
            --cream: #faf8f5;
            --green: #2e7d32;
            --blue: #1565c0;
            --yellow: #f9d342;
            --gray: #e8e5e0;
            --shadow-offset: 6px;
        }
        
        * { font-family: 'Inter', sans-serif; }
        body { background-color: var(--cream); color: var(--black); }
        
        /* Neobrutalism Core */
        .neo-card {
            background: white;
            border: 3px solid var(--black);
            border-radius: 0;
            box-shadow: var(--shadow-offset) var(--shadow-offset) 0 var(--black);
            padding: 2rem;
            transition: all 0.15s ease;
        }
        .neo-card:hover {
            transform: translate(-2px, -2px);
            box-shadow: calc(var(--shadow-offset) + 2px) calc(var(--shadow-offset) + 2px) 0 var(--black);
        }
        
        .neo-btn {
            background: var(--green);
            color: white;
            border: 3px solid var(--black);
            border-radius: 0;
            padding: 12px 32px;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: 4px 4px 0 var(--black);
            transition: all 0.1s ease;
            text-decoration: none;
            display: inline-block;
        }
        .neo-btn:hover {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 var(--black);
            color: white;
            background: #1b5e20;
        }
        .neo-btn-outline {
            background: transparent;
            color: var(--black);
            border: 3px solid var(--black);
            box-shadow: 4px 4px 0 var(--black);
        }
        .neo-btn-outline:hover { background: var(--black); color: white; }
        .neo-btn-yellow {
            background: var(--yellow);
            color: var(--black);
            border: 3px solid var(--black);
            box-shadow: 4px 4px 0 var(--black);
        }
        .neo-btn-yellow:hover { background: #f0c000; color: var(--black); }
        
        .neo-section { padding: 80px 0; border-bottom: 3px solid var(--black); }
        .neo-section:last-child { border-bottom: none; }
        
        .neo-badge {
            background: var(--yellow);
            color: var(--black);
            font-weight: 700;
            padding: 6px 16px;
            border: 2px solid var(--black);
            display: inline-block;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
        .neo-title { font-weight: 900; font-size: 3rem; line-height: 1.1; letter-spacing: -1px; }
        .neo-subtitle { font-weight: 600; font-size: 1.1rem; color: #444; }
        
        .img-neo {
            border: 4px solid var(--black);
            box-shadow: 8px 8px 0 var(--black);
            width: 100%;
        }
        
        /* Navbar */
        .neo-navbar {
            background: white;
            border-bottom: 4px solid var(--black);
            padding: 16px 0;
        }
        .neo-navbar .nav-link {
            font-weight: 600;
            color: var(--black);
            padding: 8px 16px;
            border: 2px solid transparent;
            transition: all 0.15s ease;
        }
        .neo-navbar .nav-link:hover {
            border-bottom: 4px solid var(--yellow);
            color: var(--black);
        }
        .neo-navbar .navbar-brand {
            font-weight: 900;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }
        .neo-navbar .navbar-brand span { color: var(--green); }
        
        /* Footer */
        .neo-footer {
            background: var(--black);
            color: var(--cream);
            padding: 60px 0 30px;
            border-top: 4px solid var(--yellow);
        }
        .neo-footer a { color: #ccc; text-decoration: none; transition: color 0.2s; }
        .neo-footer a:hover { color: var(--yellow); }
        .neo-footer .footer-title { font-weight: 800; font-size: 1.2rem; margin-bottom: 1rem; color: white; }
        
        @media (max-width: 768px) {
            .neo-title { font-size: 2.2rem; }
            .neo-section { padding: 50px 0; }
            .neo-card { padding: 1.25rem; }
        }
    </style>
</head>
<body>
    @include('partials.navbar')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>