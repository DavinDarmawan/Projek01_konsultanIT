<!-- ======================================================
     PORTFOLIO MARQUEE (INFINITE LOOPING SLIDER)
     ====================================================== -->
<section id="portfolio" class="portfolio-section">
    <div class="container">
        <!-- Section Header -->
        <div class="row section-header align-items-end fade-in-up-ready">
            <div class="col-md-8 text-start">
                <span class="section-tagline">
                    <i class="bi bi-briefcase me-1"></i> Studi Kasus
                </span>
                <h2 class="section-title mb-0">Project Unggulan <span class="text-primary">Kami</span></h2>
            </div>
        </div>

        <!-- Marquee Container -->
        <div class="portfolio-marquee-wrapper mt-4">
            <div class="portfolio-marquee-track" id="portfolioMarqueeTrack">
                <!-- Slide akan di-clone oleh JavaScript -->
                @forelse($portfolios as $key => $portfolio)
                    @php
                        $img = $portfolio->image ? asset('storage/'.$portfolio->image) : null;
                        $patternClass = $key % 2 == 0 ? 'portfolio-placeholder-pattern-1' : 'portfolio-placeholder-pattern-2';
                    @endphp
                    <div class="portfolio-marquee-slide">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-img-container">
                                @if($img)
                                <img src="{{ $img }}" alt="{{ $portfolio->title }}" class="portfolio-image">                                @else
                                    <div class="portfolio-placeholder {{ $patternClass }}">
                                        <i class="bi bi-window-sidebar text-primary fs-1"></i>
                                    </div>
                                @endif
                                <div class="portfolio-overlay">
                                    <div class="portfolio-info text-start">
                                        <span class="portfolio-category">{{ $portfolio->client ?? 'Project' }}</span>
                                        <h4 class="portfolio-title">{{ $portfolio->title }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada portfolio.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</section>


<!-- ==========================================
     STYLE KHUSUS PORTFOLIO MARQUEE
     ========================================== -->
<style>
    /* ===== SECTION ===== */
    .portfolio-section {
        padding: 80px 0;
        background: #f8f9fa;
        overflow: hidden;
    }

    /* ===== MARQUEE WRAPPER ===== */
    .portfolio-marquee-wrapper {
        position: relative;
        overflow: hidden;
        width: 100%;
        mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
        -webkit-mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
    }

    .portfolio-marquee-track {
        display: flex;
        gap: 1.5rem;
        width: max-content;
        animation: marqueeScroll 25s linear infinite;
        will-change: transform;
        padding: 0.25rem 0;
    }

    /* Pause on hover */
    .portfolio-marquee-wrapper:hover .portfolio-marquee-track {
        animation-play-state: paused;
    }

    /* ===== SLIDE ===== */
    .portfolio-marquee-slide {
        flex: 0 0 280px;
        min-width: 0;
        scroll-snap-align: start;
        transition: all 0.3s ease;
    }

    /* Responsive slide width */
    @media (min-width: 1200px) {
        .portfolio-marquee-slide {
            flex: 0 0 300px;
        }
    }
    @media (max-width: 768px) {
        .portfolio-marquee-slide {
            flex: 0 0 240px;
        }
    }
    @media (max-width: 576px) {
        .portfolio-marquee-slide {
            flex: 0 0 200px;
        }
    }

    /* ===== PORTFOLIO CARD ===== */
    .portfolio-wrapper {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
        height: 100%;
        background: #ffffff;
        border: 1px solid rgba(0,0,0,0.04);
    }

    .portfolio-wrapper:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 12px 40px rgba(0,0,0,0.12);
        z-index: 10;
    }

    .portfolio-img-container {
        position: relative;
        width: 100%;
        padding-top: 75%; /* 4:3 Aspect Ratio */
        overflow: hidden;
        background: #e9ecef;
    }

    .portfolio-img-container img{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    object-fit:contain;
    padding:20px;
    background:#fff;
}

