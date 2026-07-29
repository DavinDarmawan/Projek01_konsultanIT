<section id="teknologi" class="section-padding" style="background: white;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge-eco">
                <i class="fas fa-microchip me-1"></i> Teknologi
            </span>
            <h2 class="section-title" style="font-size: 2.8rem;">
                Teknologi <span style="color: var(--primary);">Yang Kami Gunakan</span>
            </h2>
            <p class="section-subtitle" style="color: #6b7280; max-width: 600px; margin: 0 auto;">
                Kami mengadopsi teknologi terkini untuk memastikan solusi yang handal dan modern.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($technologies as $tech)
                <div class="col-4 col-md-2">
                    <div class="card-modern text-center" style="padding: 1.5rem 1rem; background: var(--light); border: 1px solid rgba(0,0,0,0.06); transition: all 0.3s;">
                        <div style="font-size: 2.8rem; color: {{ $tech->color ?? 'var(--primary)' }}; margin-bottom: 0.5rem;">
                            <i class="fas {{ $tech->icon ?? 'fa-cube' }}"></i>
                        </div>
                        <h6 class="fw-bold mt-2" style="font-size: 0.95rem; color: var(--dark);">{{ $tech->name }}</h6>
                        <!-- Efek hover: garis bawah warna -->
                        <div style="width: 0; height: 3px; background: var(--primary); margin: 0 auto; transition: width 0.3s;" class="tech-underline"></div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p style="color: #6b7280;">Belum ada data teknologi.</p>
                </div>
            @endforelse
        </div>

        <!-- Catatan tambahan -->
        <div class="text-center mt-5">
            <p style="color: #9ca3af; font-size: 0.9rem;">
                <i class="fas fa-code me-1"></i> 
                Dan masih banyak teknologi lain yang kami kuasai
            </p>
        </div>
    </div>
</section>

<!-- Style tambahan untuk efek hover -->
<style>
    .card-modern:hover .tech-underline {
        width: 40px !important;
    }
    .card-modern {
        transition: all 0.3s ease;
    }
    .card-modern:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.08);
    }
</style>