<!-- ==========================================
     ABOUT HERO SECTION
     ========================================== -->
<section id="about-hero" class="about-hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            
            <!-- LEFT COLUMN: Content -->
            <div class="col-lg-7 fade-in-up-ready">
                <span class="section-tagline">
                    <i class="bi bi-building me-1"></i> Tentang Kami
                </span>
                <h1 class="about-hero-title">
                    Mengenal <span class="text-primary">Icommits</span> Lebih Dekat
                </h1>
                <p class="about-hero-desc">
                    <strong>CV. Icommits Karya Solusi</strong> adalah perusahaan IT Consultant yang 
                    didirikan pada tahun <strong class="text-primary">2015</strong> oleh tiga pemuda berbakat di bidang 
                    pemrograman dan piranti lunak. Kami berkomitmen memberikan solusi teknologi 
                    terbaik untuk bisnis, pemerintah, dan pendidikan di Indonesia.
                </p>
                
                <!-- Info Chips / Badges -->
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <div class="info-chip">
                        <i class="bi bi-calendar3 text-primary"></i>
                        <span>2015 - Didirikan</span>
                    </div>
                    <div class="info-chip">
                        <i class="bi bi-building text-primary"></i>
                        <span>CV sejak 2018</span>
                    </div>
                    <div class="info-chip">
                        <i class="bi bi-geo-alt text-primary"></i>
                        <span>Bandung, Indonesia</span>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="mt-4">
                    <a href="#visi-misi" class="btn btn-custom btn-custom-primary">
                        Lihat Visi & Misi <i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>
            </div>

            <!-- RIGHT COLUMN: Image / Illustration -->
            <div class="col-lg-5 fade-in-up-ready delay-2">
                <div class="about-image-wrapper">
                    <div class="about-image-container">
                        <!-- Ganti src ini dengan foto yang kamu mau -->
                        <img 
                            src="{{ asset('storage/about/team-icommits.jpg') }}" 
                            alt="Tim Icommits IT Consultant" 
                            class="about-hero-image"
                            onerror="this.src='https://placehold.co/600x400/2e7d32/FFFFFF?text=Icommits+Team'"
                        >
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>