<!-- ======================================================
     NILAI PERUSAHAAN - Icommits
     ====================================================== -->
<section id="nilai" class="values-section">
    <div class="container">
        
        <!-- Section Header -->
        <div class="row section-header text-center justify-content-center fade-in-up-ready">
            <div class="col-lg-7">
                <span class="section-tagline">
                    <i class="bi bi-heart-fill me-1"></i> Nilai Perusahaan
                </span>
                <h2 class="section-title mb-3">
                    Nilai-Nilai <span class="text-primary">Icommits</span>
                </h2>
                <p class="section-desc">
                    Prinsip yang menjadi landasan kami dalam berkarya dan melayani
                </p>
            </div>
        </div>

        <div class="row mt-4 g-4">
            <!-- Card 1: Integritas -->
            <div class="col-md-6 col-lg-3 fade-in-up-ready">
                <div class="value-card value-card-primary">
                    <div class="value-icon value-icon-primary">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4 class="value-title">Integritas</h4>
                    <p class="value-desc">
                        Kami menjunjung tinggi kejujuran, transparansi, dan tanggung jawab dalam setiap pekerjaan.
                    </p>
                </div>
            </div>

            <!-- Card 2: Inovasi -->
            <div class="col-md-6 col-lg-3 fade-in-up-ready delay-1">
                <div class="value-card value-card-secondary">
                    <div class="value-icon value-icon-secondary">
                        <i class="bi bi-rocket-takeoff"></i>
                    </div>
                    <h4 class="value-title">Inovasi</h4>
                    <p class="value-desc">
                        Kami terus belajar dan mengadopsi teknologi terbaru untuk memberikan solusi yang kreatif.
                    </p>
                </div>
            </div>

            <!-- Card 3: Kolaborasi -->
            <div class="col-md-6 col-lg-3 fade-in-up-ready delay-2">
                <div class="value-card value-card-accent">
                    <div class="value-icon value-icon-accent">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h4 class="value-title">Kolaborasi</h4>
                    <p class="value-desc">
                        Kami percaya bahwa kerja sama tim dan kemitraan yang solid menghasilkan hasil terbaik.
                    </p>
                </div>
            </div>

            <!-- Card 4: Kualitas -->
            <div class="col-md-6 col-lg-3 fade-in-up-ready delay-3">
                <div class="value-card value-card-orange">
                    <div class="value-icon value-icon-orange">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                    <h4 class="value-title">Kualitas</h4>
                    <p class="value-desc">
                        Kami berkomitmen memberikan produk dan layanan berkualitas tinggi yang memenuhi standar global.
                    </p>
                </div>
            </div>
        </div>

        <!-- Tagline Penutup -->
        <div class="text-center mt-5 fade-in-up-ready">
            <div class="values-tagline">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                Berlandaskan nilai-nilai luhur untuk memberikan yang terbaik
            </div>
        </div>

    </div>
</section>


<!-- ==========================================
     STYLE KHUSUS NILAI PERUSAHAAN
     ========================================== -->
<style>
    /* ===== SECTION ===== */
    .values-section {
        padding: 40px 0;
        background: #ffffff;
    }

    /* ===== VALUE CARD ===== */
    .value-card {
        background: #f8f9fa;
        border-radius: 20px;
        padding: 2rem 1.5rem;
        height: 100%;
        text-align: center;
        transition: all 0.35s ease;
        border: 1px solid rgba(0, 0, 0, 0.04);
        position: relative;
        overflow: hidden;
    }

    .value-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        border-radius: 0 0 20px 20px;
    }

    .value-card-primary::after {
        background: var(--primary);
    }

    .value-card-secondary::after {
        background: var(--secondary);
    }

    .value-card-accent::after {
        background: var(--accent);
    }

    .value-card-orange::after {
        background: #e65100;
    }

    .value-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.10);
        background: #ffffff;
    }

    /* ===== VALUE ICON ===== */
    .value-icon {
        width: 72px;
        height: 72px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1rem auto;
        transition: all 0.3s ease;
    }

    .value-card:hover .value-icon {
        transform: scale(1.08) rotate(-4deg);
    }

    .value-icon-primary {
        background: rgba(46, 125, 50, 0.12);
        color: var(--primary);
    }

    .value-icon-secondary {
        background: rgba(21, 101, 192, 0.12);
        color: var(--secondary);
    }

    .value-icon-accent {
        background: rgba(249, 211, 66, 0.20);
        color: var(--accent);
    }

    .value-icon-orange {
        background: rgba(230, 81, 0, 0.12);
        color: #e65100;
    }

    /* ===== VALUE TITLE ===== */
    .value-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.75rem;
    }

    /* ===== VALUE DESC ===== */
    .value-desc {
        font-size: 0.95rem;
        color: #6b7280;
        line-height: 1.7;
        margin-bottom: 0;
    }

    /* ===== TAGLINE ===== */
    .values-tagline {
        display: inline-block;
        background: #f8f9fa;
        padding: 12px 32px;
        border-radius: 50px;
        font-weight: 500;
        color: #6b7280;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .values-tagline:hover {
        background: #ffffff;
        border-color: var(--primary);
        box-shadow: 0 4px 16px rgba(46, 125, 50, 0.10);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .values-section {
            padding: 60px 0;
        }
        .value-card {
            padding: 1.5rem 1.25rem;
        }
        .value-icon {
            width: 60px;
            height: 60px;
            font-size: 1.6rem;
        }
        .value-title {
            font-size: 1.05rem;
        }
        .value-desc {
            font-size: 0.9rem;
        }
        .values-tagline {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .value-card {
            padding: 1.25rem 1rem;
        }
        .value-icon {
            width: 52px;
            height: 52px;
            font-size: 1.3rem;
        }
    }

    /* ===== FADE IN ANIMATION ===== */
    .fade-in-up-ready {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .fade-in-up-ready.delay-1 {
        animation-delay: 0.15s;
    }

    .fade-in-up-ready.delay-2 {
        animation-delay: 0.3s;
    }

    .fade-in-up-ready.delay-3 {
        animation-delay: 0.45s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>