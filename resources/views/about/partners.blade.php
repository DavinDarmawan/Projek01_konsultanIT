<!-- ======================================================
     MITRA KERJA - Icommits
     ====================================================== -->
<section id="mitra" class="partners-section">
    <div class="container">
        
        <!-- Section Header -->
        <div class="row section-header text-center justify-content-center fade-in-up-ready">
            <div class="col-lg-7">
                <span class="section-tagline">
                    <i class="bi bi-handshake me-1"></i> Partner
                </span>
                <h2 class="section-title mb-3">
                    Mitra <span class="text-primary">Kerja</span> Kami
                </h2>
                <p class="section-desc">
                    Kami bekerja sama dengan berbagai institusi ternama untuk memberikan solusi terbaik.
                </p>
            </div>
        </div>
<div class="row g-4 mt-4 justify-content-center">
    @foreach ($partners as $partner)
        <div class="col-6 col-md-3 fade-in-up-ready delay-{{ ($loop->index % 3) + 1 }}">
            <div class="partner-card partner-card-{{ $loop->index % 4 == 0 ? 'green' : ($loop->index % 4 == 1 ? 'blue' : ($loop->index % 4 == 2 ? 'orange' : 'accent')) }}">
                <div class="partner-icon">
                    <i class="bi {{ $partner->icon ?? 'bi-building' }}"></i>
                </div>
                <h6 class="partner-name">{{ $partner->company_name ?? $partner->name ?? 'Partner' }}</h6>
                <p class="partner-project">{{ $partner->project_name ?? $partner->project ?? '' }}</p>
                <span class="partner-badge">{{ $partner->category ?? 'Mitra' }}</span>
            </div>
        </div>
    @endforeach
</div>


        <!-- CTA Mini -->
        <div class="text-center mt-5 fade-in-up-ready">
            <p class="partners-cta">
                <i class="bi bi-plus-circle-fill text-primary me-2"></i>
                Dan masih banyak mitra lain yang telah mempercayakan proyek mereka kepada kami
            </p>
        </div>

    </div>
</section>


<!-- ==========================================
     STYLE KHUSUS PARTNER
     ========================================== -->
<style>
    /* ===== SECTION ===== */
    .partners-section {
        padding: 40px 0 60px;
        background: #ffffff;
    }

    /* ===== PARTNER CARD ===== */
    .partner-card {
        background: #f8f9fa;
        border-radius: 20px;
        padding: 1.75rem 1.25rem 1.25rem;
        text-align: center;
        height: 100%;
        transition: all 0.35s ease;
        border: 1px solid rgba(0, 0, 0, 0.04);
        position: relative;
        overflow: hidden;
    }

    .partner-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
    }

    .partner-card-green::before {
        background: var(--primary);
    }

    .partner-card-blue::before {
        background: var(--secondary);
    }

    .partner-card-orange::before {
        background: #e65100;
    }

    .partner-card-accent::before {
        background: var(--accent);
    }

    .partner-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.10);
        background: #ffffff;
    }

    /* ===== PARTNER ICON ===== */
    .partner-icon {
        width: 64px;
        height: 64px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin: 0 auto 0.75rem auto;
        transition: all 0.3s ease;
    }

    .partner-card:hover .partner-icon {
        transform: scale(1.08);
    }

    .partner-card-green .partner-icon {
        background: rgba(46, 125, 50, 0.12);
        color: var(--primary);
    }

    .partner-card-blue .partner-icon {
        background: rgba(21, 101, 192, 0.12);
        color: var(--secondary);
    }

    .partner-card-orange .partner-icon {
        background: rgba(230, 81, 0, 0.12);
        color: #e65100;
    }

    .partner-card-accent .partner-icon {
        background: rgba(249, 211, 66, 0.20);
        color: var(--accent);
    }

    /* ===== PARTNER NAME ===== */
    .partner-name {
        font-size: 1.05rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.1rem;
    }

    /* ===== PARTNER PROJECT ===== */
    .partner-project {
        font-size: 0.85rem;
        color: #6b7280;
        margin-bottom: 0.5rem;
    }

    /* ===== PARTNER BADGE ===== */
    .partner-badge {
        display: inline-block;
        font-size: 0.65rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 4px 14px;
        border-radius: 50px;
        background: #e9ecef;
        color: #6b7280;
        transition: all 0.3s ease;
    }

    .partner-card:hover .partner-badge {
        background: var(--primary);
        color: #ffffff;
    }

    .partner-card-blue:hover .partner-badge {
        background: var(--secondary);
        color: #ffffff;
    }

    .partner-card-orange:hover .partner-badge {
        background: #e65100;
        color: #ffffff;
    }

    .partner-card-accent:hover .partner-badge {
        background: var(--accent);
        color: #1a1a1a;
    }

    /* ===== CTA ===== */
    .partners-cta {
        display: inline-block;
        font-size: 0.95rem;
        color: #6b7280;
        background: #f8f9fa;
        padding: 12px 28px;
        border-radius: 50px;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .partners-cta:hover {
        background: #ffffff;
        border-color: var(--primary);
        box-shadow: 0 4px 16px rgba(46, 125, 50, 0.10);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .partners-section {
            padding: 60px 0 40px;
        }
        .partner-card {
            padding: 1.25rem 1rem;
        }
        .partner-icon {
            width: 52px;
            height: 52px;
            font-size: 1.4rem;
        }
        .partner-name {
            font-size: 0.95rem;
        }
        .partner-project {
            font-size: 0.8rem;
        }
        .partners-cta {
            font-size: 0.85rem;
            padding: 10px 20px;
        }
    }

    @media (max-width: 576px) {
        .partner-icon {
            width: 44px;
            height: 44px;
            font-size: 1.2rem;
        }
        .partner-name {
            font-size: 0.85rem;
        }
        .partner-project {
            font-size: 0.75rem;
        }
        .partner-badge {
            font-size: 0.55rem;
            padding: 3px 10px;
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