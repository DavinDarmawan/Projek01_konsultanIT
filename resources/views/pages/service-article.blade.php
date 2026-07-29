@extends('layouts.app')

@section('title', $article->meta_title ?? $article->title . ' - Icommits')
@section('meta_description', $article->meta_description ?? strip_tags($article->content))

@section('content')

<!-- ==========================================
     BREADCRUMB
     ========================================== -->
<section class="breadcrumb-section py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/" class="text-decoration-none text-primary fw-semibold">
                        <i class="bi bi-house-fill me-1"></i> Beranda
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/#layanan" class="text-decoration-none text-primary fw-semibold">Layanan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($article->title, 50) }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ==========================================
     HERO ARTICLE
     ========================================== -->
<section class="article-hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center fade-in-up-ready">
                <!-- Badge Service -->
                @if($service)
                    <span class="section-tagline">
                        <i class="bi bi-tag-fill me-1"></i> {{ $service->title }}
                    </span>
                @endif

                <h1 class="article-hero-title">{{ $article->title }}</h1>

                <!-- Meta Info -->
                <div class="article-meta d-flex justify-content-center flex-wrap gap-3 mt-3">
                    <span class="article-meta-item">
                        <i class="bi bi-calendar3"></i>
                        {{ $article->created_at->format('d M Y') }}
                    </span>
                    <span class="article-meta-item">
                        <i class="bi bi-clock"></i>
                        {{ $article->created_at->diffForHumans() }}
                    </span>
                    @if($article->created_at != $article->updated_at)
                        <span class="article-meta-item">
                            <i class="bi bi-pencil"></i>
                            Diperbarui {{ $article->updated_at->diffForHumans() }}
                        </span>
                    @endif
                    <span class="article-meta-item">
                        <i class="bi bi-bookmark"></i>
                        {{ Str::wordCount(strip_tags($article->content)) }} kata
                    </span>
                </div>

                <!-- Deskripsi / Excerpt -->
                @if($article->meta_description)
                    <p class="article-hero-desc mt-4 mx-auto" style="max-width: 700px;">
                        {{ $article->meta_description }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     CONTENT ARTICLE
     ========================================== -->
<section class="article-content-section">
    <div class="container">
        <div class="row g-5">
            <!-- Main Content -->
            <div class="col-lg-8 mx-lg-auto">
                <div class="article-content-wrapper fade-in-up-ready">
                    <div class="article-body">
                        {!! $article->content !!}
                    </div>

                    <!-- Divider + Share -->
                    <div class="article-footer mt-5 pt-4 border-top">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <span class="text-muted small">
                                <i class="bi bi-tags me-1"></i>
                                @if($service)
                                    <a href="/#layanan" class="text-decoration-none text-primary fw-semibold">
                                        #{{ Str::slug($service->title) }}
                                    </a>
                                @endif
                            </span>
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-semibold small">Bagikan:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                                   target="_blank" class="share-btn share-btn-facebook" title="Facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->title) }}" 
                                   target="_blank" class="share-btn share-btn-twitter" title="Twitter">
                                    <i class="bi bi-twitter-x"></i>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                                   target="_blank" class="share-btn share-btn-linkedin" title="LinkedIn">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" 
                                   target="_blank" class="share-btn share-btn-wa" title="WhatsApp">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==========================================
             RELATED ARTICLES
             ========================================== -->
        @if($relatedArticles->isNotEmpty())
            <div class="row mt-5">
                <div class="col-12">
                    <div class="related-section">
                        <h4 class="related-title">
                            <i class="bi bi-bookmarks me-2 text-primary"></i>
                            Artikel Lainnya
                        </h4>
                        <div class="row g-4">
                            @foreach($relatedArticles as $related)
                                <div class="col-md-4 fade-in-up-ready">
                                    <a href="{{ route('service.article', $related->slug) }}" 
                                       class="related-card-link">
                                        <div class="related-card">
                                            <div class="related-card-icon">
                                                <i class="bi bi-file-text"></i>
                                            </div>
                                            <div>
                                                <h6 class="related-card-title">{{ Str::limit($related->title, 50) }}</h6>
                                                <span class="related-card-date">{{ $related->created_at->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- ==========================================
             CTA BACK TO SERVICES
             ========================================== -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="/#layanan" class="btn btn-primary-custom">
                    <i class="bi bi-arrow-left me-2"></i> Kembali ke Layanan
                </a>
            </div>
        </div>

    </div>
</section>

@endsection


<!-- ==========================================
     STYLE KHUSUS
     ========================================== -->
<style>
    /* ===== BREADCRUMB ===== */
    .breadcrumb-section {
        background: #ffffff;
        border-bottom: 1px solid #e9ecef;
    }
    .breadcrumb-item a {
        color: var(--primary) !important;
        font-weight: 500;
    }
    .breadcrumb-item a:hover {
        color: var(--primary-dark) !important;
    }
    .breadcrumb-item.active {
        color: #6b7280;
    }

    /* ===== ARTICLE HERO ===== */
    .article-hero-section {
        padding: 50px 0 30px;
        background: #ffffff;
    }
    .article-hero-title {
        font-size: 2.8rem;
        font-weight: 700;
        line-height: 1.2;
        color: #1a1a1a;
        max-width: 800px;
        margin: 0 auto;
    }
    .article-hero-desc {
        font-size: 1.1rem;
        color: #4b5563;
        line-height: 1.8;
    }
    .article-meta-item {
        font-size: 0.85rem;
        color: #6b7280;
    }
    .article-meta-item i {
        margin-right: 4px;
        color: var(--primary);
    }

    /* ===== ARTICLE CONTENT ===== */
    .article-content-section {
        padding: 30px 0 70px;
        background: #f8f9fa;
    }
    .article-content-wrapper {
        background: #ffffff;
        padding: 2.5rem 3rem;
        border-radius: 20px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.06);
        border: 1px solid rgba(0,0,0,0.04);
    }
    .article-body {
        font-size: 1.05rem;
        line-height: 1.9;
        color: #1f2937;
    }
    .article-body h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-top: 2rem;
        margin-bottom: 0.75rem;
    }
    .article-body h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
    }
    .article-body h4 {
        font-size: 1.15rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-top: 1.25rem;
        margin-bottom: 0.5rem;
    }
    .article-body p {
        margin-bottom: 1rem;
    }
    .article-body ul, .article-body ol {
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }
    .article-body li {
        margin-bottom: 0.5rem;
    }
    .article-body blockquote {
        border-left: 4px solid var(--primary);
        padding: 1rem 1.5rem;
        background: #f8f9fa;
        border-radius: 0 12px 12px 0;
        margin: 1.5rem 0;
        font-style: italic;
        color: #4b5563;
    }
    .article-body blockquote strong {
        color: var(--primary);
    }
    .article-body hr {
        margin: 2rem 0;
        border-color: #e9ecef;
    }

    /* ===== SHARE BUTTON ===== */
    .share-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        border: none;
    }
    .share-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        color: white;
    }
    .share-btn-facebook { background: #1877F2; }
    .share-btn-twitter { background: #000000; }
    .share-btn-linkedin { background: #0A66C2; }
    .share-btn-wa { background: #25D366; }

    /* ===== RELATED ARTICLES ===== */
    .related-section {
        background: #ffffff;
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        border: 1px solid rgba(0,0,0,0.04);
    }
    .related-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 1.25rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #f1f3f5;
    }
    .related-card-link {
        text-decoration: none;
        display: block;
        transition: all 0.3s ease;
    }
    .related-card-link:hover .related-card {
        background: #f8f9fa;
        transform: translateX(6px);
        border-color: var(--primary);
    }
    .related-card {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 18px;
        border-radius: 12px;
        border: 1px solid #e9ecef;
        background: #ffffff;
        transition: all 0.3s ease;
    }
    .related-card-icon {
        width: 42px;
        height: 42px;
        background: rgba(46,125,50,0.10);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        flex-shrink: 0;
        font-size: 1.2rem;
    }
    .related-card-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 0;
        line-height: 1.3;
    }
    .related-card-date {
        font-size: 0.7rem;
        color: #9ca3af;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .article-hero-title { font-size: 2.2rem; }
        .article-content-wrapper { padding: 1.5rem; }
        .article-body { font-size: 1rem; }
    }
    @media (max-width: 576px) {
        .article-hero-section { padding: 30px 0 20px; }
        .article-hero-title { font-size: 1.6rem; }
        .article-content-section { padding: 20px 0 40px; }
        .article-content-wrapper { padding: 1.25rem; }
        .article-body { font-size: 0.95rem; }
        .article-body h2 { font-size: 1.4rem; }
        .article-body h3 { font-size: 1.15rem; }
        .related-card { padding: 12px 14px; }
        .related-card-icon { width: 36px; height: 36px; font-size: 1rem; }
        .related-card-title { font-size: 0.8rem; }
        .related-section { padding: 1rem; }
        .share-btn { width: 32px; height: 32px; font-size: 0.75rem; }
    }

    /* ===== FADE IN ANIMATION ===== */
    .fade-in-up-ready {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }
    @keyframes fadeInUp {
        to { opacity: 1; transform: translateY(0); }
    }
</style>