.portfolio-placeholder{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
}

    .portfolio-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f1f3f5 0%, #e9ecef 100%);
        color: #adb5bd;
    }

    .portfolio-placeholder-pattern-1 {
        background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    }
    .portfolio-placeholder-pattern-2 {
        background: linear-gradient(135deg, #dee2e6 0%, #ced4da 100%);
    }

    /* ===== OVERLAY ===== */
    .portfolio-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(0deg, rgba(26,26,26,0.85) 0%, rgba(26,26,26,0.1) 100%);
        display: flex;
        align-items: flex-end;
        padding: 1.25rem;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .portfolio-wrapper:hover .portfolio-overlay {
        opacity: 1;
    }

    .portfolio-info {
        color: #ffffff;
        width: 100%;
    }

    .portfolio-category {
        display: inline-block;
        font-size: 0.65rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--accent);
        margin-bottom: 0.15rem;
    }

    .portfolio-title {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        color: #ffffff;
    }

    .portfolio-btn {
        color: var(--accent);
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.3s ease;
        font-size: 0.8rem;
    }

    .portfolio-btn:hover {
        gap: 10px;
        color: #f0c000;
    }

    /* ===== MARQUEE ANIMATION ===== */
    @keyframes marqueeScroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(calc(-20% - 0.75rem));
        }
    }

    /* ===== INDICATOR ===== */
    .marquee-indicator {
        display: inline-block;
        font-size: 0.8rem;
        color: #9ca3af;
        background: #ffffff;
        padding: 6px 18px;
        border-radius: 50px;
        border: 1px solid #e9ecef;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .portfolio-section {
            padding: 60px 0;
        }
        .portfolio-marquee-slide {
            flex: 0 0 220px;
        }
        .portfolio-title {
            font-size: 0.9rem;
        }
        .portfolio-btn {
            font-size: 0.7rem;
        }
        .marquee-indicator {
            font-size: 0.7rem;
            padding: 4px 14px;
        }
    }

    @media (max-width: 576px) {
        .portfolio-marquee-slide {
            flex: 0 0 180px;
        }
        .portfolio-overlay {
            padding: 0.75rem;
        }
        .portfolio-title {
            font-size: 0.8rem;
        }
        .portfolio-category {
            font-size: 0.55rem;
        }
        .portfolio-btn {
            font-size: 0.65rem;
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


<!-- ==========================================
     MARQUEE JAVASCRIPT (CLONE SLIDES)
     ========================================== -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.getElementById('portfolioMarqueeTrack');
        if (!track) return;

        const slides = track.querySelectorAll('.portfolio-marquee-slide');
        const totalSlides = slides.length;

        // Jika kurang dari 4 slide, clone sampai cukup untuk efek seamless
        if (totalSlides > 0) {
            // Clone seluruh slide untuk membuat infinite loop
            const cloneCount = Math.max(2, Math.ceil(6 / totalSlides));
            for (let i = 0; i < cloneCount; i++) {
                slides.forEach(slide => {
                    const clone = slide.cloneNode(true);
                    track.appendChild(clone);
                });
            }
        }

        // Hitung total slide setelah clone
        const totalClones = track.querySelectorAll('.portfolio-marquee-slide').length;

        // Jika total slide masih kurang dari 6, tambahkan lagi
        if (totalClones < 6) {
            const currentSlides = track.querySelectorAll('.portfolio-marquee-slide');
            const needMore = Math.ceil(6 / currentSlides.length);
            for (let i = 0; i < needMore; i++) {
                currentSlides.forEach(slide => {
                    const clone = slide.cloneNode(true);
                    track.appendChild(clone);
                });
            }
        }

        // Sesuaikan durasi animasi berdasarkan jumlah slide
        const finalSlides = track.querySelectorAll('.portfolio-marquee-slide').length;
        const duration = Math.max(15, finalSlides * 3);
        track.style.animationDuration = duration + 's';
    });
</script>
@endpush