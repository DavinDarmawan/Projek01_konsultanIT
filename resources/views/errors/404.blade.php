<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | Icommits</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* ===== CSS Variables ===== */
        :root {
            --primary: #006B4C;
            --primary-dark: #004D35;
            --primary-light: #0A7E5C;
            --dark: #1A1A1A;
            --light: #F8F9FA;
            --white: #FFFFFF;
            --gray: #6C757D;
        }

        * { font-family: 'Poppins', sans-serif; }

        body {
            background: #f4f7f6;
            padding-top: 76px; /* offset navbar fixed */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ===== NAVBAR ===== */
        .navbar-custom {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(8px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
            padding: 12px 0;
        }
        .navbar-brand-custom img { height: 42px; width: auto; }
        .nav-link-custom {
            font-weight: 500;
            color: var(--dark) !important;
            padding: 8px 16px !important;
            transition: color 0.3s;
            position: relative;
        }
        .nav-link-custom:hover,
        .nav-link-custom.active { color: var(--primary) !important; }
        .nav-link-custom.active::after {
            content: '';
            position: absolute;
            bottom: 0; left: 16px; right: 16px;
            height: 3px;
            background: var(--primary);
            border-radius: 10px;
        }
        .btn-custom {
            padding: 12px 32px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            border: none;
            cursor: pointer;
        }
        .btn-custom-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(0,107,76,0.3);
        }
        .btn-custom-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,107,76,0.4);
            color: white;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 24px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .bg-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.2;
            z-index: 0;
            animation: blobFloat 10s ease-in-out infinite;
        }
        .blob-1 { width: 400px; height: 400px; background: #b8e6d4; top: -100px; right: -80px; }
        .blob-2 { width: 300px; height: 300px; background: #c3eedd; bottom: -80px; left: -60px; animation-delay: -5s; }

        @keyframes blobFloat {
            0%, 100% { transform: translate(0,0) scale(1); }
            50% { transform: translate(15px,-15px) scale(1.04); }
        }

        .card-404 {
            background: #ffffff;
            border-radius: 28px;
            padding: 56px 48px;
            max-width: 540px;
            width: 100%;
            position: relative;
            z-index: 10;
            box-shadow: 0 8px 40px rgba(0,107,76,0.07);
            border: 1px solid rgba(0,107,76,0.06);
            animation: cardAppear 0.8s cubic-bezier(0.16,1,0.3,1) forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes cardAppear { to { opacity: 1; transform: translateY(0); } }

        .illustration {
            width: 150px;
            height: 150px;
            margin: 0 auto 28px;
            position: relative;
            cursor: pointer;
        }
        .illustration svg { width: 100%; height: 100%; }
        .illust-bg {
            position: absolute;
            inset: -10px;
            background: linear-gradient(135deg, #e8f5f0, #d4f0e4);
            border-radius: 50%;
            z-index: -1;
            animation: bgPulse 4s ease-in-out infinite;
        }
        @keyframes bgPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.06); }
        }

        .face-circle { animation: faceWobble 6s ease-in-out infinite; transform-origin: center; }
        @keyframes faceWobble {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(2deg); }
            75% { transform: rotate(-2deg); }
        }
        .eye-left, .eye-right { animation: blink 4s ease-in-out infinite; transform-origin: center; }
        .eye-right { animation-delay: 0.1s; }
        @keyframes blink {
            0%, 42%, 48%, 100% { transform: scaleY(1); }
            45% { transform: scaleY(0.1); }
        }
        .sweat-drop { animation: sweatDrop 2.5s ease-in-out infinite; opacity: 0; }
        @keyframes sweatDrop {
            0%, 40% { opacity: 0; transform: translateY(-4px); }
            60% { opacity: 0.6; transform: translateY(4px); }
            100% { opacity: 0; transform: translateY(10px); }
        }
        .question-mark { animation: questionBounce 2s ease-in-out infinite; }
        @keyframes questionBounce {
            0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.35; }
            50% { transform: translateY(-5px) rotate(8deg); opacity: 0.7; }
        }

        .error-code {
            font-size: 5.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #006B4C, #00a676);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            letter-spacing: -3px;
            margin-bottom: 8px;
            animation: fadeUp 0.8s 0.2s both;
            cursor: default;
            transition: letter-spacing 0.3s;
        }
        .error-code:hover { letter-spacing: 4px; }

        .divider-404 {
            width: 50px; height: 3px;
            background: linear-gradient(90deg, transparent, #006B4C, transparent);
            border-radius: 99px;
            margin: 16px auto;
            animation: dividerGlow 3s ease-in-out infinite;
        }
        @keyframes dividerGlow {
            0%, 100% { width: 50px; opacity: 0.4; }
            50% { width: 70px; opacity: 0.7; }
        }

        .card-404 h2 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1a2e27;
            margin-bottom: 10px;
            animation: fadeUp 0.8s 0.4s both;
        }
        .card-404 p {
            color: #7a9188;
            font-size: 0.93rem;
            line-height: 1.8;
            margin-bottom: 28px;
            animation: fadeUp 0.8s 0.5s both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .btn-404 {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #006B4C, #00a676);
            color: #ffffff;
            padding: 13px 30px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.93rem;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.16,1,0.3,1);
            animation: fadeUp 0.8s 0.6s both;
        }
        .btn-404:hover {
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,107,76,0.3);
        }
        .btn-404:active { transform: translateY(-1px) scale(0.98); }
        .btn-404 svg { transition: transform 0.3s; }
        .btn-404:hover svg { transform: translateX(-4px); }

        .secondary-links {
            display: flex;
            gap: 16px;
            justify-content: center;
            margin-top: 20px;
            animation: fadeUp 0.8s 0.7s both;
            flex-wrap: wrap;
        }
        .secondary-links a {
            color: #5a9a84;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 5px 14px;
            border-radius: 8px;
            background: rgba(0,107,76,0.05);
            transition: all 0.25s;
        }
        .secondary-links a:hover {
            color: #006B4C;
            background: rgba(0,107,76,0.1);
            transform: translateY(-1px);
        }

        .countdown {
            margin-top: 20px;
            font-size: 0.8rem;
            color: #94b3a8;
            animation: fadeUp 0.8s 0.8s both;
        }
        .countdown-number { color: #006B4C; font-weight: 700; font-size: 0.9rem; }
        .progress-bar-404 {
            width: 120px; height: 3px;
            background: rgba(0,107,76,0.1);
            border-radius: 99px;
            margin: 10px auto 0;
            overflow: hidden;
        }
        .progress-fill-404 {
            height: 100%;
            background: linear-gradient(90deg, #006B4C, #00a676);
            border-radius: 99px;
            width: 0%;
            transition: width 1s linear;
        }

        /* ===== FOOTER ===== */
        .footer-section {
            background: var(--dark);
            color: rgba(255,255,255,0.8);
            padding: 60px 0 20px;
        }
        .footer-brand img { filter: brightness(0) invert(1); }
        .footer-title {
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
        .footer-links { list-style: none; padding: 0; }
        .footer-links li { margin-bottom: 8px; }
        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: 0.3s;
            font-size: 0.95rem;
        }
        .footer-links a:hover { color: white; padding-left: 4px; }
        .footer-socials { display: flex; gap: 12px; }
        .social-icon {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }
        .social-icon:hover { background: var(--primary); color: white; }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 30px;
            font-size: 0.9rem;
        }
        .footer-bottom p { margin-bottom: 0; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            body { padding-top: 68px; }
            .card-404 { padding: 40px 24px; }
            .error-code { font-size: 4rem; }
            .card-404 h2 { font-size: 1.2rem; }
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR (copy dari partials/navbar.blade.php) ===== -->
    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-custom">
            <div class="container">
                <a class="navbar-brand navbar-brand-custom" href="/">
                    <img src="{{ asset('storage/logo/icommits.png') }}" alt="Icommits Logo" height="42">
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="#kontak" class="btn btn-custom btn-custom-primary">
                            Mulai Konsultasi <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="main-content">
        <div class="bg-blob blob-1"></div>
        <div class="bg-blob blob-2"></div>

        <div class="card-404">
            <div class="illustration" id="illustration">
                <div class="illust-bg"></div>
                <svg viewBox="0 0 140 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g class="face-circle">
                        <circle cx="70" cy="70" r="50" stroke="#006B4C" stroke-width="2.5" fill="#e8f5f0"/>
                    </g>
                    <path d="M48 50 Q55 44 62 52" stroke="#006B4C" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.5"/>
                    <path d="M78 52 Q85 44 92 50" stroke="#006B4C" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.5"/>
                    <g class="eye-left">
                        <circle cx="54" cy="63" r="5.5" fill="#006B4C"/>
                        <circle cx="55.5" cy="62" r="2" fill="#fff"/>
                    </g>
                    <g class="eye-right">
                        <circle cx="86" cy="63" r="5.5" fill="#006B4C"/>
                        <circle cx="87.5" cy="62" r="2" fill="#fff"/>
                    </g>
                    <path d="M56 88 Q70 78 84 88" stroke="#006B4C" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                    <path class="sweat-drop" d="M98 54 Q100 60 98 64 Q96 60 98 54Z" fill="#7ac4ad"/>
                    <g class="question-mark">
                        <text x="108" y="38" font-family="Poppins" font-weight="700" font-size="16" fill="#006B4C">?</text>
                    </g>
                </svg>
            </div>

            <div class="error-code" id="errorCode">404</div>
            <div class="divider-404"></div>
            <h2>Halaman Tidak Ditemukan</h2>
            <p>Oops! Halaman yang kamu cari tidak tersedia.<br>Mungkin sudah dipindahkan atau URL-nya salah.</p>

            <a href="javascript:history.back()" class="btn-404" id="mainBtn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Kembali ke Halaman Sebelumnya
            </a>

            <div class="secondary-links">
                <a href="/">🏠 Beranda</a>
                <a href="{{ route('contact') }}">📩 Hubungi Kami</a>
            </div>

            <div class="countdown">
                Redirect otomatis dalam <span class="countdown-number" id="countdown">15</span> detik
                <div class="progress-bar-404">
                    <div class="progress-fill-404" id="progressFill"></div>
                </div>
            </div>
        </div>
    </main>

    <!-- ===== FOOTER (copy dari partials/footer.blade.php) ===== -->
    <footer class="footer-section">
        <div class="container text-start">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a class="footer-brand" href="/">
                        <img src="{{ asset('storage/logo/icommits.png') }}" alt="Icommits Logo" height="42" class="mb-3">
                    </a>
                    <p class="mb-4">
                        Layanan IT Consultant profesional di bawah legalitas <strong>AKMI Karya Global</strong>. Berkomitmen memberikan sistem perangkat lunak dan infrastruktur modern terbaik.
                    </p>
                    <div class="footer-socials">
                        <a href="#" class="social-icon" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-icon" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-icon" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="#layanan">Our Services</a></li>
                        <li><a href="#portfolio">Case Studies</a></li>
                        <li><a href="#kontak">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title">Lokasi</h5>
                    <p class="mb-2">Jl. Riung Purna I No.17, Cisaranten Kidul, Gedebage, Bandung, Jawa Barat 40295</p>
                    <p class="mb-1"><i class="bi bi-telephone-fill text-success"></i> +62 (22) 753-4886</p>
                    <p><i class="bi bi-envelope-fill text-success"></i> info@icommitter.com</p>
                </div>
            </div>

            <div class="row footer-bottom text-center text-md-start">
                <div class="col-md-6">
                    <p>&copy; {{ date('Y') }} Icommits IT Consultant Indonesia. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end mt-2 mt-md-0">
                    <p>Powered by <strong class="text-white">AKMI Karya Global</strong></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Illustration click
        document.getElementById('illustration').addEventListener('click', function() {
            this.style.transition = 'transform 0.4s cubic-bezier(0.68,-0.55,0.265,1.55)';
            this.style.transform = 'scale(1.15) rotate(8deg)';
            setTimeout(() => { this.style.transform = 'scale(1) rotate(0deg)'; }, 400);
        });

        // Countdown redirect
        let seconds = 15;
        const countdownEl = document.getElementById('countdown');
        const progressFill = document.getElementById('progressFill');
        setInterval(() => {
            if (seconds <= 0) { window.location.href = '/'; return; }
            seconds--;
            countdownEl.textContent = seconds;
            progressFill.style.width = ((15 - seconds) / 15 * 100) + '%';
        }, 1000);

        // Error code hover
        const errorCode = document.getElementById('errorCode');
        errorCode.addEventListener('mouseenter', () => { errorCode.style.letterSpacing = '6px'; });
        errorCode.addEventListener('mouseleave', () => { errorCode.style.letterSpacing = '-3px'; });

        // Keyboard shortcut
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') history.back();
            if (e.key === 'Home') window.location.href = '/';
        });
    </script>

</body>
</html>
