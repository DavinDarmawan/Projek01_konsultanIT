@extends('layouts.admin')

@section('title', 'Edit Data Perusahaan')
@section('page-title', 'Edit Data Perusahaan')

@section('content')
<div class="neo-card">
    <form action="{{ route('admin.company.update', $company->id) }}" method="POST">
        @csrf @method('PUT')

        @if(session('success'))
            <div class="alert alert-success border-3 border-black rounded-0">{{ session('success') }}</div>
        @endif

        <!-- Alamat -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-geo-alt me-1"></i> Alamat
            </label>
            <textarea name="address" class="form-control border-3 border-black rounded-0" rows="3">{{ $company->address }}</textarea>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-envelope me-1"></i> Email
            </label>
            <input type="email" name="email" class="form-control border-3 border-black rounded-0" value="{{ $company->email }}">
        </div>

        <!-- Telepon -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-telephone me-1"></i> Telepon
            </label>
            <input type="text" name="phone" class="form-control border-3 border-black rounded-0" value="{{ $company->phone }}">
        </div>

        <!-- WhatsApp -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-whatsapp me-1"></i> WhatsApp
            </label>
            <input type="text" name="whatsapp" class="form-control border-3 border-black rounded-0" value="{{ $company->whatsapp }}">
        </div>

        <!-- Google Maps Embed -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-map me-1"></i> Google Maps Embed
            </label>
            <textarea name="map_embed" class="form-control border-3 border-black rounded-0" rows="3" placeholder="https://www.google.com/maps/embed?pb=...">{{ $company->map_embed }}</textarea>
            <small class="text-muted">Masukkan embed URL dari Google Maps</small>
        </div>

        <!-- ======================================================
             SOSIAL MEDIA - Form Terpisah
             ====================================================== -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-share me-1"></i> Sosial Media
            </label>
            <p class="text-muted small">Isi minimal platform & url, icon akan otomatis terisi</p>

            <div id="socialMediaContainer">
                @php
                    $socials = $company->social_media ?? [];
                    if (empty($socials) || !is_array($socials)) {
                        $socials = [
                            ['platform' => 'Instagram', 'url' => '#', 'icon' => 'bi-instagram'],
                            ['platform' => 'LinkedIn', 'url' => '#', 'icon' => 'bi-linkedin'],
                            ['platform' => 'YouTube', 'url' => '#', 'icon' => 'bi-youtube'],
                            ['platform' => 'Facebook', 'url' => '#', 'icon' => 'bi-facebook'],
                        ];
                    }
                @endphp

                @foreach($socials as $index => $social)
                    <div class="social-row border p-3 mb-2 rounded-0 border-3 border-black" style="background: #faf8f5;">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label fw-bold small">Platform</label>
                                <input type="text" name="social_platforms[]" class="form-control border-2 border-black rounded-0" 
                                       placeholder="Instagram" value="{{ $social['platform'] ?? '' }}">
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-bold small">URL</label>
                                <input type="text" name="social_urls[]" class="form-control border-2 border-black rounded-0" 
                                       placeholder="https://instagram.com/..." value="{{ $social['url'] ?? '#' }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold small">Icon</label>
                                <input type="text" name="social_icons[]" class="form-control border-2 border-black rounded-0" 
                                       placeholder="bi-instagram" value="{{ $social['icon'] ?? 'bi-link' }}">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger btn-sm border-2 border-black rounded-0 w-100" 
                                        onclick="removeSocialRow(this)" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tombol Tambah Sosial Media -->
            <button type="button" class="btn btn-custom btn-custom-secondary btn-sm mt-2" onclick="addSocialRow()">
                <i class="bi bi-plus-circle me-1"></i> Tambah Sosial Media
            </button>
            <small class="text-muted d-block mt-1">Icon menggunakan Bootstrap Icons (contoh: bi-instagram, bi-facebook, bi-linkedin, bi-youtube)</small>
        </div>

        <!-- Tombol Submit -->
        <div class="d-flex gap-3 mt-4">
            <button type="submit" class="neo-btn">
                <i class="bi bi-check-lg me-2"></i> Update
            </button>
            <a href="{{ route('admin.dashboard') }}" class="neo-btn neo-btn-outline">
                <i class="bi bi-x-lg me-2"></i> Batal
            </a>
        </div>
    </form>
</div>

<!-- ==========================================
     SCRIPT TAMBAH & HAPUS SOSIAL MEDIA
     ========================================== -->
<style>
    .social-row {
        transition: all 0.3s ease;
    }
    .social-row:hover {
        background: #ffffff !important;
        border-color: var(--primary) !important;
    }
    .btn-custom-secondary {
        background: var(--secondary);
        color: white;
        border: 2px solid var(--black);
        border-radius: 0;
        padding: 8px 20px;
        font-weight: 600;
        transition: 0.15s;
    }
    .btn-custom-secondary:hover {
        background: var(--secondary-dark);
        color: white;
        transform: translate(2px, 2px);
    }
</style>

<script>
    function addSocialRow() {
        const container = document.getElementById('socialMediaContainer');
        const rowCount = container.children.length;
        
        const newRow = document.createElement('div');
        newRow.className = 'social-row border p-3 mb-2 rounded-0 border-3 border-black';
        newRow.style.background = '#faf8f5';
        newRow.innerHTML = `
            <div class="row g-2 align-items-end">
                <div class="col-md-3">
                    <label class="form-label fw-bold small">Platform</label>
                    <input type="text" name="social_platforms[]" class="form-control border-2 border-black rounded-0" 
                           placeholder="Contoh: Twitter">
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-bold small">URL</label>
                    <input type="text" name="social_urls[]" class="form-control border-2 border-black rounded-0" 
                           placeholder="https://twitter.com/...">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold small">Icon</label>
                    <input type="text" name="social_icons[]" class="form-control border-2 border-black rounded-0" 
                           placeholder="bi-twitter" value="bi-link">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-sm border-2 border-black rounded-0 w-100" 
                            onclick="removeSocialRow(this)" title="Hapus">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        `;
        
        container.appendChild(newRow);
    }

    function removeSocialRow(button) {
        const row = button.closest('.social-row');
        if (row && document.querySelectorAll('.social-row').length > 1) {
            row.remove();
        } else {
            alert('Minimal harus ada 1 sosial media!');
        }
    }
</script>
@endsection