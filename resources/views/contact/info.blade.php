<section class="neo-section" style="background: var(--cream);">
    <div class="container">
        <div class="row g-4">
            <!-- Alamat -->
            <div class="col-md-6">
                <div class="neo-card h-100" style="border-left: 6px solid var(--green);">
                    <h4 class="fw-bold"><i class="bi bi-geo-alt me-2" style="color: var(--green);"></i> Alamat</h4>
                    <p>{{ $contact->address ?? 'Jl. Pasir Subur No.10, Ancol, Kec. Regol, Kota Bandung' }}</p>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <div class="neo-card h-100" style="border-left: 6px solid var(--blue);">
                    <h4 class="fw-bold"><i class="bi bi-envelope me-2" style="color: var(--blue);"></i> Email</h4>
                    @php $email = $contact->email ?? 'info@icommits.co.id'; @endphp
                    <p><a href="mailto:{{ $email }}" style="color: var(--black); text-decoration: underline;">{{ $email }}</a></p>
                </div>
            </div>

            <!-- Telepon -->
            <div class="col-md-6">
                <div class="neo-card h-100" style="border-left: 6px solid var(--yellow);">
                    <h4 class="fw-bold"><i class="bi bi-telephone me-2" style="color: var(--yellow);"></i> Telepon</h4>
                    @php $phone = $contact->phone ?? '+62 819 9030 0100'; @endphp
                    <p><a href="tel:{{ $phone }}" style="color: var(--black); text-decoration: underline;">{{ $phone }}</a></p>
                </div>
            </div>

            <!-- WhatsApp -->
            <div class="col-md-6">
                <div class="neo-card h-100" style="border-left: 6px solid #25D366;">
                    <h4 class="fw-bold"><i class="bi bi-whatsapp me-2" style="color: #25D366;"></i> WhatsApp</h4>
                    @php $whatsapp = $contact->whatsapp ?? '6281990300100'; @endphp
                    <p><a href="https://wa.me/{{ $whatsapp }}" target="_blank" style="color: var(--black); text-decoration: underline;">Chat via WhatsApp</a></p>
                </div>
            </div>
        </div>

        <!-- Sosial Media -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="neo-card" style="text-align: center;">
                    <h4 class="fw-bold mb-3"><i class="bi bi-share me-2" style="color: var(--blue);"></i> Ikuti Kami</h4>
                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                        @php
                            $socials = $contact->social_media ?? [];
                            // Jika $socials adalah array asosiatif atau object, kita konversi ke collection of objects
                            if (is_array($socials) && !empty($socials) && is_object($socials[0] ?? null) === false) {
                                $socials = collect($socials)->map(function($item) {
                                    return is_object($item) ? $item : (object) $item;
                                });
                            } elseif (is_object($socials) && method_exists($socials, 'toArray')) {
                                $socials = collect($socials->toArray())->map(function($item) {
                                    return is_object($item) ? $item : (object) $item;
                                });
                            } elseif (!is_iterable($socials)) {
                                $socials = [];
                            }
                        @endphp

                        @forelse($socials as $soc)
                            @php
                                // Ambil url dan icon aman
                                $url = is_object($soc) ? ($soc->url ?? '#') : ($soc['url'] ?? '#');
                                $icon = is_object($soc) ? ($soc->icon ?? 'bi-link') : ($soc['icon'] ?? 'bi-link');
                                $platform = is_object($soc) ? ($soc->platform ?? '') : ($soc['platform'] ?? '');
                            @endphp
                            <a href="{{ $url }}" target="_blank" class="text-dark" style="font-size: 2rem; transition: 0.2s;" title="{{ $platform }}">
                                <i class="bi {{ $icon }}"></i>
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