<section id="cta-banner" class="cta-section text-center">
    <div class="container fade-in-up-ready">
        <h2>{{ $cta->title ?? 'Ready to Transform Your Business Digitally?' }}</h2>
        <p>{{ $cta->subtitle ?? 'Konsultasikan kebutuhan infrastruktur teknologi Anda dengan tim engineer ahli kami hari ini secara gratis.' }}</p>
        <a href="{{ $cta->button_link ?? '#kontak' }}" class="btn btn-custom btn-custom-white btn-lg">
            {{ $cta->button_text ?? 'Hubungi Kami' }} <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</section>