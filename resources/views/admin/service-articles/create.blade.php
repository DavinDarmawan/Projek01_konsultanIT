@extends('layouts.admin')

@section('title', 'Tambah Artikel Layanan')
@section('page-title', 'Tambah Artikel Layanan')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.service-articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

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

            <!-- Grid 2 kolom -->
            <div class="row g-3">
                <!-- Kolom Kiri -->
                <div class="col-md-8">
                    <!-- Judul -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-tag me-1 text-primary"></i> Judul Artikel
                        </label>
                        <input type="text" name="title" id="title" 
                               class="form-control border-3 border-black rounded-0" 
                               placeholder="Masukkan judul artikel" 
                               value="{{ old('title') }}" required>
                        <small class="text-muted">Judul yang menarik untuk artikel Anda</small>
                    </div>

                    <!-- Slug -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-link-45deg me-1 text-primary"></i> Slug (URL)
                        </label>
                        <div class="input-group">
                            <span class="input-group-text border-3 border-black rounded-0 bg-light">/service-article/</span>
                            <input type="text" name="slug" id="slug" 
                                   class="form-control border-3 border-black rounded-0" 
                                   placeholder="contoh-judul-artikel" 
                                   value="{{ old('slug') }}">
                        </div>
                        <small class="text-muted">Kosongkan untuk generate otomatis dari judul</small>
                    </div>

                    <!-- Konten dengan TinyMCE -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-text-paragraph me-1 text-primary"></i> Konten
                        </label>
                        <textarea name="content" id="content" 
                                  class="form-control border-3 border-black rounded-0" 
                                  rows="15" placeholder="Tulis konten artikel di sini...">{{ old('content') }}</textarea>
                        <small class="text-muted">
                            <i class="bi bi-info-circle me-1"></i> 
                            Gunakan toolbar untuk format teks (bold, italic, heading, list, link, dll)
                        </small>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-4">
                    <!-- Layanan Terkait -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-box-seam me-1 text-primary"></i> Layanan Terkait
                        </label>
                        <select name="service_id" class="form-select border-3 border-black rounded-0">
                            <option value="">Pilih Layanan (Opsional)</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">
                            <i class="bi bi-info-circle me-1"></i> 
                            Hanya menampilkan layanan yang belum memiliki artikel
                        </small>
                    </div>

                    <!-- Gambar Unggulan -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-image me-1 text-primary"></i> Gambar Unggulan
                        </label>
                        <input type="file" name="featured_image" 
                               class="form-control border-3 border-black rounded-0" 
                               accept="image/*" id="imageInput">
                        <small class="text-muted">Ukuran maksimal 2MB (JPG, PNG, WEBP)</small>
                        <div id="imagePreview" class="mt-2" style="display: none;">
                            <img id="previewImg" src="#" alt="Preview" 
                                 style="max-width: 100%; max-height: 200px; border: 3px solid var(--black);">
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-toggle-on me-1 text-primary"></i> Status
                        </label>
                        <select name="status" class="form-select border-3 border-black rounded-0">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>✅ Published</option>
                        </select>
                    </div>

                    <!-- Meta Title -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-tag me-1 text-primary"></i> Meta Title (SEO)
                        </label>
                        <input type="text" name="meta_title" 
                               class="form-control border-3 border-black rounded-0" 
                               placeholder="Judul untuk SEO" 
                               value="{{ old('meta_title') }}">
                        <small class="text-muted">Optimal 50-60 karakter</small>
                    </div>

                    <!-- Meta Description -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-card-text me-1 text-primary"></i> Meta Description (SEO)
                        </label>
                        <textarea name="meta_description" 
                                  class="form-control border-3 border-black rounded-0" 
                                  rows="3" placeholder="Deskripsi singkat untuk SEO">{{ old('meta_description') }}</textarea>
                        <small class="text-muted">Optimal 150-160 karakter</small>
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="neo-btn">
                            <i class="bi bi-check-lg me-2"></i> Simpan
                        </button>
                        <a href="{{ route('admin.service-articles.index') }}" class="neo-btn neo-btn-outline">
                            <i class="bi bi-x-lg me-2"></i> Batal
                        </a>
                    </div>
                </div>
            </div>

        </form>
    </div>

    {{-- ==========================================
         TINYMCE RICH TEXT EDITOR
         ========================================== --}}
@push('scripts')
<!-- CDN pake no-api-key -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    /* Reset biar gak clash sama style admin */
    .tox-tinymce { border: 1px solid #ccc !important; border-radius: 0 !important; }
    .tox .tox-toolbar__group { padding: 0 8px !important; }
    .tox .tox-toolbar-overlord { background: #fff !important; }
    .tox .tox-icon svg { fill: #222 !important; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            tinymce.init({
                selector: '#content',
                height: 400,
                menubar: true,
                promotion: false,
                branding: false,
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist | removeformat | help | fullscreen',
                content_style: 'body { font-family: Inter, Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.8; }',
                setup: function(editor) {
                    editor.on('change', function() {
                        editor.save();
                    });
                }
            });
        }, 300);
    });
</script>
@endpush
@endsection
