<!-- ======================================================
     VISI & MISI - Icommits
     ====================================================== -->
<section id="visi-misi" class="vision-mission-section pb-5">
    <div class="container">
        
        <!-- Section Header -->
        <div class="row section-header text-center justify-content-center fade-in-up-ready">
            <div class="col-lg-7">
                <span class="section-tagline">
                    <i class="bi bi-bullseye me-1"></i> Visi & Misi
                </span>
                <h2 class="section-title mb-3">
                    Tujuan <span class="text-primary">Perusahaan</span>
                </h2>
                <p class="section-desc">
                    Langkah-langkah strategis menuju masa depan yang lebih baik
                </p>
            </div>
        </div>

        <div class="row mt-4 mb-4 g-4">
            <!-- Kolom Visi -->
            <div class="col-md-6 fade-in-up-ready">
                <div class="vision-card vision-card-visi">
                    <div class="vision-card-header">
                        <div class="vision-icon-wrapper vision-icon-visi">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                        <h3 class="vision-card-title">Visi</h3>
                    </div>
                    <p class="vision-card-text">
                        Menjadi perusahaan teknologi informasi profesional yang berdaya saing, 
                        mampu menyediakan layanan dan solusi teknologi terbaik untuk 
                        pengusaha, pemerintah, dan pendidikan.
                    </p>
                    <div class="vision-quote">
                        <i class="bi bi-quote"></i>
                        <span>Visi besar dimulai dari langkah kecil hari ini</span>
                    </div>
                </div>
            </div>

            <!-- Kolom Misi -->
            <div class="col-md-6 fade-in-up-ready delay-2">
                <div class="vision-card vision-card-misi">
                    <div class="vision-card-header">
                        <div class="vision-icon-wrapper vision-icon-misi">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h3 class="vision-card-title">Misi</h3>
                    </div>
                    <ul class="vision-mission-list">
                        <li>
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>Menggunakan teknologi yang aman (secure) dan handal (reliabel)</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>Menyediakan kemitraan strategis dengan prinsip saling menguntungkan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>Pelayanan terbaik dengan jaminan berkualitas, cepat, tepat, harga kompetitif</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>Menghasilkan produk TI dalam negeri yang mampu bersaing</span>
                        </li>
                    </ul>
                    <div class="vision-quote vision-quote-misi">
                        <i class="bi bi-quote"></i>
                        <span>Misi yang jelas membawa hasil yang luar biasa</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ==========================================
     STYLE KHUSUS VISI & MISI
     ========================================== -->
<style>
    /* ===== SECTION ===== */
    .vision-mission-section {
        padding-top: 40px;
        background: #f8f9fa;
    }

    /* ===== VISION CARD ===== */
    .vision-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 2rem 2rem 1.5rem;
        height: 100%;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        transition: all 0.35s ease;
        border: 1px solid rgba(0, 0, 0, 0.04);
        position: relative;
        overflow: hidden;
    }

    .vision-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        border-radius: 20px 0 0 20px;
    }

    .vision-card-visi::before {
        background: var(--secondary);
    }

    .vision-card-misi::before {
        background: var(--primary);
    }

    .vision-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.10);
    }

    /* ===== CARD HEADER ===== */
    .vision-card-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 1.25rem;
    }

    .vision-icon-wrapper {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        flex-shrink: 0;
    }

    .vision-icon-visi {
        background: rgba(21, 101, 192, 0.10);
        color: var(--secondary);
    }

    .vision-icon-misi {
        background: rgba(46, 125, 50, 0.10);
        color: var(--primary);
    }

    .vision-card-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0;
    }

    /* ===== CARD TEXT ===== */
    .vision-card-text {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #4b5563;
        margin-bottom: 1.25rem;
    }

    /* ===== MISSION LIST ===== */
    .vision-mission-list {
        list-style: none;
        padding: 0;
        margin: 0 0 1.25rem 0;
    }

    .vision-mission-list li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 1rem;
        line-height: 1.7;
        color: #4b5563;
        padding: 6px 0;
    }

    .vision-mission-list li i {
        font-size: 1.2rem;
        color: var(--primary);
        margin-top: 2px;
        flex-shrink: 0;
    }

    /* ===== QUOTE ===== */
    .vision-quote {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 18px;
        background: #f8f9fa;
        border-radius: 12px;
        border-left: 4px solid var(--secondary);
        margin-top: 0.5rem;
    }

    .vision-quote-misi {
        border-left-color: var(--primary);
    }

    .vision-quote i {
        font-size: 1.2rem;
        color: var(--secondary);
        opacity: 0.6;
    }

    .vision-quote-misi i {
        color: var(--primary);
    }

    .vision-quote span {
        font-size: 0.9rem;
        color: #6b7280;
        font-style: italic;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .vision-mission-section {
            padding: 60px 0;
        }
        .vision-card {
            padding: 1.5rem;
        }
        .vision-card-title {
            font-size: 1.3rem;
        }
        .vision-card-text {
            font-size: 1rem;
        }
        .vision-mission-list li {
            font-size: 0.95rem;
        }
        .vision-icon-wrapper {
            width: 48px;
            height: 48px;
            font-size: 1.3rem;
        }
    }

    @media (max-width: 576px) {
        .vision-card {
            padding: 1.25rem;
        }
        .vision-card-header {
            gap: 10px;
        }
        .vision-card-title {
            font-size: 1.15rem;
        }
        .vision-quote span {
            font-size: 0.8rem;
        }
    }
</style>