<!-- ======================================================
     PORTFOLIO SLIDER
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
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="/portfolio" class="btn btn-custom btn-custom-secondary">
                    Semua Project <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
        </div>

        <!-- Slider Container -->
        <div class="portfolio-slider-wrapper mt-4">
            <!-- Slider Track -->
            <div class="portfolio-slider-track" id="portfolioSliderTrack">
                @forelse($portfolios as $key => $portfolio)
                    @php
                        $img = $portfolio->image ? asset('storage/'.$portfolio->image) : null;
                        $patternClass = $key % 2 == 0 ? 'portfolio-placeholder-pattern-1' : 'portfolio-placeholder-pattern-2';
                    @endphp
                    <div class="portfolio-slide fade-in-up-ready delay-{{ ($key % 3) + 1 }}">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-img-container">
                                @if($img)
                                    <img src="{{ $img }}" alt="{{ $portfolio->title }}" style="width:100%; height:100%; object-fit:cover;">
                                @else
                                    <div class="portfolio-placeholder {{ $patternClass }}">
                                        <i class="bi bi-window-sidebar text-primary fs-1"></i>
                                    </div>
                                @endif
                                <div class="portfolio-overlay">
                                    <div class="portfolio-info text-start">
                                        <span class="portfolio-category">{{ $portfolio->client ?? 'Project' }}</span>
                                        <h4 class="portfolio-title">{{ $portfolio->title }}</h4>
                                        <a href="{{ $portfolio->project_url ?? '#' }}" class="portfolio-btn text-start">
                                            View Detail <i class="bi bi-arrow-right-short"></i>
                                        </a>
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

            <!-- Slider Controls -->
            @if($portfolios->count() > 3)
                <div class="portfolio-slider-controls">
                    <button class="slider-btn slider-btn-prev" id="sliderPrev" aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <div class="slider-dots" id="sliderDots"></div>
                    <button class="slider-btn slider-btn-next" id="sliderNext" aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            @endif
        </div>

    </div>
</section>


<!-- ==========================================
     STYLE KHUSUS PORTFOLIO + SLIDER
     ========================================== -->
