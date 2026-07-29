<footer class="footer-section">
    <div class="container text-start">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <a class="footer-brand" href="/">
                    <img src="{{ asset('storage/logo/icommits.png') }}" alt="Icommits Logo" height="42" class="mb-3">
                </a>
                <p class="mb-4">
                    Layanan IT Consultant profesional di bawah legalitas <strong>AKMI Karya Global</strong>. Berkomitmen memberikan sistem perangkat lunak dan infrastruktur modern terbaik.
                </p>
                <div class="footer-socials">
                    <a href="#" class="social-icon" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-icon" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="social-icon" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="social-icon" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-6">
                <h5 class="footer-title">Quick Links</h5>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="#layanan">Our Services</a></li>
                    <li><a href="#portfolio">Case Studies</a></li>
                    <li><a href="#kontak">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <h5 class="footer-title">Layanan Kami</h5>
                {{-- <ul class="footer-links">
                    @foreach($services->take(7) as $service)
                        <li><a href="{{ route('service.detail', $service->slug) ?? '#' }}">{{ $service->title }}</a></li>
                    @endforeach
                </ul> --}}
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-title">Lokasi</h5>
                <p class="mb-2">
                    Jl. Riung Purna I No.17, Cisaranten Kidul, Gedebage, Bandung, Jawa Barat 40295
                </p>
                <p class="mb-1"><i class="bi bi-telephone-fill text-primary"></i> +62 (22) 753-4886</p>
                <p><i class="bi bi-envelope-fill text-primary"></i> info@icommitter.com</p>
            </div>
        </div>

        <div class="row footer-bottom text-center text-md-start">
            <div class="col-md-6">
                <p>&copy; {{ date('Y') }} Icommits IT Consultant Indonesia. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end mt-2 mt-md-0">
                <p>Powered by <strong class="text-white">AKMI Karya Global</strong></p>
            </div>
        </div>
    </div>
</footer>