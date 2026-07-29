@extends('layouts.admin')

@section('title', 'Edit Data Perusahaan')
@section('page-title', 'Edit Data Perusahaan')

@section('content')
<div class="neo-card">
    <form action="{{ route('admin.company.update', $company->id) }}" method="POST">
        @csrf @method('PUT')

        @if(session('success'))
            <div class="alert alert-success border-3 border-black rounded-0">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger border-3 border-black rounded-0">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- Alamat -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-geo-alt me-1"></i> Alamat
            </label>
            <textarea name="address" class="form-control border-3 border-black rounded-0" rows="3">{{ old('address', $company->address) }}</textarea>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-envelope me-1"></i> Email
            </label>
            <input type="email" name="email" class="form-control border-3 border-black rounded-0" value="{{ old('email', $company->email) }}">
        </div>

        <!-- Telepon -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-telephone me-1"></i> Telepon
            </label>
            <input type="text" name="phone" class="form-control border-3 border-black rounded-0" value="{{ old('phone', $company->phone) }}">
        </div>

        <!-- WhatsApp -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-whatsapp me-1"></i> WhatsApp
            </label>
            <input type="text" name="whatsapp" class="form-control border-3 border-black rounded-0" value="{{ old('whatsapp', $company->whatsapp) }}">
        </div>

        <!-- Google Maps Embed -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-map me-1"></i> Google Maps Embed
            </label>
            <textarea name="map_embed" class="form-control border-3 border-black rounded-0" rows="3">{{ old('map_embed', $company->map_embed) }}</textarea>
            <small class="text-muted">Masukkan embed URL dari Google Maps</small>
        </div>

        <!-- ==========================================
             SOSIAL MEDIA - Form JSON
             ========================================== -->
        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="bi bi-share me-1"></i> Sosial Media (JSON)
            </label>
            <textarea name="social_media" class="form-control border-3 border-black rounded-0" rows="6" 
                      placeholder='[
    {"platform":"Instagram","url":"https://instagram.com/icommits","icon":"bi-instagram"},
    {"platform":"LinkedIn","url":"https://linkedin.com/company/icommits","icon":"bi-linkedin"}
]'>{{ old('social_media', json_encode($company->social_media ?? [], JSON_PRETTY_PRINT)) }}</textarea>
            <small class="text-muted">
                <strong>Format:</strong> 
                <code>[{"platform":"Nama","url":"Link","icon":"bi-icon"}]</code>
                <br>
                <strong>Icon yang tersedia:</strong> bi-instagram, bi-facebook, bi-linkedin, bi-youtube, bi-twitter, bi-github, bi-tiktok
            </small>
            @error('social_media')
                <div class="text-danger mt-1 fw-bold">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol -->
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Validasi format JSON saat submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const socialField = document.querySelector('textarea[name="social_media"]');
            if (socialField && socialField.value.trim()) {
                try {
                    JSON.parse(socialField.value);
                } catch (e) {
                    e.preventDefault();
                    alert('Format JSON tidak valid! Periksa kembali data sosial media.\n\nError: ' + e.message);
                    socialField.focus();
                }
            }
        });
    });
</script>
@endpush