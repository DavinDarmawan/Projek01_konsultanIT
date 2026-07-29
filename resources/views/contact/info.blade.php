<!-- ======================================================
     CONTACT INFO - Icommits
     ====================================================== -->
<section id="contact-info" class="contact-info-section">
    <div class="container">
        <div class="row g-4">
            
            <!-- Alamat -->
            <div class="col-md-6 fade-in-up-ready">
                <div class="contact-info-card contact-info-card-green">
                    <div class="contact-info-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4 class="contact-info-title">Alamat</h4>
                        <p class="contact-info-text">
                            {{ $contact->address ?? 'Jl. Pasir Subur No.10, Ancol, Kec. Regol, Kota Bandung' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-6 fade-in-up-ready delay-1">
                <div class="contact-info-card contact-info-card-blue">
                    <div class="contact-info-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4 class="contact-info-title">Email</h4>
                        @php $email = $contact->email ?? 'info@icommits.co.id'; @endphp
                        <p class="contact-info-text">
                            <a href="mailto:{{ $email }}" class="contact-info-link">{{ $email }}</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Telepon -->
            <div class="col-md-6 fade-in-up-ready delay-2">
                <div class="contact-info-card contact-info-card-accent">
                    <div class="contact-info-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4 class="contact-info-title">Telepon</h4>
                        @php $phone = $contact->phone ?? '+62 819 9030 0100'; @endphp
                        <p class="contact-info-text">
                            <a href="tel:{{ $phone }}" class="contact-info-link">{{ $phone }}</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- WhatsApp -->
            <div class="col-md-6 fade-in-up-ready delay-3">
                <div class="contact-info-card contact-info-card-wa">
                    <div class="contact-info-icon">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4 class="contact-info-title">WhatsApp</h4>
                        @php $whatsapp = $contact->whatsapp ?? '6281990300100'; @endphp
                        <p class="contact-info-text">
                            <a href="https://wa.me/{{ $whatsapp }}" target="_blank" class="contact-info-link contact-info-link-wa">
                                <i class="bi bi-whatsapp me-1"></i> Chat via WhatsApp
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sosial Media -->
        <div class="row mt-5">
            <div class="col-12 fade-in-up-ready">
                <div class="contact-social-card">
                    <h4 class="contact-social-title">
                        <i class="bi bi-share-fill me-2" style="color: var(--primary);"></i> Ikuti Kami
                    </h4>
                    <div class="contact-social-links">
                        @php
                            $socials = $contact->social_media ?? [];
                            if (is_array($socials) && !empty($socials) && is_object($socials[0] ?? null) === false) {
                                $socials = collect($socials)->map(function($item) {
                                    return is_object($item) ? $item : (object) $item;
                                });
                            } elseif (is_object($socials) && method_exists($socials, 'toArray')) {
                                $socials = collect($socials->toArray())->map(function($item) {
                                    return is_object($item) ? $item : (object) $item;
                                });
                            } elseif (!is_iterable($socials)) {
                                $socials = [];
                            }
                        @endphp

                        @forelse($socials as $soc)
                            @php
                                $url = is_object($soc) ? ($soc->url ?? '#') : ($soc['url'] ?? '#');
                                $icon = is_object($soc) ? ($soc->icon ?? 'bi-link') : ($soc['icon'] ?? 'bi-link');
                                $platform = is_object($soc) ? ($soc->platform ?? '') : ($soc['platform'] ?? '');
                            @endphp
                            <a href="{{ $url }}" target="_blank" class="contact-social-link" title="{{ $platform }}">
                                <i class="bi {{ $icon }}"></i>
                            </a>
                        @empty
                            <p class="text-muted">Belum ada data sosial media.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ==========================================
     STYLE KHUSUS CONTACT INFO
     ========================================== -->
<style>
    /* ===== SECTION ===== */
    .contact-info-section {
        padding: 60px 0 80px;
        background: #f8f9fa;
    }

    /* ===== CONTACT INFO CARD ===== */
    .contact-info-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 1.5rem 1.5rem 1.5rem 1.5rem;
        height: 100%;
        display: flex;
        align-items: flex-start;
        gap: 1.25rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        transition: all 0.35s ease;
        border: 1px solid rgba(0, 0, 0, 0.04);
        position: relative;
        overflow: hidden;
    }

    .contact-info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
    }

    .contact-info-card-green::before {
        background: var(--primary);
    }

    .contact-info-card-blue::before {
        background: var(--secondary);
    }

    .contact-info-card-accent::before {
        background: var(--accent);
    }

    .contact-info-card-wa::before {
        background: #25D366;
    }

    .contact-info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.10);
    }

    /* ===== ICON ===== */
    .contact-info-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        flex-shrink: 0;
    }

    .contact-info-card-green .contact-info-icon {
        background: rgba(46, 125, 50, 0.12);
        color: var(--primary);
    }

    .contact-info-card-blue .contact-info-icon {
        background: rgba(21, 101, 192, 0.12);
        color: var(--secondary);
    }

    .contact-info-card-accent .contact-info-icon {
        background: rgba(249, 211, 66, 0.20);
        color: var(--accent);
    }

    .contact-info-card-wa .contact-info-icon {
        background: rgba(37, 211, 102, 0.12);
        color: #25D366;
    }

    /* ===== CONTENT ===== */
    .contact-info-content {
        flex: 1;
        min-width: 0;
    }

    .contact-info-title {
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #9ca3af;
        margin-bottom: 0.15rem;
    }

    .contact-info-text {
        font-size: 1.05rem;
        font-weight: 500;
        color: #1a1a1a;
        margin-bottom: 0;
        word-break: break-word;
    }

    .contact-info-link {
        color: #1a1a1a;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .contact-info-link:hover {
        color: var(--primary);
    }

    .contact-info-link-wa {
        color: #25D366;
        font-weight: 600;
    }

    .contact-info-link-wa:hover {
        color: #1da851;
    }

    /* ===== SOCIAL CARD ===== */
    .contact-social-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 2rem 1.5rem;
        text-align: center;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .contact-social-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 1.25rem;
    }

    .contact-social-links {
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .contact-social-link {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        color: #6b7280;
        background: #f1f3f5;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .contact-social-link:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    .contact-social-link:nth-child(1):hover {
        background: #E1306C;
        color: #ffffff;
    }

    .contact-social-link:nth-child(2):hover {
        background: #0A66C2;
        color: #ffffff;
    }

    .contact-social-link:nth-child(3):hover {
        background: #FF0000;
        color: #ffffff;
    }

    .contact-social-link:nth-child(4):hover {
        background: #1877F2;
        color: #ffffff;
    }

    .contact-social-link:nth-child(5):hover {
        background: #1DA1F2;
        color: #ffffff;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .contact-info-section {
            padding: 40px 0 60px;
        }
        .contact-info-card {
            padding: 1.25rem;
        }
        .contact-info-icon {
            width: 44px;
            height: 44px;
            font-size: 1.2rem;
        }
        .contact-info-text {
            font-size: 0.95rem;
        }
        .contact-social-card {
            padding: 1.5rem 1rem;
        }
        .contact-social-link {
            width: 42px;
            height: 42px;
            font-size: 1.1rem;
        }
    }

    @media (max-width: 576px) {
        .contact-info-card {
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 1.25rem 1rem;
        }
        .contact-info-card::before {
            width: 100%;
            height: 4px;
            top: 0;
            left: 0;
            right: 0;
        }
        .contact-info-icon {
            margin-bottom: 0.5rem;
        }
        .contact-info-title {
            font-size: 0.75rem;
        }
        .contact-info-text {
            font-size: 0.9rem;
        }
        .contact-social-link {
            width: 38px;
            height: 38px;
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