@extends('layouts.admin')

@section('title', 'Edit Artikel Layanan')
@section('page-title', 'Edit Artikel Layanan')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.service-articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
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
                               value="{{ old('title', $article->title) }}" required>
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
                                   value="{{ old('slug', $article->slug) }}">
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
                                  rows="15" placeholder="Tulis konten artikel di sini...">{{ old('content', $article->content) }}</textarea>
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
                                <option value="{{ $service->id }}" {{ old('service_id', $article->service_id) == $service->id ? 'selected' : '' }}>
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">
                            <i class="bi bi-info-circle me-1"></i> 
                            Hanya menampilkan layanan yang belum memiliki artikel (kecuali yang sedang dipilih)
                        </small>
                    </div>

                    <!-- Gambar Unggulan -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-image me-1 text-primary"></i> Gambar Unggulan
                        </label>
                        @if($article->featured_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $article->featured_image) }}" 
                                     alt="{{ $article->title }}" 
                                     style="max-width: 100%; max-height: 150px; border: 3px solid var(--black);">
                                <br>
                                <small class="text-muted">Gambar saat ini</small>
                            </div>
                        @endif
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
                            <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                            <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>✅ Published</option>
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
                               value="{{ old('meta_title', $article->meta_title) }}">
                        <small class="text-muted">Optimal 50-60 karakter</small>
                    </div>

                    <!-- Meta Description -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-card-text me-1 text-primary"></i> Meta Description (SEO)
                        </label>
                        <textarea name="meta_description" 
                                  class="form-control border-3 border-black rounded-0" 
                                  rows="3" placeholder="Deskripsi singkat untuk SEO">{{ old('meta_description', $article->meta_description) }}</textarea>
                        <small class="text-muted">Optimal 150-160 karakter</small>
                    </div>

                    <!-- Info Created -->
                    <div class="mb-3 p-2 border-2 border-black" style="background: var(--light);">
                        <small class="text-muted d-block">
                            <i class="bi bi-clock me-1"></i> Dibuat: {{ $article->created_at->format('d M Y H:i') }}
                        </small>
                        <small class="text-muted d-block">
                            <i class="bi bi-pencil me-1"></i> Diperbarui: {{ $article->updated_at->format('d M Y H:i') }}
                        </small>
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="neo-btn">
                            <i class="bi bi-check-lg me-2"></i> Update
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
    <!-- TinyMCE CDN -->
    <script src="https://cdn.tiny.cloud/1/ym27h9sdijxxuh12gnj76n9cry2w0r6pqlhfc1zeip98cyxh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi TinyMCE
            tinymce.init({
                selector: '#content',
                height: 400,
                menubar: true,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help | fullscreen',
                content_style: 'body { font-family:Inter,Helvetica,Arial,sans-serif; font-size:16px; line-height:1.8; }',
                setup: function(editor) {
                    editor.on('change', function() {
                        editor.save();
                    });
                }
            });

            // Auto generate slug dari judul
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');

            titleInput.addEventListener('input', function() {
                if (!slugInput.value || slugInput.dataset.generated === 'true') {
                    const slug = this.value
                        .toLowerCase()
                        .replace(/[^a-z0-9\s-]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-');
                    slugInput.value = slug;
                    slugInput.dataset.generated = 'true';
                }
            });

            // Preview gambar
            const imageInput = document.getElementById('imageInput');
            const previewContainer = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        previewContainer.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewContainer.style.display = 'none';
                }
            });

            // Slug manual edit
            slugInput.addEventListener('input', function() {
                this.dataset.generated = 'false';
            });
        });
    </script>
    @endpush
@endsection
