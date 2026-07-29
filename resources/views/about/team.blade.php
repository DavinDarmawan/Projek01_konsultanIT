<!-- ======================================================
     TIM KAMI - Icommits
     ====================================================== -->
<section id="tim" class="team-section">
    <div class="container">
        
        <!-- Section Header -->
        <div class="row section-header text-center justify-content-center fade-in-up-ready">
            <div class="col-lg-7">
                <span class="section-tagline">
                    <i class="bi bi-people-fill me-1"></i> Tim Kami
                </span>
                <h2 class="section-title mb-3">
                    Di Balik <span class="text-primary">Icommits</span>
                </h2>
                <p class="section-desc">
                    Mereka yang berdedikasi menghadirkan solusi teknologi terbaik untuk Anda.
                </p>
            </div>
        </div>

        <div class="row g-4 justify-content-center mt-4">
            <!-- Anggota 1: Andi Pratama -->
            <div class="col-md-3 col-6 fade-in-up-ready">
                <div class="team-card">
                    <div class="team-avatar">
                        <img 
                            src="{{ asset('storage/team/andi-pratama.jpg') }}" 
                            alt="Andi Pratama - CEO & Founder"
                            onerror="this.src='https://ui-avatars.com/api/?name=Andi+Pratama&background=2e7d32&color=fff&size=120'"
                        >
                        <div class="team-avatar-border"></div>
                    </div>
                    <h5 class="team-name">Andi Pratama</h5>
                    <p class="team-role">CEO & Founder</p>
                    <p class="team-desc">10+ tahun pengalaman di bidang software development.</p>
                    <div class="team-social">
                        <a href="#" class="team-social-link"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="team-social-link"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
            </div>

            <!-- Anggota 2: Budi Santoso -->
            <div class="col-md-3 col-6 fade-in-up-ready delay-1">
                <div class="team-card">
                    <div class="team-avatar">
                        <img 
                            src="{{ asset('storage/team/budi-santoso.jpg') }}" 
                            alt="Budi Santoso - CTO & Co-Founder"
                            onerror="this.src='https://ui-avatars.com/api/?name=Budi+Santoso&background=1565c0&color=fff&size=120'"
                        >
                        <div class="team-avatar-border"></div>
                    </div>
                    <h5 class="team-name">Budi Santoso</h5>
                    <p class="team-role">CTO & Co-Founder</p>
                    <p class="team-desc">Ahli arsitektur sistem dan keamanan informasi.</p>
                    <div class="team-social">
                        <a href="#" class="team-social-link"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="team-social-link"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>

            <!-- Anggota 3: Citra Dewi -->
            <div class="col-md-3 col-6 fade-in-up-ready delay-2">
                <div class="team-card">
                    <div class="team-avatar">
                        <img 
                            src="{{ asset('storage/team/citra-dewi.jpg') }}" 
                            alt="Citra Dewi - Lead Developer"
                            onerror="this.src='https://ui-avatars.com/api/?name=Citra+Dewi&background=2e7d32&color=fff&size=120'"
                        >
                        <div class="team-avatar-border"></div>
                    </div>
                    <h5 class="team-name">Citra Dewi</h5>
                    <p class="team-role">Lead Developer</p>
                    <p class="team-desc">Spesialis full-stack development dan mobile apps.</p>
                    <div class="team-social">
                        <a href="#" class="team-social-link"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="team-social-link"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>

            <!-- Anggota 4: Diana Fitri -->
            <div class="col-md-3 col-6 fade-in-up-ready delay-3">
                <div class="team-card">
                    <div class="team-avatar">
                        <img 
                            src="{{ asset('storage/team/diana-fitri.jpg') }}" 
                            alt="Diana Fitri - Project Manager"
                            onerror="this.src='https://ui-avatars.com/api/?name=Diana+Fitri&background=1565c0&color=fff&size=120'"
                        >
                        <div class="team-avatar-border"></div>
                    </div>
                    <h5 class="team-name">Diana Fitri</h5>
                    <p class="team-role">Project Manager</p>
                    <p class="team-desc">Mengelola proyek dengan metodologi Agile & Scrum.</p>
                    <div class="team-social">
                        <a href="#" class="team-social-link"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="team-social-link"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ==========================================
     STYLE KHUSUS TIM
     ========================================== -->
<style>
    /* ===== SECTION ===== */
    .team-section {
        padding: 40px 0;
        background: #f8f9fa;
    }

    /* ===== TEAM CARD ===== */
    .team-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 1.5rem 1.25rem 1.5rem;
        text-align: center;
        height: 100%;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        transition: all 0.35s ease;
        border: 1px solid rgba(0, 0, 0, 0.04);
        position: relative;
    }

    .team-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.10);
    }

    /* ===== AVATAR ===== */
    .team-avatar {
        position: relative;
        width: 120px;
        height: 120px;
        margin: 0 auto 1rem auto;
    }

    .team-avatar img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        position: relative;
        z-index: 1;
        border: 3px solid #ffffff;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    }

    .team-avatar-border {
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        opacity: 0.3;
        transition: all 0.3s ease;
        z-index: 0;
    }

    .team-card:hover .team-avatar-border {
        opacity: 0.8;
        transform: scale(1.04);
    }

    /* ===== TEAM NAME ===== */
    .team-name {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.15rem;
    }

    /* ===== TEAM ROLE ===== */
    .team-role {
        font-size: 0.85rem;
        color: var(--primary);
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    /* ===== TEAM DESC ===== */
    .team-desc {
        font-size: 0.85rem;
        color: #6b7280;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    /* ===== SOCIAL LINKS ===== */
    .team-social {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .team-social-link {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 0.9rem;
    }

    .team-social-link:hover {
        background: var(--primary);
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(46, 125, 50, 0.30);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .team-section {
            padding: 60px 0;
        }
        .team-avatar {
            width: 100px;
            height: 100px;
        }
        .team-name {
            font-size: 1rem;
        }
        .team-desc {
            font-size: 0.8rem;
        }
    }

    @media (max-width: 576px) {
        .team-avatar {
            width: 80px;
            height: 80px;
        }
        .team-card {
            padding: 1rem;
        }
        .team-name {
            font-size: 0.9rem;
        }
        .team-role {
            font-size: 0.75rem;
        }
        .team-desc {
            font-size: 0.75rem;
        }
        .team-social-link {
            width: 30px;
            height: 30px;
            font-size: 0.75rem;
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