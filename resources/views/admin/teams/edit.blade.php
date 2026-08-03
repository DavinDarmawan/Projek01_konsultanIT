@extends('layouts.admin')

@section('title', 'Edit Anggota Tim')
@section('page-title', 'Edit Anggota Tim')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
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
                <div class="col-md-6">
                    <!-- Nama -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-person me-1 text-primary"></i> Nama Lengkap
                        </label>
                        <input type="text" name="name" 
                               class="form-control border-3 border-black rounded-0" 
                               placeholder="Masukkan nama lengkap" 
                               value="{{ old('name', $team->name) }}" required>
                    </div>

                    <!-- Posisi -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-briefcase me-1 text-primary"></i> Posisi / Jabatan
                        </label>
                        <input type="text" name="position" 
                               class="form-control border-3 border-black rounded-0" 
                               placeholder="Contoh: CEO & Founder" 
                               value="{{ old('position', $team->position) }}" required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-card-text me-1 text-primary"></i> Deskripsi
                        </label>
                        <textarea name="description" 
                                  class="form-control border-3 border-black rounded-0" 
                                  rows="4" placeholder="Deskripsi singkat tentang anggota tim">{{ old('description', $team->description) }}</textarea>
                    </div>

                    <!-- Foto -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-image me-1 text-primary"></i> Foto
                        </label>
                        @if($team->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $team->image) }}" 
                                     alt="{{ $team->name }}" 
                                     style="width: 100px; height: 100px; object-fit: cover; border: 3px solid var(--black); border-radius: 50%;">
                                <br>
                                <small class="text-muted">Foto saat ini</small>
                            </div>
                        @endif
                        <input type="file" name="image" 
                               class="form-control border-3 border-black rounded-0" 
                               accept="image/*" id="imageInput">
                        <small class="text-muted">Ukuran maksimal 2MB (JPG, PNG, WEBP)</small>
                        <div id="imagePreview" class="mt-2" style="display: none;">
                            <img id="previewImg" src="#" alt="Preview" 
                                 style="max-width: 150px; max-height: 150px; border: 3px solid var(--black); border-radius: 50%; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <!-- Icon (opsional) -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-icons me-1 text-primary"></i> Icon (Opsional)
                        </label>
                        <input type="text" name="icon" 
                               class="form-control border-3 border-black rounded-0" 
                               placeholder="bi-people" 
                               value="{{ old('icon', $team->icon) }}">
                        <small class="text-muted">Class Bootstrap Icon (contoh: bi-people, bi-star)</small>
                    </div>

                    <!-- Social Media -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-share me-1 text-primary"></i> Sosial Media
                        </label>
                        <div class="mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-3 border-black rounded-0 bg-light" style="color: #0A66C2;">
                                    <i class="bi bi-linkedin"></i>
                                </span>
                                <input type="url" name="linkedin" 
                                       class="form-control border-3 border-black rounded-0" 
                                       placeholder="https://linkedin.com/in/username" 
                                       value="{{ old('linkedin', $team->linkedin) }}">
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-3 border-black rounded-0 bg-light" style="color: #E1306C;">
                                    <i class="bi bi-instagram"></i>
                                </span>
                                <input type="url" name="instagram" 
                                       class="form-control border-3 border-black rounded-0" 
                                       placeholder="https://instagram.com/username" 
                                       value="{{ old('instagram', $team->instagram) }}">
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="input-group">
                                <span class="input-group-text border-3 border-black rounded-0 bg-light" style="color: #181717;">
                                    <i class="bi bi-github"></i>
                                </span>
                                <input type="url" name="github" 
                                       class="form-control border-3 border-black rounded-0" 
                                       placeholder="https://github.com/username" 
                                       value="{{ old('github', $team->github) }}">
                            </div>
                        </div>
                        <small class="text-muted">Isi URL sosial media (kosongkan jika tidak ada)</small>
                    </div>

                    <!-- Info Timestamp -->
                    <div class="mb-3 p-2 border-2 border-black" style="background: var(--light);">
                        <small class="text-muted d-block">
                            <i class="bi bi-clock me-1"></i> Dibuat: {{ $team->created_at->format('d M Y H:i') }}
                        </small>
                        <small class="text-muted d-block">
                            <i class="bi bi-pencil me-1"></i> Diperbarui: {{ $team->updated_at->format('d M Y H:i') }}
                        </small>
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="neo-btn">
                            <i class="bi bi-check-lg me-2"></i> Update
                        </button>
                        <a href="{{ route('admin.teams.index') }}" class="neo-btn neo-btn-outline">
                            <i class="bi bi-x-lg me-2"></i> Batal
                        </a>
                    </div>
                </div>
            </div>

        </form>
    </div>

    {{-- Script --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
    @endpush
@endsection
