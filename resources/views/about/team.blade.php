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

        <div class="row g-4 mt-4 justify-content-center">
            @forelse($team as $key => $tim)
                @php
                    // Cek apakah $tim object atau array
                    $image = is_object($tim) ? ($tim->image ?? null) : ($tim['image'] ?? null);
                    $name = is_object($tim) ? ($tim->name ?? 'Member') : ($tim['name'] ?? 'Member');
                    $position = is_object($tim) ? ($tim->position ?? $tim->role ?? 'Staff') : ($tim['position'] ?? $tim['role'] ?? 'Staff');
                    $desc = is_object($tim) ? ($tim->description ?? '') : ($tim['description'] ?? '');
                    
                    $delay = ($key % 3) + 1;
                    $colors = ['#2e7d32', '#1565c0', '#f9d342', '#e65100'];
                    $color = $colors[$key % count($colors)];
                @endphp
                
                <div class="col-md-3 col-6 fade-in-up-ready delay-{{ $delay }}">
                    <div class="team-card">
                        <div class="team-avatar-wrapper">
                            <div class="team-avatar">
<img 
    src="{{ $image ? asset('storage/' . $image) : 'https://ui-avatars.com/api/?name='.urlencode($name).'&background=2e7d32&color=fff&size=120&bold=true' }}" 
    alt="{{ $name }} - {{ $position }}"
    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($name) }}&background=2e7d32&color=fff&size=120&bold=true'"
>
                                <div class="team-avatar-border" style="border-color: {{ $color }};"></div>
                            </div>
                            <div class="team-status">
                                <i class="bi bi-check-circle-fill text-success"></i>
                            </div>
                        </div>
                        <h5 class="team-name">{{ $name }}</h5>
                        <p class="team-role" style="color: {{ $color }};">{{ $position }}</p>
                        <p class="team-desc">{{ Str::limit($desc, 60) }}</p>
                        
                        <!-- ===== SOSIAL MEDIA ===== -->
                        <div class="team-social">
                            @php
                                // Ambil semua URL sosial media
                                $linkedin = is_object($tim) ? ($tim->linkedin ?? null) : ($tim['linkedin'] ?? null);
                                $twitter = is_object($tim) ? ($tim->twitter ?? null) : ($tim['twitter'] ?? null);
                                $instagram = is_object($tim) ? ($tim->instagram ?? null) : ($tim['instagram'] ?? null);
                                $github = is_object($tim) ? ($tim->github ?? null) : ($tim['github'] ?? null);
                            @endphp

                            @if(!empty($linkedin))
                                <a href="{{ $linkedin }}" class="team-social-link" target="_blank" title="LinkedIn">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            @endif

                            @if(!empty($twitter))
                                <a href="{{ $twitter }}" class="team-social-link" target="_blank" title="Twitter">
                                    <i class="bi bi-twitter-x"></i>
                                </a>
                            @endif

                            @if(!empty($instagram))
                                <a href="{{ $instagram }}" class="team-social-link" target="_blank" title="Instagram">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            @endif

                            @if(!empty($github))
                                <a href="{{ $github }}" class="team-social-link" target="_blank" title="GitHub">
                                    <i class="bi bi-github"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="empty-state">
                        <i class="bi bi-people" style="font-size: 3rem; color: #d1d5db;"></i>
                        <p class="text-muted mt-3">Belum ada data tim.</p>
                    </div>
                </div>
            @endforelse
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
        padding: 1.75rem 1.25rem 1.5rem;
        text-align: center;
        height: 100%;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border: 1px solid rgba(0, 0, 0, 0.04);
        position: relative;
        overflow: hidden;
    }

    .team-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .team-card:hover::before {
        opacity: 1;
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
        border-color: rgba(46, 125, 50, 0.15);
    }

    /* ===== AVATAR ===== */
    .team-avatar-wrapper {
        position: relative;
        width: 130px;
        height: 130px;
        margin: 0 auto 1rem auto;
    }

    .team-avatar {
        position: relative;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        padding: 4px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        box-shadow: 0 8px 30px rgba(46, 125, 50, 0.15);
        transition: all 0.4s ease;
    }

    .team-card:hover .team-avatar {
        transform: scale(1.04);
        box-shadow: 0 12px 40px rgba(46, 125, 50, 0.25);
    }

    .team-avatar img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        display: block;
        border: 3px solid #ffffff;
        transition: all 0.4s ease;
    }

    .team-avatar-border {
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        border: 3px dashed var(--primary);
        opacity: 0.3;
        transition: all 0.4s ease;
        animation: spin 20s linear infinite;
    }

    .team-card:hover .team-avatar-border {
        opacity: 0.8;
        transform: scale(1.08);
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* ===== STATUS ===== */
    .team-status {
        position: absolute;
        bottom: 4px;
        right: 4px;
        width: 28px;
        height: 28px;
        background: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.10);
        border: 2px solid #ffffff;
    }

    .team-status i {
        font-size: 0.9rem;
        color: #22c55e;
    }

    /* ===== TEAM NAME ===== */
    .team-name {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.1rem;
        letter-spacing: -0.3px;
    }

    /* ===== TEAM ROLE ===== */
    .team-role {
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 0.6rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* ===== TEAM DESC ===== */
    .team-desc {
        font-size: 0.85rem;
        color: #6b7280;
        line-height: 1.6;
        margin-bottom: 1rem;
        min-height: 44px;
    }

    /* ===== SOCIAL LINKS ===== */
    .team-social {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .team-social-link {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 0.95rem;
    }

    .team-social-link:hover {
        background: var(--primary);
        color: #ffffff;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(46, 125, 50, 0.30);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state i {
        display: block;
        margin: 0 auto;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .team-avatar-wrapper {
            width: 110px;
            height: 110px;
        }
        .team-name {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        .team-section {
            padding: 60px 0;
        }
        .team-avatar-wrapper {
            width: 100px;
            height: 100px;
        }
        .team-status {
            width: 24px;
            height: 24px;
        }
        .team-status i {
            font-size: 0.75rem;
        }
        .team-name {
            font-size: 0.95rem;
        }
        .team-role {
            font-size: 0.7rem;
        }
        .team-desc {
            font-size: 0.8rem;
            min-height: 36px;
        }
        .team-social-link {
            width: 34px;
            height: 34px;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 576px) {
        .team-card {
            padding: 1.25rem 0.75rem;
        }
        .team-avatar-wrapper {
            width: 80px;
            height: 80px;
        }
        .team-status {
            width: 20px;
            height: 20px;
            bottom: 2px;
            right: 2px;
        }
        .team-status i {
            font-size: 0.6rem;
        }
        .team-name {
            font-size: 0.85rem;
        }
        .team-role {
            font-size: 0.65rem;
        }
        .team-desc {
            font-size: 0.75rem;
            min-height: 30px;
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