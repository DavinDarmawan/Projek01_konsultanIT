<!-- ======================================================
     TEKNOLOGI YANG KAMI GUNAKAN
     ====================================================== -->
<section id="teknologi" class="technologies-section">
    <div class="container">
        
        <!-- Section Header -->
        <div class="row section-header text-center justify-content-center fade-in-up-ready">
            <div class="col-lg-7">
                <span class="section-tagline">
                    <i class="bi bi-cpu me-1"></i> Teknologi
                </span>
                <h2 class="section-title mb-3">
                    Teknologi <span class="text-primary">Yang Kami Gunakan</span>
                </h2>
                <p class="section-desc">
                    Kami mengadopsi teknologi terkini untuk memastikan solusi yang handal dan modern.
                </p>
            </div>
        </div>

        <!-- Grid Teknologi -->
        <div class="row mt-4 g-4 justify-content-center">
            @forelse($technologies as $key => $tech)
                @php
                    $colors = ['#2e7d32', '#1565c0', '#f9d342', '#e65100', '#6a1b9a', '#c62828', '#00838f', '#1a1a1a'];
                    $color = $tech->color ?? $colors[$key % count($colors)];
                    $icon = $tech->icon ?? 'bi-code-square';
                    $delay = ($key % 3) + 1;
                @endphp
                
                <div class="col-4 col-md-3 col-lg-2 fade-in-up-ready delay-{{ $delay }}">
                    <div class="tech-card">
                        <div class="tech-icon-wrapper" style="background: {{ $color }}15; color: {{ $color }};">
                            <i class="bi {{ $icon }}"></i>
                        </div>
                        <h6 class="tech-name">{{ $tech->name }}</h6>
                        <div class="tech-underline" style="background: {{ $color }};"></div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="empty-state">
                        <i class="bi bi-cpu" style="font-size: 3rem; color: #d1d5db;"></i>
                        <p class="text-muted mt-3">Belum ada data teknologi.</p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>


<!-- ==========================================
     STYLE KHUSUS TEKNOLOGI
     ========================================== -->
<style>
    /* ===== SECTION ===== */
    .technologies-section {
        padding: 40px 0;
        background: #ffffff;
    }

    /* ===== TECH CARD ===== */
    .tech-card {
        background: #f8f9fa;
        border-radius: 16px;
        padding: 1.5rem 0.75rem;
        text-align: center;
        transition: all 0.35s ease;
        border: 1px solid rgba(0, 0, 0, 0.04);
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .tech-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        opacity: 0;
        transition: opacity 0.4s ease;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
    }

    .tech-card:hover::before {
        opacity: 1;
    }

    .tech-card:hover {
        transform: translateY(-8px);
        background: #ffffff;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
        border-color: rgba(46, 125, 50, 0.12);
    }

    /* ===== ICON WRAPPER ===== */
    .tech-icon-wrapper {
        width: 64px;
        height: 64px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 0.75rem auto;
        transition: all 0.35s ease;
    }

    .tech-card:hover .tech-icon-wrapper {
        transform: scale(1.08) rotate(-4deg);
    }

    /* ===== TECH NAME ===== */
    .tech-name {
        font-size: 0.85rem;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
        letter-spacing: -0.2px;
    }

    /* ===== UNDERLINE ===== */
    .tech-underline {
        width: 0;
        height: 3px;
        border-radius: 4px;
        margin: 0 auto;
        transition: width 0.4s ease;
    }

    .tech-card:hover .tech-underline {
        width: 32px;
    }

    /* ===== NOTE ===== */
    .tech-note {
        display: inline-block;
        font-size: 0.95rem;
        color: #6b7280;
        background: #f8f9fa;
        padding: 10px 28px;
        border-radius: 50px;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .tech-note:hover {
        background: #ffffff;
        border-color: var(--primary);
        box-shadow: 0 4px 16px rgba(46, 125, 50, 0.08);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state i {
        display: block;
        margin: 0 auto;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .technologies-section {
            padding: 60px 0;
        }
        .tech-icon-wrapper {
            width: 52px;
            height: 52px;
            font-size: 1.6rem;
        }
        .tech-name {
            font-size: 0.75rem;
        }
        .tech-card {
            padding: 1.25rem 0.5rem;
        }
    }

    @media (max-width: 576px) {
        .tech-icon-wrapper {
            width: 44px;
            height: 44px;
            font-size: 1.3rem;
            border-radius: 12px;
        }
        .tech-name {
            font-size: 0.7rem;
        }
        .tech-card {
            padding: 1rem 0.25rem;
        }
        .tech-note {
            font-size: 0.8rem;
            padding: 8px 18px;
        }
    }

    /* ===== FADE IN ANIMATION ===== */
    .fade-in-up-ready {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .fade-in-up-ready.delay-1 {
        animation-delay: 0.1s;
    }
    .fade-in-up-ready.delay-2 {
        animation-delay: 0.2s;
    }
    .fade-in-up-ready.delay-3 {
        animation-delay: 0.3s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>