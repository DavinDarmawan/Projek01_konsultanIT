<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Icommits IT Consultant Indonesia - Solusi teknologi, pengembangan software, CMS website, E-Raport sekolah, hosting, dan legalitas bisnis dari PT AKMI Karya Global.">
    <title>@yield('title', 'Icommits IT Consultant Indonesia | Solusi Transformasi Digital Premium')</title>

    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* =============================================
           VARIABEL WARNA (ubah di sini untuk tema)
           ============================================= */
        :root {
            --primary: #006B4C;        /* Hijau Icommits */
            --primary-dark: #004D35;
            --primary-light: #0A7E5C;
            --secondary: #0A4B7A;      /* Biru Icommits */
            --secondary-light: #1A5F9A;
            --accent: #F9D342;          /* Kuning (opsional) */
            --dark: #1A1A1A;
            --light: #F8F9FA;
            --white: #FFFFFF;
            --gray: #6C757D;
            --shadow: 0 10px 40px rgba(0,0,0,0.08);
            --radius: 1.5rem;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--white);
            color: var(--dark);
            padding-top: 76px; /* tinggi navbar fixed */
            overflow-x: hidden;
        }

        /* ========== BUTTON ========== */
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
        .btn-custom-secondary {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        .btn-custom-secondary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        .btn-custom-white {
            background: white;
            color: var(--primary);
        }
        .btn-custom-white:hover {
            background: var(--light);
            transform: translateY(-2px);
            color: var(--primary-dark);
        }

        /* ========== SECTION ========== */
        .bg-light-section {
            background: var(--light);
        }
        .section-tagline {
            color: var(--primary);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            margin-bottom: 0.5rem;
            border-left: 3px solid var(--primary);
            padding-left: 12px;
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
        }
        .section-desc {
            color: var(--gray);
            font-size: 1.05rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* ========== NAVBAR ========== */
        .navbar-custom {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(8px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
            padding: 12px 0;
        }
        .navbar-brand-custom img {
            height: 42px;
            width: auto;
        }
        .nav-link-custom {
            font-weight: 500;
            color: var(--dark) !important;
            padding: 8px 16px !important;
            transition: color 0.3s;
            position: relative;
        }
        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: var(--primary) !important;
        }
        .nav-link-custom.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 16px;
            right: 16px;
            height: 3px;
            background: var(--primary);
            border-radius: 10px;
        }

        /* ========== HERO ========== */
        .hero-section {
            padding: 80px 0 60px;
            background: linear-gradient(135deg, #f0f7f4 0%, #e6f0ed 100%);
            position: relative;
            overflow: hidden;
        }
        .hero-badge {
            background: rgba(0,107,76,0.1);
            color: var(--primary);
            padding: 6px 18px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
            margin-bottom: 1rem;
        }
        .hero-title {
            font-size: 3.2rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.2rem;
        }
        .hero-title span {
            color: var(--primary);
        }
        .hero-subtitle {
            font-size: 1.1rem;
            color: var(--gray);
            max-width: 500px;
            margin-bottom: 2rem;
        }
        .hero-stats-wrapper .stat-item h3 {
            font-weight: 700;
            font-size: 2rem;
            color: var(--dark);
        }
        .hero-stats-wrapper .stat-item h3 span {
            color: var(--primary);
        }
        .hero-stats-wrapper .stat-item p {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        /* Dashboard Mockup */
        .mockup-container {
            position: relative;
            padding: 20px;
        }
        .mockup-shadow {
            position: absolute;
            width: 80%;
            height: 80%;
            background: radial-gradient(circle, rgba(0,107,76,0.15), transparent);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            z-index: 0;
        }
        .dashboard-mockup {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 20px;
            position: relative;
            z-index: 1;
            border: 1px solid rgba(0,0,0,0.04);
        }
        .mockup-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }
        .mockup-dots {
            display: flex;
            gap: 6px;
        }
        .mockup-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
        }
        .mockup-dot.red { background: #ff5f57; }
        .mockup-dot.yellow { background: #ffbd2e; }
        .mockup-dot.green { background: #28c840; }
        .mockup-search {
            flex: 1;
            height: 30px;
            background: var(--light);
            border-radius: 8px;
        }
        .mockup-body {
            padding: 8px 0;
        }
        .mockup-chart-container {
            display: flex;
            align-items: flex-end;
            gap: 8px;
            height: 120px;
            padding: 8px 0;
        }
        .mockup-bar {
            flex: 1;
            background: var(--primary-light);
            border-radius: 8px 8px 0 0;
            opacity: 0.5;
            transition: 0.3s;
        }
        .mockup-bar.active {
            opacity: 1;
            background: var(--primary);
        }

        /* Floating cards */
        .mockup-card-small {
            position: absolute;
            background: white;
            border-radius: 12px;
            padding: 12px 16px;
            box-shadow: var(--shadow);
            z-index: 2;
            border: 1px solid rgba(0,0,0,0.04);
        }
        .float-card-1 {
            top: 10%;
            right: -5%;
        }
        .float-card-2 {
            bottom: 15%;
            left: -5%;
        }

        /* ========== ABOUT PREVIEW ========== */
        .about-image-card {
            background: white;
            border-radius: var(--radius);
            padding: 2rem;
            box-shadow: var(--shadow);
            border-left: 6px solid var(--primary);
        }
        .about-accent-badge {
            background: var(--primary);
            color: white;
            padding: 4px 14px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
        }

        /* ========== SERVICES ========== */
        .service-card {
            background: white;
            border-radius: var(--radius);
            padding: 2rem 1.5rem;
            box-shadow: var(--shadow);
            transition: all 0.3s;
            height: 100%;
            border: 1px solid rgba(0,0,0,0.04);
        }
        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        }
        .icon-wrapper {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin-bottom: 1rem;
            color: white;
        }
        .icon-wrapper-blue {
            background: var(--secondary);
        }
        .icon-wrapper-green {
            background: var(--primary);
        }
        .service-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: 0.3s;
        }
        .service-link:hover {
            color: var(--primary-dark);
            letter-spacing: 1px;
        }

        /* ========== FEATURE CARDS (WHY CHOOSE US) ========== */
        .feature-card {
            background: white;
            border-radius: var(--radius);
            padding: 2rem 1.5rem;
            box-shadow: var(--shadow);
            transition: all 0.3s;
            height: 100%;
            border: 1px solid rgba(0,0,0,0.04);
        }
        .feature-card:hover {
            transform: translateY(-6px);
        }
        .feature-icon {
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        /* ========== PORTFOLIO ========== */
        .portfolio-wrapper {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: 0.3s;
        }
        .portfolio-wrapper:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        }
        .portfolio-img-container {
            position: relative;
            overflow: hidden;
            background: var(--light);
            height: 240px;
        }
        .portfolio-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #e6f0ed, #d4e4df);
        }
        .portfolio-placeholder-pattern-2 {
            background: linear-gradient(135deg, #d4e4df, #c0d8d0);
        }
        .portfolio-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,107,76,0.85);
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
            opacity: 0;
            transition: 0.3s;
        }
        .portfolio-wrapper:hover .portfolio-overlay {
            opacity: 1;
        }
        .portfolio-info {
            color: white;
        }
        .portfolio-category {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
        }
        .portfolio-title {
            font-weight: 700;
            margin: 4px 0 8px;
        }
        .portfolio-btn {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .portfolio-btn:hover {
            color: var(--accent);
        }

        /* ========== CTA SECTION ========== */
        .cta-section {
            background: var(--primary);
            color: white;
            padding: 80px 0;
        }
        .cta-section h2 {
            font-weight: 700;
            font-size: 2.8rem;
        }
        .cta-section p {
            font-size: 1.15rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 1rem auto 2rem;
        }

        /* ========== CONTACT PREVIEW ========== */
        .contact-info-card {
            background: white;
            border-radius: var(--radius);
            padding: 2rem;
            box-shadow: var(--shadow);
        }
        .contact-info-item {
            display: flex;
            gap: 16px;
            margin-bottom: 1.5rem;
            text-align: left;
        }
        .contact-info-item:last-child {
            margin-bottom: 0;
        }
        .contact-info-icon {
            width: 48px;
            height: 48px;
            background: var(--primary-light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            flex-shrink: 0;
        }
        .contact-info-text h5 {
            font-weight: 600;
            margin-bottom: 2px;
        }
        .contact-info-text p {
            color: var(--gray);
            margin-bottom: 0;
        }

        .map-placeholder {
            width: 100%;
            height: 400px;
            background: var(--light);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .map-visual-placeholder {
            text-align: center;
        }
        .map-pin {
            font-size: 3rem;
            color: var(--primary);
            animation: bounce 1.5s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .map-card {
            background: white;
            border-radius: 12px;
            padding: 16px 24px;
            box-shadow: var(--shadow);
            margin-top: 12px;
        }

        /* ========== FOOTER ========== */
        .footer-section {
            background: var(--dark);
            color: rgba(255,255,255,0.8);
            padding: 60px 0 20px;
        }
        .footer-brand img {
            filter: brightness(0) invert(1);
        }
        .footer-title {
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
        .footer-links {
            list-style: none;
            padding: 0;
        }
        .footer-links li {
            margin-bottom: 8px;
        }
        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: 0.3s;
            font-size: 0.95rem;
        }
        .footer-links a:hover {
            color: white;
            padding-left: 4px;
        }
        .footer-socials {
            display: flex;
            gap: 12px;
        }
        .social-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }
        .social-icon:hover {
            background: var(--primary);
            color: white;
        }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 30px;
            font-size: 0.9rem;
        }
        .footer-bottom p {
            margin-bottom: 0;
        }

        /* ========== ANIMATIONS ========== */
        .fade-in-up-ready {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        .fade-in-up-ready.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .delay-1 { transition-delay: 0.1s; }
        .delay-2 { transition-delay: 0.2s; }
        .delay-3 { transition-delay: 0.3s; }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 992px) {
            .hero-title { font-size: 2.4rem; }
            .section-title { font-size: 2rem; }
            .float-card-1, .float-card-2 { display: none; }
            .mockup-shadow { display: none; }
            .mockup-container { padding: 0; }
            .dashboard-mockup { padding: 16px; }
        }
        @media (max-width: 768px) {
            body { padding-top: 68px; }
            .hero-section { padding: 40px 0; }
            .hero-stats-wrapper .stat-item h3 { font-size: 1.5rem; }
            .cta-section h2 { font-size: 2rem; }
            .map-placeholder { height: 280px; }
        }
            .about-hero-section {
        padding-top: 50px;
        padding-bottom: 80px;
        background: #ffffff;
    }

    .about-hero-title {
        font-size: 3rem;
        font-weight: 700;
        line-height: 1.2;
        margin-top: 0.5rem;
        color: #1a1a1a;
    }

    .about-hero-title .text-primary {
        color: var(--primary) !important;
    }

    .about-hero-desc {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #4b5563;
        margin-top: 1rem;
    }

    .about-hero-desc strong {
        color: #1a1a1a;
    }

    .about-hero-desc .text-primary {
        color: var(--primary) !important;
        font-weight: 600;
    }

    /* Info Chips */
    .info-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        background: #f8f9fa;
        border-radius: 50px;
        font-weight: 500;
        color: #1a1a1a;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .info-chip:hover {
        background: #ffffff;
        border-color: var(--primary);
        box-shadow: 0 4px 12px rgba(46, 125, 50, 0.15);
        transform: translateY(-2px);
    }

    .info-chip i {
        font-size: 1.1rem;
        color: var(--primary);
    }

    /* Image Wrapper */
    .about-image-wrapper {
        position: relative;
    }

    .about-image-container {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.10);
        background: #f1f3f5;
    }

    .about-hero-image {
        width: 100%;
        height: 380px;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }

    .about-image-container:hover .about-hero-image {
        transform: scale(1.02);
    }

    /* Floating Badge */
    .about-float-badge {
        position: absolute;
        bottom: -16px;
        right: -16px;
        background: var(--accent);
        color: var(--dark);
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.95rem;
        box-shadow: 0 8px 30px rgba(249, 211, 66, 0.4);
        display: flex;
        align-items: center;
        gap: 6px;
        border: 2px solid white;
    }

    .about-float-badge i {
        font-size: 1.1rem;
        color: var(--primary);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .about-hero-section {
            padding: 100px 0 60px;
        }
        .about-hero-title {
            font-size: 2.2rem;
        }
        .about-hero-image {
            height: 280px;
        }
    }

    @media (max-width: 576px) {
        .about-hero-title {
            font-size: 1.8rem;
        }
        .about-hero-desc {
            font-size: 1rem;
        }
        .info-chip {
            padding: 8px 16px;
            font-size: 0.85rem;
        }
        .about-hero-image {
            height: 220px;
        }
        .about-float-badge {
            padding: 8px 16px;
            font-size: 0.8rem;
            bottom: -12px;
            right: -8px;
        }
    }

    /* ===== FADE IN ANIMATION ===== */
    .fade-in-up-ready {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .fade-in-up-ready.delay-2 {
        animation-delay: 0.3s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>

    @stack('styles')
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Bootstrap 5.3.0 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS for animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.fade-in-up-ready').forEach(el => {
                observer.observe(el);
            });

            // Welcome Speech
            if (!sessionStorage.getItem('welcomeSpeechPlayed')) {
                const playWelcome = () => {
                    if ('speechSynthesis' in window) {
                        const msg = new SpeechSynthesisUtterance();
                        msg.text = 'Selamat datang di ai committs.';
                        msg.lang = 'id-ID';
                        window.speechSynthesis.speak(msg);
                    }
                    sessionStorage.setItem('welcomeSpeechPlayed', 'true');
                    
                    // Remove listeners after playing
                    ['click', 'scroll', 'keydown', 'mousemove', 'touchstart'].forEach(evt => {
                        document.removeEventListener(evt, playWelcome);
                    });
                };

                // Browsers require interaction to play audio
                ['click', 'scroll', 'keydown', 'mousemove', 'touchstart'].forEach(evt => {
                    document.addEventListener(evt, playWelcome, { once: true });
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>