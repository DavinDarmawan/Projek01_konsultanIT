<!-- ======================================================
     MAP LOKASI - Icommits
     ====================================================== -->
<section id="contact-map" class="map-section">
    <div class="container">
        
        <!-- Section Header -->
        <div class="row section-header text-center justify-content-center fade-in-up-ready">
            <div class="col-lg-7">
                <span class="section-tagline">
                    <i class="bi bi-geo-alt-fill me-1"></i> Lokasi
                </span>
                <h2 class="section-title mb-3">
                    Temukan <span class="text-primary">Kami</span>
                </h2>
                <p class="section-desc">
                    Kunjungi kantor kami untuk konsultasi atau diskusi lebih lanjut
                </p>
            </div>
        </div>

        <!-- Map Container -->
        <div class="map-wrapper fade-in-up-ready delay-1">
            <div class="map-container">
                <iframe 
                    src="{{ $contact->map_embed ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.123456!2d107.612345!3d-6.912345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTQnNDQuMyJTIDEwN8KwMzYnNDQuMyJF!5e0!3m2!1sid!2sid!4v1234567890' }}" 
                    width="100%" 
                    height="420" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="map-iframe">
                </iframe>
                
                <!-- Floating Pin Info -->
                <div class="map-pin-info">
                    <div class="map-pin-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="map-pin-text">
                        <strong>Icommits IT Consultant</strong>
                        <span>Bandung, Indonesia</span>
                    </div>
                    <a href="https://maps.google.com/?q={{ urlencode($contact->address ?? 'Jl. Pasir Subur No.10, Bandung') }}" 
                       target="_blank" 
                       class="map-pin-btn">
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Address detail below map -->
        <div class="row mt-4 justify-content-center fade-in-up-ready delay-2">
            <div class="col-lg-8">
                <div class="map-address-card">
                    <i class="bi bi-building me-2" style="color: var(--primary);"></i>
                    <span>{{ $contact->address ?? 'Jl. Pasir Subur No.10, Ancol, Kec. Regol, Kota Bandung' }}</span>
                    <a href="https://maps.google.com/?q={{ urlencode($contact->address ?? 'Jl. Pasir Subur No.10, Bandung') }}" 
                       target="_blank" 
                       class="map-address-btn">
                        Buka di Google Maps <i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ==========================================
     STYLE KHUSUS MAP
     ========================================== -->
<style>
    /* ===== SECTION ===== */
    .map-section {
        padding: 60px 0 80px;
        background: #ffffff;
    }

    /* ===== MAP WRAPPER ===== */
    .map-wrapper {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.10);
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .map-container {
        position: relative;
        width: 100%;
    }

    .map-iframe {
        display: block;
        width: 100%;
        height: 420px;
        background: #f1f3f5;
    }

    /* ===== FLOATING PIN INFO ===== */
    .map-pin-info {
        position: absolute;
        bottom: 24px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 16px;
        padding: 12px 20px 12px 16px;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.14);
        border: 1px solid rgba(255, 255, 255, 0.2);
        min-width: 200px;
        max-width: 90%;
    }

    .map-pin-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: rgba(46, 125, 50, 0.12);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .map-pin-text {
        flex: 1;
        min-width: 0;
    }

    .map-pin-text strong {
        display: block;
        font-size: 0.85rem;
        color: #1a1a1a;
        font-weight: 700;
    }

    .map-pin-text span {
        display: block;
        font-size: 0.7rem;
        color: #6b7280;
    }

    .map-pin-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--primary);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        flex-shrink: 0;
        font-size: 0.9rem;
    }

    .map-pin-btn:hover {
        background: var(--primary-dark);
        transform: scale(1.06);
        color: #ffffff;
    }

    /* ===== ADDRESS CARD ===== */
    .map-address-card {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
        padding: 14px 24px;
        background: #f8f9fa;
        border-radius: 16px;
        border: 1px solid #e9ecef;
        font-size: 0.95rem;
        color: #4b5563;
        transition: all 0.3s ease;
    }

    .map-address-card:hover {
        background: #ffffff;
        border-color: var(--primary);
        box-shadow: 0 4px 16px rgba(46, 125, 50, 0.08);
    }

    .map-address-btn {
        color: var(--primary);
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .map-address-btn:hover {
        color: var(--primary-dark);
        gap: 8px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .map-iframe {
            height: 340px;
        }
        .map-pin-info {
            padding: 10px 16px 10px 12px;
            min-width: 160px;
        }
        .map-pin-icon {
            width: 34px;
            height: 34px;
            font-size: 1rem;
        }
        .map-pin-text strong {
            font-size: 0.8rem;
        }
        .map-pin-text span {
            font-size: 0.65rem;
        }
        .map-pin-btn {
            width: 32px;
            height: 32px;
            font-size: 0.8rem;
        }
        .map-address-card {
            font-size: 0.85rem;
            padding: 12px 18px;
        }
    }

    @media (max-width: 576px) {
        .map-section {
            padding: 40px 0 60px;
        }
        .map-iframe {
            height: 240px;
        }
        .map-pin-info {
            padding: 8px 12px 8px 10px;
            min-width: 140px;
            gap: 10px;
            bottom: 16px;
        }
        .map-pin-icon {
            width: 28px;
            height: 28px;
            font-size: 0.8rem;
        }
        .map-pin-text strong {
            font-size: 0.7rem;
        }
        .map-pin-text span {
            font-size: 0.55rem;
        }
        .map-pin-btn {
            width: 28px;
            height: 28px;
            font-size: 0.7rem;
        }
        .map-address-card {
            font-size: 0.8rem;
            padding: 10px 14px;
            flex-direction: column;
            text-align: center;
        }
        .map-address-btn {
            font-size: 0.8rem;
        }
    }

    /* ===== FADE IN ANIMATION ===== */
    .fade-in-up-ready {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .fade-in-up-ready.delay-1 {
        animation-delay: 0.2s;
    }

    .fade-in-up-ready.delay-2 {
        animation-delay: 0.4s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>