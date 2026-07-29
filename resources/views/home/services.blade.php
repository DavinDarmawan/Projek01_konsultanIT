<section class="neo-section" id="layanan" style="background: white;">
    <div class="container">
        <div class="text-center mb-5">
            <div class="neo-badge mb-2">Layanan Kami</div>
            <h2 class="neo-title" style="font-size: 2.5rem;">
                Solusi Digital <span style="color: var(--green);">Terintegrasi</span>
            </h2>
            <p class="neo-subtitle" style="max-width: 600px; margin: 0 auto;">
                Icommits menyediakan berbagai layanan teknologi informasi untuk mendukung transformasi digital Anda.
            </p>
        </div>
        
        <div class="row g-4">
            @forelse($services as $key => $service)
                @php
                    // Mapping ikon berdasarkan slug
                    $icons = [
                        'software-development' => 'bi-code-slash',
                        'website-cms'          => 'bi-globe2',
                        'e-raport'             => 'bi-mortarboard',
                        'kehosting'            => 'bi-server',
                        'legal-dari-kita'      => 'bi-file-earmark-text',
                        'training'             => 'bi-mortarboard-fill',
                        'balanja-id'           => 'bi-cart4',
                    ];
                    $icon = $icons[$service->slug] ?? 'bi-box';
                    // Warna aksen berdasarkan indeks
                    $colors = ['var(--green)', 'var(--blue)', 'var(--yellow)', '#e65100', '#6a1b9a', '#c62828', '#00838f'];
                    $color = $colors[$key % count($colors)];
                @endphp
                <div class="col-md-6 col-lg-4">
                    <div class="neo-card h-100" style="border-left: 6px solid {{ $color }};">
                        <div class="mb-3" style="font-size: 2.5rem; color: {{ $color }};">
                            <i class="bi {{ $icon }}"></i>
                        </div>
                        <h4 class="fw-bold">{{ $service->title }}</h4>
                        <p style="color: #444;">{{ $service->description }}</p>
                        @if($service->benefits)
                            <small class="text-muted"><i class="bi bi-check-circle-fill me-1" style="color: var(--green);"></i> {{ $service->benefits }}</small>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada layanan yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>