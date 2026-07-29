<section id="layanan" class="py-5">
    <div class="container">
        <div class="row section-header text-center justify-content-center fade-in-up-ready">
            <div class="col-lg-7">
                <span class="section-tagline">Layanan Kami</span>
                <h2 class="section-title mb-3">Solusi IT Komprehensif & Aset Bisnis Digital</h2>
                <p class="section-desc">
                    Pilihan layanan lengkap untuk memenuhi berbagai skala kebutuhan teknologi, mulai dari kustom software hingga manajemen infrastruktur cloud.
                </p>
            </div>
        </div>

        <div class="row g-4 mt-4 justify-content-center">
            @forelse($services as $key => $service)
                @php
                    $icons = [
                        'software-development' => 'bi-code-square',
                        'website-cms'          => 'bi-layout-text-window-reverse',
                        'e-raport'             => 'bi-journal-check',
                        'kehosting'            => 'bi-cloud-check-fill',
                        'legal-dari-kita'      => 'bi-briefcase-fill',
                        'training'             => 'bi-mortarboard-fill',
                        'balanja-id'           => 'bi-cart-dash-fill',
                    ];
                    $icon = $icons[$service->slug] ?? 'bi-box';
                    // Warna icon: hijau untuk yang berbau hosting/legal, biru untuk lainnya
                    $greenSlugs = ['kehosting', 'legal-dari-kita', 'balanja-id'];
                    $isGreen = in_array($service->slug, $greenSlugs);
                    $wrapperClass = $isGreen ? 'icon-wrapper-green' : 'icon-wrapper-blue';
                @endphp
                @php
                    $article = $service->articles()->where('status', 'published')->latest()->first();
                    $articleSlug = $article ? $article->slug : null;
                @endphp
                <div class="col-lg-4 col-md-6 fade-in-up-ready delay-{{ ($key % 3) }}">
                    <div class="service-card">
                        <div class="icon-wrapper {{ $wrapperClass }}">
                            <i class="bi {{ $icon }}"></i>
                        </div>
                        <h4>{{ $service->title }}</h4>
                        <p>{{ $service->description }}</p>
                        @if($articleSlug)
                            <a href="{{ route('service.article', $articleSlug) }}" class="service-link">
                                Learn More <i class="bi bi-chevron-right"></i>
                            </a>
                        @else
                            <span class="service-link text-muted">
                                Belum ada artikel <i class="bi bi-info-circle"></i>
                            </span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12 text-center"><p>Belum ada layanan.</p></div>
            @endforelse
        </div>
    </div>
</section>