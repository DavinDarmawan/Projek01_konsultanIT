<section class="neo-section" id="portfolio" style="background: var(--cream);">
    <div class="container">
        <div class="text-center mb-5">
            <div class="neo-badge mb-2">Portfolio</div>
            <h2 class="neo-title" style="font-size: 2.5rem;">
                Proyek <span style="color: var(--blue);">Unggulan</span>
            </h2>
            <p class="neo-subtitle">
                Beberapa proyek yang telah kami selesaikan untuk berbagai klien.
            </p>
        </div>
        
        <div class="row g-4">
            @forelse($portfolios->take(4) as $portfolio)
                @php
                    $img = $portfolio->image ? asset('storage/' . $portfolio->image) : null;
                    // Tentukan warna badge berdasarkan client atau indeks
                    $badgeColors = ['var(--green)', 'var(--blue)', '#e65100', 'var(--yellow)'];
                    $badgeColor = $badgeColors[$loop->index % count($badgeColors)];
                @endphp
                <div class="col-md-6 col-lg-3">
                    <div class="neo-card h-100" style="padding: 0; overflow: hidden; background: white;">
                        <div style="background: var(--gray); height: 180px; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: var(--black); border-bottom: 3px solid var(--black); overflow: hidden;">
                            @if($img)
                                <img src="{{ $img }}" alt="{{ $portfolio->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <i class="bi bi-folder2-open"></i>
                            @endif
                        </div>
                        <div style="padding: 1.25rem;">
                            <span class="neo-badge" style="font-size: 0.65rem; background: {{ $badgeColor }}; color: white; border-color: var(--black);">
                                {{ $portfolio->client ?? 'Klien' }}
                            </span>
                            <h5 class="fw-bold mt-2">{{ $portfolio->title }}</h5>
                            <p style="font-size: 0.9rem; color: #555;">{{ Str::limit($portfolio->description, 80) }}</p>
                            @if($portfolio->project_url)
                                <a href="{{ $portfolio->project_url }}" target="_blank" class="neo-btn" style="padding: 6px 16px; font-size: 0.8rem; box-shadow: 3px 3px 0 var(--black);">Lihat Proyek</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada portfolio.</p>
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-5">
            <a href="#" class="neo-btn neo-btn-outline">
                <i class="bi bi-box-arrow-up-right me-2"></i> Lihat Semua Proyek
            </a>
        </div>
    </div>
</section>