@php
    $heroImage = isset($hero->image) && $hero->image ? asset('storage/' . $hero->image) : null;
    $defaultBg = 'linear-gradient(135deg, #f0f7f4 0%, #e6f0ed 100%)';
@endphp

<section id="hero" class="hero-section" style="background: {{ $heroImage ? 'url(' . $heroImage . ') center/cover no-repeat' : $defaultBg }};">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text Content -->
            <div class="col-lg-6 text-start fade-in-up-ready">
                <div class="hero-badge">
                    <i class="bi bi-shield-check"></i> Mitra Transformasi Digital Terpercaya
                </div>
                <h1 class="hero-title">
                    {{ $hero->title ?? 'Solusi IT Premium untuk Bisnis & Instansi' }}
                    <span>{{ $hero->subtitle ?? 'Anda' }}</span>
                </h1>
                <p class="hero-subtitle">
                    {{ $hero->desc ?? 'Icommits membantu Perusahaan, UMKM, Startup, Sekolah, dan Instansi Pemerintah membangun infrastruktur teknologi modern untuk akselerasi pertumbuhan di era digital.' }}
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ $hero->button_link ?? '#kontak' }}" class="btn btn-custom btn-custom-primary">
                        {{ $hero->button_text ?? 'Hubungi Kami' }} <i class="bi bi-chat-dots-fill"></i>
                    </a>
                    <a href="#layanan" class="btn btn-custom btn-custom-secondary">
                        Lihat Layanan <i class="bi bi-grid-fill"></i>
                    </a>
                </div>

                <!-- Stats Grid -->
                <div class="row hero-stats-wrapper g-4 mt-4">
                    <div class="col-6 col-sm-3">
                        <div class="stat-item text-start">
                            <h3>50<span>+</span></h3>
                            <p>Project Selesai</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="stat-item text-start">
                            <h3>20<span>+</span></h3>
                            <p>Partner Bisnis</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="stat-item text-start">
                            <h3>8<span>+</span></h3>
                            <p>Tahun Pengalaman</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="stat-item text-start">
                            <h3>98<span>%</span></h3>
                            <p>Kepuasan Klien</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <!-- Mockup Graphic -->
            <div class="col-lg-6 fade-in-up-ready delay-2 mt-5 mt-lg-0">
                <div class="mockup-container">
                    <div class="mockup-shadow"></div>
                    <div class="dashboard-mockup">
                        <div class="mockup-header">
                            <div class="mockup-dots">
                                <span class="mockup-dot red"></span>
                                <span class="mockup-dot yellow"></span>
                                <span class="mockup-dot green"></span>
                            </div>
                            <div class="mockup-search"></div>
                            <div><i class="bi bi-gear-fill text-muted"></i></div>
                        </div>
                        <div class="mockup-body">
                            <div class="row align-items-center mb-4">
                                <div class="col-8">
                                    <h5 class="mb-1 text-dark fs-6 fw-bold">Analisis Sistem Perusahaan</h5>
                                    <span class="text-muted d-block" style="font-size: 0.8rem;">Integrasi ERP & Software Development</span>
                                </div>
                                <div class="col-4 text-end">
                                    <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 fs-7">Selesai</span>
                                </div>
                            </div>
                            <div class="mockup-chart-container">
                                <div class="mockup-bar" style="height: 60%;"></div>
                                <div class="mockup-bar active" style="height: 85%;"></div>
                                <div class="mockup-bar" style="height: 45%;"></div>
                                <div class="mockup-bar" style="height: 70%;"></div>
                                <div class="mockup-bar" style="height: 90%;"></div>
                                <div class="mockup-bar" style="height: 55%;"></div>
                                <div class="mockup-bar" style="height: 75%;"></div>
                            </div>
                            <div class="row mt-4 pt-2 border-top g-3">
                                <div class="col-6">
                                    <span class="text-muted d-block mb-1" style="font-size: 0.75rem;">Server Uptime</span>
                                    <strong class="text-dark">99.98%</strong>
                                </div>
                                <div class="col-6 text-end">
                                    <span class="text-muted d-block mb-1" style="font-size: 0.75rem;">Optimasi Cloud</span>
                                    <strong class="text-success"><i class="bi bi-caret-up-fill"></i> +24%</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating cards -->
                    <div class="mockup-card-small float-card-1">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-wrapper icon-wrapper-green m-0" style="width:40px; height:40px; font-size:1.1rem;">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>
                            <div>
                                <span class="text-muted d-block" style="font-size: 0.7rem;">Digital Growth</span>
                                <strong class="text-dark" style="font-size: 0.9rem;">+45.8%</strong>
                            </div>
                        </div>
                    </div>
                    <div class="mockup-card-small float-card-2">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-wrapper icon-wrapper-blue m-0" style="width:40px; height:40px; font-size:1.1rem;">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div>
                                <span class="text-muted d-block" style="font-size: 0.7rem;">Klien Baru</span>
                                <strong class="text-dark" style="font-size: 0.9rem;">200+ Aktif</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
        </div>
    </div>
</section> <!-- Ini penutup section asli -->

<!-- Tambahkan kodenya di bawah sini -->
<style>
    .hero-stats-wrapper .stat-item {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 16px;
        padding: 14px 18px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .hero-stats-wrapper .stat-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 107, 76, 0.15);
        border-color: rgba(0, 107, 76, 0.3);
    }
    
    .hero-stats-wrapper .stat-item h3 {
        font-size: 1.8rem;
        margin-bottom: 2px;
    }
    
    .hero-stats-wrapper .stat-item p {
        color: #374151 !important;
        font-weight: 600;
        font-size: 0.85rem;
    }
</style>
