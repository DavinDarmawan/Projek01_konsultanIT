<section id="keunggulan" class="bg-light-section py-5">
    <div class="container">
        <div class="row section-header text-center justify-content-center fade-in-up-ready">
            <div class="col-lg-7">
                <span class="section-tagline">Keunggulan</span>
                <h2 class="section-title mb-3">Mengapa Memilih Icommits?</h2>
                <p class="section-desc">
                    Kombinasi pengalaman, standar keamanan tinggi, dan kepatuhan regulasi menjamin kelancaran sistem IT Anda.
                </p>
            </div>
        </div>

        <div class="row g-4">
            @forelse($benefits as $key => $benefit)
                <div class="col-md-6 col-lg-3 fade-in-up-ready delay-{{ ($key % 3) }}">
                    <div class="feature-card text-center text-sm-start">
                        <div class="feature-icon">
                            <i class="bi {{ $benefit->icon ?? 'bi-check-circle' }}"></i>
                        </div>
                        <h4>{{ $benefit->title }}</h4>
                        <p class="text-muted">{{ $benefit->description }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada data benefit. Silakan tambahkan melalui admin panel.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>