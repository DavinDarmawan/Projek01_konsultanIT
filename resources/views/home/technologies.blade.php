<section class="neo-section" style="background: white;">
    <div class="container">
        <div class="text-center mb-5">
            <div class="neo-badge mb-2">Teknologi</div>
            <h2 class="neo-title" style="font-size: 2.5rem;">
                Teknologi <span style="color: var(--green);">Yang Kami Gunakan</span>
            </h2>
            <p class="neo-subtitle">
                Kami mengadopsi teknologi terkini untuk memastikan solusi yang handal dan modern.
            </p>
        </div>
        <div class="row g-4 justify-content-center">
            @forelse($technologies as $tech)
                <div class="col-4 col-md-2">
                    <div class="neo-card text-center" style="padding: 1.5rem; background: var(--cream);">
                        <div style="font-size: 2.5rem; color: {{ $tech->color ?? 'var(--black)' }};">
                            <i class="bi {{ $tech->icon ?? 'bi-box' }}"></i>
                        </div>
                        <h6 class="fw-bold mt-2">{{ $tech->name }}</h6>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center"><p>Belum ada data teknologi.</p></div>
            @endforelse
        </div>
    </div>
</section>