<style>
    /* ===== SECTION ===== */
    .portfolio-section {
        padding: 80px 0;
        background: #f8f9fa;
    }

    /* ===== SLIDER WRAPPER ===== */
    .portfolio-slider-wrapper {
        position: relative;
        overflow: hidden;
    }

    .portfolio-slider-track {
        display: flex;
        gap: 1.5rem;
        transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        will-change: transform;
        padding: 0.25rem 0;
    }

    /* ===== SLIDE ===== */
    .portfolio-slide {
        flex: 0 0 calc(33.333% - 1rem);
        min-width: 0;
        scroll-snap-align: start;
        transition: all 0.3s ease;
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
        transform: translateY(-6px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.10);
    }

    .portfolio-img-container {
        position: relative;
        width: 100%;
        padding-top: 75%; /* 4:3 Aspect Ratio */
        overflow: hidden;
        background: #e9ecef;
    }

    .portfolio-img-container img,
    .portfolio-placeholder {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
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
        background: linear-gradient(0deg, rgba(26,26,26,0.85) 0%, rgba(26,26,26,0.2) 100%);
        display: flex;
        align-items: flex-end;
        padding: 1.5rem;
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
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--accent);
        margin-bottom: 0.25rem;
    }

    .portfolio-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
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
        font-size: 0.9rem;
    }

    .portfolio-btn:hover {
        gap: 10px;
        color: #f0c000;
    }

    /* ===== SLIDER CONTROLS ===== */
    .portfolio-slider-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .slider-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 2px solid var(--black);
        background: #ffffff;
        color: var(--black);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 3px 3px 0 var(--black);
        font-weight: 700;
        padding: 0;
    }

    .slider-btn:hover {
        background: var(--primary);
        color: #ffffff;
        transform: translate(2px, 2px);
        box-shadow: 1px 1px 0 var(--black);
        border-color: var(--black);
    }

    .slider-btn:disabled {
        opacity: 0.3;
        cursor: not-allowed;
        transform: none;
        box-shadow: 3px 3px 0 var(--black);
    }

    .slider-dots {
        display: flex;
        gap: 10px;
    }

    .slider-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: 2px solid var(--black);
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 0;
    }

    .slider-dot.active {
        background: var(--primary);
        width: 28px;
        border-radius: 20px;
        border-color: var(--primary);
    }

    .slider-dot:hover:not(.active) {
        background: var(--gray);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .portfolio-slide {
            flex: 0 0 calc(50% - 0.75rem);
        }
    }

    @media (max-width: 576px) {
        .portfolio-section {
            padding: 60px 0;
        }
        .portfolio-slide {
            flex: 0 0 calc(100% - 0rem);
        }
        .slider-btn {
            width: 38px;
            height: 38px;
            font-size: 1rem;
        }
        .portfolio-title {
            font-size: 1rem;
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

<!-- ==========================================
     SLIDER JAVASCRIPT
     ========================================== -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.getElementById('portfolioSliderTrack');
        const prevBtn = document.getElementById('sliderPrev');
        const nextBtn = document.getElementById('sliderNext');
        const dotsContainer = document.getElementById('sliderDots');

        if (!track) return;

        const slides = track.querySelectorAll('.portfolio-slide');
        const totalSlides = slides.length;

        // If less than or equal to 3, hide controls
        if (totalSlides <= 3) {
            if (prevBtn) prevBtn.style.display = 'none';
            if (nextBtn) nextBtn.style.display = 'none';
            if (dotsContainer) dotsContainer.style.display = 'none';
            return;
        }

        // Determine slides per view
        let slidesPerView = 3;
        if (window.innerWidth <= 576) slidesPerView = 1;
        else if (window.innerWidth <= 992) slidesPerView = 2;

        let currentIndex = 0;
        let maxIndex = Math.max(0, totalSlides - slidesPerView);

        // Create dots
        const totalDots = Math.ceil(totalSlides / slidesPerView);
        for (let i = 0; i < totalDots; i++) {
            const dot = document.createElement('button');
            dot.className = 'slider-dot' + (i === 0 ? ' active' : '');
            dot.setAttribute('data-index', i);
            dot.addEventListener('click', function() {
                goTo(i);
            });
            dotsContainer.appendChild(dot);
        }

        function updateSlide() {
            const slideWidth = slides[0]?.offsetWidth + 24; // including gap
            if (!slideWidth) return;
            const offset = currentIndex * slideWidth;
            track.style.transform = 'translateX(-' + offset + 'px)';

            // Update dots
            const dots = dotsContainer.querySelectorAll('.slider-dot');
            const activeDotIndex = Math.floor(currentIndex / slidesPerView);
            dots.forEach((dot, idx) => {
                dot.classList.toggle('active', idx === activeDotIndex);
            });

            // Update buttons
            if (prevBtn) prevBtn.disabled = currentIndex === 0;
            if (nextBtn) nextBtn.disabled = currentIndex >= maxIndex;
        }

        function goTo(index) {
            currentIndex = Math.max(0, Math.min(index * slidesPerView, maxIndex));
            updateSlide();
        }

        function next() {
            if (currentIndex < maxIndex) {
                currentIndex = Math.min(currentIndex + slidesPerView, maxIndex);
                updateSlide();
            }
        }

        function prev() {
            if (currentIndex > 0) {
                currentIndex = Math.max(currentIndex - slidesPerView, 0);
                updateSlide();
            }
        }

        if (prevBtn) prevBtn.addEventListener('click', prev);
        if (nextBtn) nextBtn.addEventListener('click', next);

        // Recalculate on resize
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                // Recalculate slidesPerView
                let newSlidesPerView = 3;
                if (window.innerWidth <= 576) newSlidesPerView = 1;
                else if (window.innerWidth <= 992) newSlidesPerView = 2;

                if (newSlidesPerView !== slidesPerView) {
                    slidesPerView = newSlidesPerView;
                    maxIndex = Math.max(0, totalSlides - slidesPerView);
                    // Reset to first slide if current index is out of range
                    if (currentIndex > maxIndex) currentIndex = maxIndex;
                    // Recreate dots
                    dotsContainer.innerHTML = '';
                    const newTotalDots = Math.ceil(totalSlides / slidesPerView);
                    for (let i = 0; i < newTotalDots; i++) {
                        const dot = document.createElement('button');
                        dot.className = 'slider-dot' + (i === 0 ? ' active' : '');
                        dot.setAttribute('data-index', i);
                        dot.addEventListener('click', function() {
                            goTo(i);
                        });
                        dotsContainer.appendChild(dot);
                    }
                    updateSlide();
                }
            }, 200);
        });

        // Initial update
        updateSlide();
    });
</script>
@endpush