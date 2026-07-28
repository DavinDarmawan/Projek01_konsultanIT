<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Icommits</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --black: #1a1a1a;
            --cream: #faf8f5;
            --green: #2e7d32;
            --blue: #1565c0;
            --yellow: #f9d342;
            --gray: #e8e5e0;
            --shadow-offset: 8px;
        }
        * {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: var(--cream);
            color: var(--black);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-container {
            width: 100%;
            max-width: 440px;
        }
        .login-card {
            background: white;
            border: 4px solid var(--black);
            border-radius: 0;
            box-shadow: var(--shadow-offset) var(--shadow-offset) 0 var(--black);
            padding: 2.5rem 2rem;
        }
        .login-brand {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-brand h1 {
            font-weight: 900;
            font-size: 2rem;
            letter-spacing: -0.5px;
        }
        .login-brand h1 span {
            color: var(--green);
        }
        .login-brand p {
            color: #666;
            font-weight: 600;
            font-size: 0.9rem;
            margin-top: -4px;
        }
        .login-brand .brand-icon {
            font-size: 3rem;
            color: var(--green);
            display: block;
            margin-bottom: 0.5rem;
        }
        .form-label {
            font-weight: 700;
            margin-bottom: 0.25rem;
        }
        .form-control {
            border: 3px solid var(--black);
            border-radius: 0;
            padding: 12px 16px;
            background: white;
            font-weight: 500;
            transition: 0.15s;
        }
        .form-control:focus {
            box-shadow: 4px 4px 0 var(--black);
            border-color: var(--black);
            outline: none;
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
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .neo-btn:hover {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 var(--black);
            background: #1b5e20;
            color: white;
        }
        .neo-btn:active {
            transform: translate(4px, 4px);
            box-shadow: none;
        }
        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
            font-size: 0.85rem;
        }
        .login-footer a {
            color: var(--black);
            font-weight: 700;
            text-decoration: underline;
            text-underline-offset: 2px;
        }
        .login-footer a:hover {
            color: var(--green);
        }
        .alert-error {
            background: #f8d7da;
            border: 3px solid var(--black);
            border-radius: 0;
            color: #721c24;
            font-weight: 600;
            padding: 12px 16px;
            margin-bottom: 1rem;
        }
        .decoration {
            position: fixed;
            bottom: 20px;
            right: 20px;
            font-size: 0.8rem;
            color: #ccc;
            font-weight: 600;
            letter-spacing: 1px;
            opacity: 0.5;
        }
        @media (max-width: 480px) {
            .login-card { padding: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Brand -->
            <div class="login-brand">
                <i class="bi bi-code-square brand-icon"></i>
                <h1>Icommits<span>.</span></h1>
                <p>Admin Panel</p>
            </div>

            <!-- Alert error (contoh, nanti dari controller) -->
            @if(session('error'))
                <div class="alert-error">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                </div>
            @endif

            <!-- Form Login -->
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="admin@icommits.id" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input border-2 border-black rounded-0">
                    <label for="remember" class="form-check-label fw-semibold">Ingat saya</label>
                </div>
                <button type="submit" class="neo-btn">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Masuk
                </button>
            </form>

            <div class="login-footer">
                <p>Kembali ke <a href="/">Beranda</a></p>
            </div>
        </div>
    </div>

    <div class="decoration">
        <i class="bi bi-lock-fill me-1"></i> Secure Area
    </div>
</body>
</html>