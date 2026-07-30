@extends('layouts.admin')

@section('title', 'Tambah Teknologi')
@section('page-title', 'Tambah Teknologi')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.technologies.store') }}" method="POST">
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

            <!-- Nama Teknologi -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                    <i class="bi bi-tag me-1 text-primary"></i> Nama Teknologi
                </label>
                <input type="text" name="name" class="form-control border-3 border-black rounded-0" 
                       placeholder="Contoh: Laravel, Vue.js, Bootstrap" value="{{ old('name') }}" required>
                <small class="text-muted">Masukkan nama teknologi yang digunakan</small>
            </div>

            <!-- Icon -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                    <i class="bi bi-icons me-1 text-primary"></i> Icon
                </label>
                <div class="row g-2">
                    <div class="col-md-8">
                        <input type="text" name="icon" id="icon" class="form-control border-3 border-black rounded-0" 
                               placeholder="Contoh: bi-laptop, bi-code-slash" value="{{ old('icon', 'bi-code') }}">
                        <small class="text-muted">Masukkan class Bootstrap Icon (contoh: bi-laptop, bi-code-slash, bi-database)</small>
                    </div>
                    <div class="col-md-4">
                        <div class="border-3 border-black p-3 text-center bg-white" style="height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="bi {{ old('icon', 'bi-code') }}" id="iconPreview" style="font-size: 2.5rem; color: {{ old('color', '#2e7d32') }};"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <small class="text-muted">
                        <strong>Icon populer:</strong>
                        <span class="badge bg-light text-dark border border-1 me-1" style="cursor: pointer;" onclick="document.getElementById('icon').value='bi-laptop'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-laptop</span>
                        <span class="badge bg-light text-dark border border-1 me-1" style="cursor: pointer;" onclick="document.getElementById('icon').value='bi-code-slash'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-code-slash</span>
                        <span class="badge bg-light text-dark border border-1 me-1" style="cursor: pointer;" onclick="document.getElementById('icon').value='bi-database'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-database</span>
                        <span class="badge bg-light text-dark border border-1 me-1" style="cursor: pointer;" onclick="document.getElementById('icon').value='bi-bootstrap'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-bootstrap</span>
                        <span class="badge bg-light text-dark border border-1 me-1" style="cursor: pointer;" onclick="document.getElementById('icon').value='bi-phone'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-phone</span>
                        <span class="badge bg-light text-dark border border-1 me-1" style="cursor: pointer;" onclick="document.getElementById('icon').value='bi-cloud'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-cloud</span>
                        <span class="badge bg-light text-dark border border-1 me-1" style="cursor: pointer;" onclick="document.getElementById('icon').value='bi-github'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-github</span>
                    </small>
                </div>
            </div>

            <!-- Warna -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                    <i class="bi bi-palette me-1 text-primary"></i> Warna
                </label>
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="color" name="color" id="colorPicker" class="form-control border-3 border-black rounded-0" 
                               style="height: 60px; padding: 4px; cursor: pointer;" value="{{ old('color', '#2e7d32') }}">
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="color_text" id="colorText" class="form-control border-3 border-black rounded-0" 
                               placeholder="#2e7d32" value="{{ old('color', '#2e7d32') }}">
                        <small class="text-muted">Masukkan kode warna hex (contoh: #2e7d32, #1565c0, #f9d342)</small>
                    </div>
                </div>
                <div class="mt-2 d-flex gap-2 flex-wrap">
                    <small class="text-muted"><strong>Warna populer:</strong></small>
                    <span class="badge border border-1" style="background: #2e7d32; color: white; cursor: pointer; padding: 6px 14px;" onclick="setColor('#2e7d32')">#2e7d32</span>
                    <span class="badge border border-1" style="background: #1565c0; color: white; cursor: pointer; padding: 6px 14px;" onclick="setColor('#1565c0')">#1565c0</span>
                    <span class="badge border border-1" style="background: #f9d342; color: #1a1a1a; cursor: pointer; padding: 6px 14px;" onclick="setColor('#f9d342')">#f9d342</span>
                    <span class="badge border border-1" style="background: #e65100; color: white; cursor: pointer; padding: 6px 14px;" onclick="setColor('#e65100')">#e65100</span>
                    <span class="badge border border-1" style="background: #6a1b9a; color: white; cursor: pointer; padding: 6px 14px;" onclick="setColor('#6a1b9a')">#6a1b9a</span>
                    <span class="badge border border-1" style="background: #c62828; color: white; cursor: pointer; padding: 6px 14px;" onclick="setColor('#c62828')">#c62828</span>
                    <span class="badge border border-1" style="background: #00838f; color: white; cursor: pointer; padding: 6px 14px;" onclick="setColor('#00838f')">#00838f</span>
                    <span class="badge border border-1" style="background: #1a1a1a; color: white; cursor: pointer; padding: 6px 14px;" onclick="setColor('#1a1a1a')">#1a1a1a</span>
                </div>
            </div>

            <!-- Info -->
            <div class="alert alert-info border-3 border-black rounded-0" style="background: #e3f2fd;">
                <i class="bi bi-info-circle-fill me-2"></i>
                <strong>Info:</strong> Teknologi ini akan ditampilkan di halaman utama pada bagian "Teknologi Yang Kami Gunakan".
            </div>

            <!-- Buttons -->
            <div class="d-flex gap-3 mt-4">
                <button type="submit" class="neo-btn">
                    <i class="bi bi-check-lg me-2"></i> Simpan
                </button>
                <a href="{{ route('admin.technologies.index') }}" class="neo-btn neo-btn-outline">
                    <i class="bi bi-x-lg me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>

    {{-- Script --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const iconInput = document.getElementById('icon');
            const iconPreview = document.getElementById('iconPreview');
            const colorPicker = document.getElementById('colorPicker');
            const colorText = document.getElementById('colorText');

            // Preview icon
            iconInput.addEventListener('input', function() {
                const value = this.value.trim();
                const color = colorPicker.value || '#2e7d32';
                if (value) {
                    iconPreview.className = 'bi ' + value;
                } else {
                    iconPreview.className = 'bi bi-code';
                }
                iconPreview.style.color = color;
            });

            // Sync color picker & text
            colorPicker.addEventListener('input', function() {
                const value = this.value;
                colorText.value = value;
                iconPreview.style.color = value;
            });

            colorText.addEventListener('input', function() {
                const value = this.value.trim();
                if (value && /^#[0-9a-fA-F]{6}$/.test(value)) {
                    colorPicker.value = value;
                    iconPreview.style.color = value;
                }
            });
        });

        function setColor(hex) {
            document.getElementById('colorPicker').value = hex;
            document.getElementById('colorText').value = hex;
            document.getElementById('iconPreview').style.color = hex;
        }
    </script>
    @endpush
@endsection