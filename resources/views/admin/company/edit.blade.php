@extends('layouts.admin')

@section('title', 'Edit Data Perusahaan')
@section('page-title', 'Edit Data Perusahaan')

@section('content')
<div class="neo-card">
    <form action="{{ route('admin.company.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')

        @if(session('success'))
            <div class="alert alert-success border-3 border-black rounded-0 d-flex align-items-center gap-2">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger border-3 border-black rounded-0">
                <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-exclamation-triangle-fill fs-5 mt-1"></i>
                    <div>
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Grid 2 Kolom untuk data utama -->
        <div class="row g-3">
            <div class="col-md-6">
                <!-- Alamat -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="bi bi-geo-alt me-1 text-primary"></i> Alamat
                    </label>
                    <textarea name="address" class="form-control border-3 border-black rounded-0" rows="3" placeholder="Masukkan alamat lengkap">{{ old('address', $company->address) }}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="bi bi-envelope me-1 text-primary"></i> Email
                    </label>
                    <input type="email" name="email" class="form-control border-3 border-black rounded-0" placeholder="info@perusahaan.com" value="{{ old('email', $company->email) }}">
                </div>

                <!-- Telepon -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="bi bi-telephone me-1 text-primary"></i> Telepon
                    </label>
                    <input type="text" name="phone" class="form-control border-3 border-black rounded-0" placeholder="+62 812 3456 7890" value="{{ old('phone', $company->phone) }}">
                </div>

                <!-- WhatsApp -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="bi bi-whatsapp me-1 text-success"></i> WhatsApp
                    </label>
                    <input type="text" name="whatsapp" class="form-control border-3 border-black rounded-0" placeholder="6281234567890" value="{{ old('whatsapp', $company->whatsapp) }}">
                    <small class="text-muted">Masukkan nomor tanpa tanda + (contoh: 6281234567890)</small>
                </div>
            </div>
        </div>

        <!-- Google Maps Embed (Full Width) -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-map me-1 text-danger"></i> Google Maps Embed
            </label>
            <textarea name="map_embed" class="form-control border-3 border-black rounded-0" rows="3" placeholder="https://www.google.com/maps/embed?pb=...">{{ old('map_embed', $company->map_embed) }}</textarea>
            <small class="text-muted">
                <i class="bi bi-info-circle me-1"></i> 
                Masukkan embed URL dari Google Maps (dapatkan dari menu "Bagikan" → "Sematkan peta")
            </small>
        </div>

        <!-- ==========================================
             SOSIAL MEDIA - FORM TERPISAH (LEBIH BAGUS!)
             ========================================== -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-share me-1 text-primary"></i> Sosial Media
            </label>
            <p class="text-muted small">Isi link sosial media perusahaan. Kosongkan jika tidak ada.</p>

            <div id="socialMediaContainer">
                @php
                    $socials = $company->social_media ?? [];
                    if (empty($socials) || !is_array($socials)) {
                        $socials = [
                            ['platform' => 'Instagram', 'url' => '', 'icon' => 'bi-instagram'],
                            ['platform' => 'LinkedIn', 'url' => '', 'icon' => 'bi-linkedin'],
                            ['platform' => 'YouTube', 'url' => '', 'icon' => 'bi-youtube'],
                            ['platform' => 'Facebook', 'url' => '', 'icon' => 'bi-facebook'],
                        ];
                    }
                @endphp

                @foreach($socials as $index => $social)
                    <div class="social-row border border-3 border-black p-3 mb-2 rounded-0" style="background: #faf8f5;">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label fw-bold small">Platform</label>
                                <select name="social_platforms[]" class="form-select border-2 border-black rounded-0">
                                    <option value="Instagram" {{ ($social['platform'] ?? '') == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                                    <option value="Facebook" {{ ($social['platform'] ?? '') == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                    <option value="LinkedIn" {{ ($social['platform'] ?? '') == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                                    <option value="YouTube" {{ ($social['platform'] ?? '') == 'YouTube' ? 'selected' : '' }}>YouTube</option>
                                    <option value="Twitter" {{ ($social['platform'] ?? '') == 'Twitter' ? 'selected' : '' }}>Twitter</option>
                                    <option value="TikTok" {{ ($social['platform'] ?? '') == 'TikTok' ? 'selected' : '' }}>TikTok</option>
                                    <option value="GitHub" {{ ($social['platform'] ?? '') == 'GitHub' ? 'selected' : '' }}>GitHub</option>
                                    <option value="Website" {{ ($social['platform'] ?? '') == 'Website' ? 'selected' : '' }}>Website</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-bold small">URL</label>
                                <input type="url" name="social_urls[]" class="form-control border-2 border-black rounded-0" 
                                       placeholder="https://..." value="{{ $social['url'] ?? '' }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold small">Icon</label>
                                <input type="text" name="social_icons[]" class="form-control border-2 border-black rounded-0" 
                                       placeholder="bi-instagram" value="{{ $social['icon'] ?? 'bi-link' }}">
                                <small class="text-muted" style="font-size: 0.65rem;">Bootstrap Icon</small>
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

            <!-- Tombol Tambah -->
            <button type="button" class="btn btn-custom-secondary mt-2" onclick="addSocialRow()">
                <i class="bi bi-plus-circle me-1"></i> Tambah Sosial Media
            </button>

            <!-- Info Icon -->
            <div class="mt-2">
                <small class="text-muted">
                    <i class="bi bi-info-circle me-1"></i>
                    <strong>Icon populer:</strong>
                    <span class="badge bg-light text-dark border border-1 me-1">bi-instagram</span>
                    <span class="badge bg-light text-dark border border-1 me-1">bi-facebook</span>
                    <span class="badge bg-light text-dark border border-1 me-1">bi-linkedin</span>
                    <span class="badge bg-light text-dark border border-1 me-1">bi-youtube</span>
                    <span class="badge bg-light text-dark border border-1 me-1">bi-twitter</span>
                    <span class="badge bg-light text-dark border border-1 me-1">bi-github</span>
                    <span class="badge bg-light text-dark border border-1 me-1">bi-tiktok</span>
                    <span class="badge bg-light text-dark border border-1 me-1">bi-globe</span>
                </small>
            </div>
        </div>

        <!-- Tombol -->
        <div class="d-flex gap-3 mt-4 pt-3 border-top border-2 border-black">
            <button type="submit" class="neo-btn">
                <i class="bi bi-check-lg me-2"></i> Update
            </button>
            <a href="{{ route('admin.dashboard') }}" class="neo-btn neo-btn-outline">
                <i class="bi bi-x-lg me-2"></i> Batal
            </a>
            <div class="ms-auto">
                <small class="text-muted">
                    <i class="bi bi-clock me-1"></i>
                    Terakhir diupdate: {{ $company->updated_at ? $company->updated_at->format('d M Y H:i') : 'Belum pernah' }}
                </small>
            </div>
        </div>
    </form>
</div>

{{-- ==========================================
     STYLE & SCRIPT
     ========================================== --}}
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
        background: #0d47a1;
        color: white;
        transform: translate(2px, 2px);
    }
</style>

@push('scripts')
<script>
    function addSocialRow() {
        const container = document.getElementById('socialMediaContainer');
        const rowCount = container.children.length;
        
        const newRow = document.createElement('div');
        newRow.className = 'social-row border border-3 border-black p-3 mb-2 rounded-0';
        newRow.style.background = '#faf8f5';
        newRow.innerHTML = `
            <div class="row g-2 align-items-end">
                <div class="col-md-3">
                    <label class="form-label fw-bold small">Platform</label>
                    <select name="social_platforms[]" class="form-select border-2 border-black rounded-0">
                        <option value="Instagram">Instagram</option>
                        <option value="Facebook">Facebook</option>
                        <option value="LinkedIn">LinkedIn</option>
                        <option value="YouTube">YouTube</option>
                        <option value="Twitter">Twitter</option>
                        <option value="TikTok">TikTok</option>
                        <option value="GitHub">GitHub</option>
                        <option value="Website">Website</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-bold small">URL</label>
                    <input type="url" name="social_urls[]" class="form-control border-2 border-black rounded-0" placeholder="https://...">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold small">Icon</label>
                    <input type="text" name="social_icons[]" class="form-control border-2 border-black rounded-0" placeholder="bi-instagram" value="bi-link">
                    <small class="text-muted" style="font-size: 0.65rem;">Bootstrap Icon</small>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-sm border-2 border-black rounded-0 w-100" onclick="removeSocialRow(this)" title="Hapus">
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
@endpush
@endsection