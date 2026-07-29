<section class="neo-section" id="keunggulan" style="background: var(--cream);">
    <div class="container">
        <div class="text-center mb-5">
            <div class="neo-badge mb-2">Keunggulan</div>
            <h2 class="neo-title" style="font-size: 2.5rem;">
                Kenapa Memilih <span style="color: var(--blue);">Icommits</span>?
            </h2>
        </div>
        <div class="row g-4">
            @forelse($benefits as $benefit)
                <div class="col-md-6 col-lg-3">
                    <div class="neo-card text-center h-100" style="background: white;">
                        <div style="font-size: 3rem; color: var(--green);">
                            <i class="bi {{ $benefit->icon ?? 'bi-check-circle' }}"></i>
                        </div>
                        <h5 class="fw-bold mt-2">{{ $benefit->title }}</h5>
                        <p style="font-size: 0.95rem; color: #555;">{{ $benefit->description }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center"><p>Belum ada data benefit.</p></div>
            @endforelse
        </div>
    </div>
</section>