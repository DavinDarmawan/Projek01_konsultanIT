<section class="neo-section" style="background: var(--cream);">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="neo-card h-100" style="border-left: 6px solid var(--green);">
                    <h4 class="fw-bold"><i class="bi bi-geo-alt me-2" style="color: var(--green);"></i> Alamat</h4>
                    <p>{{ $contact->address ?? 'Jl. Pasir Subur No.10, Ancol, Kec. Regol, Kota Bandung' }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="neo-card h-100" style="border-left: 6px solid var(--blue);">
                    <h4 class="fw-bold"><i class="bi bi-envelope me-2" style="color: var(--blue);"></i> Email</h4>
                    <p><a href="mailto:{{ $contact->email }}" style="color: var(--black); text-decoration: underline;">{{ $contact->email ?? 'info@icommits.co.id' }}</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="neo-card h-100" style="border-left: 6px solid var(--yellow);">
                    <h4 class="fw-bold"><i class="bi bi-telephone me-2" style="color: var(--yellow);"></i> Telepon</h4>
                    <p><a href="tel:{{ $contact->phone }}" style="color: var(--black); text-decoration: underline;">{{ $contact->phone ?? '+62 819 9030 0100' }}</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="neo-card h-100" style="border-left: 6px solid #25D366;">
                    <h4 class="fw-bold"><i class="bi bi-whatsapp me-2" style="color: #25D366;"></i> WhatsApp</h4>
                    <p><a href="https://wa.me/{{ $contact->whatsapp ?? '6281990300100' }}" target="_blank" style="color: var(--black); text-decoration: underline;">Chat via WhatsApp</a></p>
                </div>
            </div>
        </div>

        <!-- Sosial Media -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="neo-card" style="text-align: center;">
                    <h4 class="fw-bold mb-3"><i class="bi bi-share me-2" style="color: var(--blue);"></i> Ikuti Kami</h4>
                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                        @forelse($contact->social_media ?? [] as $soc)
                            <a href="{{ $soc->url }}" target="_blank" class="text-dark" style="font-size: 2rem; transition: 0.2s;">
                                <i class="bi {{ $soc->icon }}"></i>
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