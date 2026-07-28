<section class="neo-section" style="background: {{ $cta->background_color ?? 'var(--black)' }}; color: white; border-bottom: none;">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="neo-badge mb-3" style="background: var(--yellow); color: var(--black); border-color: white;">
                    <i class="bi bi-megaphone me-1"></i> Siap Bertransformasi Digital?
                </div>
                <h2 class="neo-title" style="color: white; font-size: 2.8rem;">
                    {{ $cta->title ?? 'Wujudkan Solusi TI Terbaik untuk Bisnis Anda' }}
                </h2>
                <p style="font-size: 1.1rem; color: #ccc; max-width: 600px;">
                    {{ $cta->subtitle ?? 'Konsultasikan kebutuhan teknologi informasi Anda dengan tim ahli Icommits.' }}
                </p>
                <div class="mt-4 d-flex flex-wrap gap-3">
                    <a href="{{ $cta->button_link ?? '/contact' }}" class="neo-btn" style="background: {{ $cta->button_color ?? 'var(--yellow)' }}; color: var(--black); border-color: white; box-shadow: 4px 4px 0 white;">
                        <i class="bi bi-whatsapp me-2"></i> {{ $cta->button_text ?? 'Konsultasi Gratis' }}
                    </a>
                    <a href="#" class="neo-btn" style="background: transparent; color: white; border-color: white; box-shadow: 4px 4px 0 white;">
                        <i class="bi bi-telephone me-2"></i> +62 819 9030 0100
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div style="background: var(--yellow); padding: 40px 20px; border: 4px solid white; box-shadow: 8px 8px 0 white;">
                    <i class="bi bi-chat-dots" style="font-size: 3rem; color: var(--black);"></i>
                    <p class="fw-bold mt-2" style="color: var(--black); font-size: 1.1rem;">
                        #IcommitsSolusiTI
                    </p>
                    <p style="color: var(--black); font-size: 0.9rem; margin-bottom: 0;">
                        info@icommits.co.id
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>