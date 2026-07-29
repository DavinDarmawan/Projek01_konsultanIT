<section id="portfolio" class="py-5">
    <div class="container">
        <div class="row section-header align-items-end fade-in-up-ready">
            <div class="col-md-8 text-start">
                <span class="section-tagline">Studi Kasus</span>
                <h2 class="section-title mb-0">Project Unggulan Kami</h2>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="/portfolio" class="btn btn-custom btn-custom-secondary">
                    Semua Project <i class="bi bi-grid-fill"></i>
                </a>
            </div>
        </div>

        <div class="row mt-2 g-4">
            @forelse($portfolios->take(3) as $key => $portfolio)
                @php
                    $img = $portfolio->image ? asset('storage/'.$portfolio->image) : null;
                    $patternClass = $key % 2 == 0 ? 'portfolio-placeholder-pattern-1' : 'portfolio-placeholder-pattern-2';
                @endphp
                <div class="col-lg-4 col-md-6 fade-in-up-ready delay-{{ $key }}">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-img-container">
                            @if($img)
                                <img src="{{ $img }}" alt="{{ $portfolio->title }}" style="width:100%; height:100%; object-fit:cover;">
                            @else
                                <div class="portfolio-placeholder {{ $patternClass }}">
                                    <i class="bi bi-window-sidebar text-primary fs-1"></i>
                                </div>
                            @endif
                            <div class="portfolio-overlay">
                                <div class="portfolio-info text-start">
                                    <span class="portfolio-category">{{ $portfolio->client ?? 'Project' }}</span>
                                    <h4 class="portfolio-title">{{ $portfolio->title }}</h4>
                                    <a href="{{ $portfolio->project_url ?? '#' }}" class="portfolio-btn text-start">
                                        View Detail <i class="bi bi-arrow-right-short"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center"><p>Belum ada portfolio.</p></div>
            @endforelse
        </div>
    </div>
</section>