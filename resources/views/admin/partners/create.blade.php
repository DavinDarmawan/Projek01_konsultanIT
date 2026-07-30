@extends('layouts.admin')

@section('title', 'Tambah Partner')
@section('page-title', 'Tambah Partner')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
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
                <div class="col-md-6">
                    <!-- Nama Perusahaan -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-building me-1 text-primary"></i> Nama Perusahaan
                        </label>
                        <input type="text" name="company_name" 
                               class="form-control border-3 border-black rounded-0" 
                               placeholder="Contoh: PT Pertamina" 
                               value="{{ old('company_name') }}" required>
                    </div>

                    <!-- Nama Project -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-diagram-3 me-1 text-primary"></i> Nama Project (Opsional)
                        </label>
                        <input type="text" name="project_name" 
                               class="form-control border-3 border-black rounded-0" 
                               placeholder="Contoh: Starsite Project" 
                               value="{{ old('project_name') }}">
                    </div>

                    <!-- Logo / Image -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-image me-1 text-primary"></i> Logo Partner
                        </label>
                        <input type="file" name="image" 
                               class="form-control border-3 border-black rounded-0" 
                               accept="image/*" id="imageInput">
                        <small class="text-muted">Ukuran maksimal 2MB (JPG, PNG, WEBP)</small>
                        <div id="imagePreview" class="mt-2" style="display: none;">
                            <img id="previewImg" src="#" alt="Preview" 
                                 style="max-width: 150px; max-height: 100px; border: 3px solid var(--black); object-fit: contain; background: #fff; padding: 4px;">
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <!-- Website -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-globe2 me-1 text-primary"></i> Website (Opsional)
                        </label>
                        <input type="url" name="website" 
                               class="form-control border-3 border-black rounded-0" 
                               placeholder="https://www.perusahaan.com" 
                               value="{{ old('website') }}">
                    </div>

                    <!-- Icon (opsional) -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-icons me-1 text-primary"></i> Icon (Opsional)
                        </label>
                        <input type="text" name="icon" 
                               class="form-control border-3 border-black rounded-0" 
                               placeholder="bi-building" 
                               value="{{ old('icon') }}">
                        <small class="text-muted">Class Bootstrap Icon (contoh: bi-building, bi-shop)</small>
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="neo-btn">
                            <i class="bi bi-check-lg me-2"></i> Simpan
                        </button>
                        <a href="{{ route('admin.partners.index') }}" class="neo-btn neo-btn-outline">
                            <i class="bi bi-x-lg me-2"></i> Batal
                        </a>
                    </div>
                </div>
            </div>

        </form>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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