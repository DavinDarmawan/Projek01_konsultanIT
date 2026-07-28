@php
    $heroImage = isset($hero->image) && $hero->image ? asset('storage/' . $hero->image) : null;
@endphp

<section class="neo-section" style="padding-top: 40px; background: white; border-bottom: 4px solid var(--black);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="neo-badge mb-3">
                    <i class="bi bi-stars me-1"></i> IT Consultant Terpercaya
                </div>
                <h1 class="neo-title">
                    {{ $hero->title ?? 'Solusi TI Profesional & Handal' }}
                </h1>
                <p class="neo-subtitle mt-3" style="font-size: 1.2rem;">
                    {{ $hero->subtitle ?? 'Icommits hadir sejak 2015 sebagai mitra strategis dalam mewujudkan transformasi digital.' }}
                </p>
                <div class="mt-4 d-flex flex-wrap gap-3">
                    <a href="{{ $hero->button_link ?? '#layanan' }}" class="neo-btn">
                        <i class="bi bi-rocket-takeoff me-2"></i> {{ $hero->button_text ?? 'Layanan Kami' }}
                    </a>
                    <a href="#portfolio" class="neo-btn neo-btn-outline">
                        <i class="bi bi-grid-3x3-gap me-2"></i> Lihat Portfolio
                    </a>
                </div>
                <div class="mt-4 d-flex gap-4">
                    <div>
                        <span class="fw-bold fs-4" style="color: var(--green);">2015</span>
                        <p class="mb-0" style="font-size: 0.85rem;">Tahun Berdiri</p>
                    </div>
                    <div>
                        <span class="fw-bold fs-4" style="color: var(--green);">10+</span>
                        <p class="mb-0" style="font-size: 0.85rem;">Programmer</p>
                    </div>
                    <div>
                        <span class="fw-bold fs-4" style="color: var(--green);">50+</span>
                        <p class="mb-0" style="font-size: 0.85rem;">Proyek Selesai</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    @if($heroImage)
                        <img src="{{ $heroImage }}" alt="{{ $hero->title ?? 'Hero' }}" class="img-neo" style="height: 380px; object-fit: cover;">
                    @else
                        <div class="img-neo" style="background: var(--gray); height: 380px; display: flex; align-items: center; justify-content: center; font-size: 5rem; color: var(--black);">
                            <i class="bi bi-laptop"></i>
                        </div>
                    @endif
                    <div class="position-absolute" style="bottom: -16px; right: -16px; background: var(--yellow); padding: 12px 20px; border: 3px solid var(--black); font-weight: 700;">
                        <i class="bi bi-check-circle-fill me-1" style="color: var(--green);"></i> 100% Komitmen
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>