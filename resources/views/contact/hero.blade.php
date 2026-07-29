<!-- ======================================================
     HERO CONTACT - Icommits
     ====================================================== -->
<section id="contact-hero" class="contact-hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 fade-in-up-ready">
                <span class="section-tagline">
                    <i class="bi bi-telephone-fill me-1"></i> Hubungi Kami
                </span>
                <h1 class="contact-hero-title">
                    Mari <span class="text-primary">Berkolaborasi</span>
                </h1>
                <p class="contact-hero-desc">
                    Kami siap membantu mewujudkan solusi TI terbaik untuk Anda. 
                    Silakan hubungi kami melalui kontak di bawah ini.
                </p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="#contact-info" class="btn btn-custom btn-custom-primary">
                        <i class="bi bi-chat-dots-fill me-2"></i> Hubungi Sekarang
                    </a>
                    <a href="#contact-map" class="btn btn-custom btn-custom-secondary">
                        <i class="bi bi-geo-alt-fill me-2"></i> Lihat Lokasi
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ==========================================
     STYLE KHUSUS CONTACT HERO
     ========================================== -->
<style>
    /* ===== SECTION ===== */
    .contact-hero-section {
        padding: 40px 0 60px;
        background: #ffffff;
        position: relative;
        overflow: hidden;
    }

    /* Decorative background element */
    .contact-hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(46, 125, 50, 0.04) 0%, transparent 70%);
        z-index: 0;
    }

    .contact-hero-section .container {
        position: relative;
        z-index: 1;
    }

    /* ===== TITLE ===== */
    .contact-hero-title {
        font-size: 3.2rem;
        font-weight: 700;
        line-height: 1.2;
        margin-top: 0.5rem;
        color: #1a1a1a;
    }

    .contact-hero-title .text-primary {
        color: var(--primary) !important;
    }

    /* ===== DESC ===== */
    .contact-hero-desc {
        font-size: 1.15rem;
        line-height: 1.8;
        color: #4b5563;
        margin-top: 0.75rem;
        max-width: 600px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .contact-hero-section {
            padding: 100px 0 50px;
        }
        .contact-hero-title {
            font-size: 2.5rem;
        }
        .contact-hero-desc {
            font-size: 1.05rem;
        }
    }

    @media (max-width: 576px) {
        .contact-hero-section {
            padding: 80px 0 40px;
        }
        .contact-hero-title {
            font-size: 2rem;
        }
        .contact-hero-desc {
            font-size: 1rem;
        }
    }

    /* ===== FADE IN ANIMATION ===== */
    .fade-in-up-ready {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>