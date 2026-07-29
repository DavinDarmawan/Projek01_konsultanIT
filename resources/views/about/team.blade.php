<!-- ======================================================
     TIM KAMI - Icommits
     ====================================================== -->
<section id="tim" class="team-section">
    <div class="container">
        
        <!-- Section Header -->
        <div class="row section-header text-center justify-content-center fade-in-up-ready">
            <div class="col-lg-7">
                <span class="section-tagline">
                    <i class="bi bi-people-fill me-1"></i> Tim Kami
                </span>
                <h2 class="section-title mb-3">
                    Di Balik <span class="text-primary">Icommits</span>
                </h2>
                <p class="section-desc">
                    Mereka yang berdedikasi menghadirkan solusi teknologi terbaik untuk Anda.
                </p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($team as $key => $tim)
                <div class="col-md-3 col-6 fade-in-up-ready delay-{{ ($key % 3) }}">
                    <div class="team-card">
                        <div class="team-avatar">
                            @php
                                // Cek apakah $tim object atau array
                                $image = is_object($tim) ? ($tim->image ?? null) : ($tim['image'] ?? null);
                                $name = is_object($tim) ? ($tim->name ?? 'Member') : ($tim['name'] ?? 'Member');
                                $role = is_object($tim) ? ($tim->role ?? 'Staff') : ($tim['role'] ?? 'Staff');
                                $desc = is_object($tim) ? ($tim->description ?? '') : ($tim['description'] ?? '');
                            @endphp
                            <img 
                                src="{{ $image ? asset('storage/team/'. $image) : 'https://ui-avatars.com/api/?name='.urlencode($name).'&background=2e7d32&color=fff&size=120' }}" 
                                alt="{{ $name }} - {{ $role }}"
                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($name) }}&background=2e7d32&color=fff&size=120'"
                            >
                            <div class="team-avatar-border"></div>
                        </div>
                        <h5 class="team-name">{{ $name }}</h5>
                        <p class="team-role">{{ $role }}</p>
                        <p class="team-desc">{{ $desc }}</p>
                        <div class="team-social">
                            <a href="#" class="team-social-link"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="team-social-link"><i class="bi bi-twitter-x"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada data tim.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>