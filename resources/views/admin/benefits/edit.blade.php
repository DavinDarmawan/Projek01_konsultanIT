@extends('layouts.admin')

@section('title', 'Edit Benefit')
@section('page-title', 'Edit Benefit')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.benefits.update', $benefit->id) }}" method="POST">
            @csrf
            @method('PUT')

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

            {{-- Icon --}}
            <div class="mb-3">
                <label class="form-label fw-bold">
                    <i class="bi bi-icons me-1"></i> Icon
                </label>
                <div class="row g-2">
                    <div class="col-md-6">
                        <input type="text" name="icon" id="icon" class="form-control border-3 border-black rounded-0 @error('icon') is-invalid @enderror" 
                               placeholder="Contoh: bi-shield-check" value="{{ old('icon', $benefit->icon) }}" required>
                        <small class="text-muted">Masukkan class Bootstrap Icon (contoh: bi-shield-check, bi-handshake, bi-star, dll)</small>
                    </div>
                    <div class="col-md-3">
                        <div class="border-3 border-black p-3 text-center bg-white" style="height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="bi {{ old('icon', $benefit->icon ?? 'bi-question-circle') }}" id="iconPreview" style="font-size: 2rem; color: var(--black);"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border-3 border-black p-3 text-center bg-white" style="height: 100%; display: flex; align-items: center; justify-content: center; gap: 8px; flex-wrap: wrap;">
                            <span class="badge-neo" style="font-size: 0.7rem; cursor: pointer;" onclick="document.getElementById('icon').value='bi-shield-check'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-shield-check</span>
                            <span class="badge-neo" style="font-size: 0.7rem; cursor: pointer;" onclick="document.getElementById('icon').value='bi-handshake'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-handshake</span>
                            <span class="badge-neo" style="font-size: 0.7rem; cursor: pointer;" onclick="document.getElementById('icon').value='bi-star'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-star</span>
                            <span class="badge-neo" style="font-size: 0.7rem; cursor: pointer;" onclick="document.getElementById('icon').value='bi-trophy'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-trophy</span>
                            <span class="badge-neo" style="font-size: 0.7rem; cursor: pointer;" onclick="document.getElementById('icon').value='bi-clock-history'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-clock-history</span>
                            <span class="badge-neo" style="font-size: 0.7rem; cursor: pointer;" onclick="document.getElementById('icon').value='bi-people'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-people</span>
                            <span class="badge-neo" style="font-size: 0.7rem; cursor: pointer;" onclick="document.getElementById('icon').value='bi-rocket-takeoff'; document.getElementById('icon').dispatchEvent(new Event('input'));">bi-rocket-takeoff</span>
                        </div>
                    </div>
                </div>
                @error('icon')
                    <div class="text-danger mt-1 fw-bold">{{ $message }}</div>
                @enderror
            </div>

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label fw-bold">
                    <i class="bi bi-tag me-1"></i> Title
                </label>
                <input type="text" name="title" class="form-control border-3 border-black rounded-0 @error('title') is-invalid @enderror" 
                       placeholder="Masukkan judul benefit" value="{{ old('title', $benefit->title) }}" required>
                @error('title')
                    <div class="text-danger mt-1 fw-bold">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label fw-bold">
                    <i class="bi bi-text-paragraph me-1"></i> Description
                </label>
                <textarea name="description" class="form-control border-3 border-black rounded-0 @error('description') is-invalid @enderror" 
                          rows="4" placeholder="Masukkan deskripsi benefit" required>{{ old('description', $benefit->description) }}</textarea>
                @error('description')
                    <div class="text-danger mt-1 fw-bold">{{ $message }}</div>
                @enderror
            </div>

            {{-- Info Tambahan --}}
            <div class="alert alert-info border-3 border-black rounded-0" style="background: #e3f2fd;">
                <i class="bi bi-info-circle-fill me-2"></i>
                <strong>Info:</strong> Benefit ini akan ditampilkan di halaman utama pada bagian "Keunggulan".
            </div>

            {{-- Buttons --}}
            <div class="d-flex gap-3 mt-4">
                <button type="submit" class="neo-btn">
                    <i class="bi bi-check-lg me-2"></i> Update
                </button>
                <a href="{{ route('admin.benefits.index') }}" class="neo-btn neo-btn-outline">
                    <i class="bi bi-x-lg me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>

    {{-- Script untuk preview icon --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const iconInput = document.getElementById('icon');
            const iconPreview = document.getElementById('iconPreview');

            // Preview awal
            if (iconInput.value) {
                iconPreview.className = 'bi ' + iconInput.value;
            }

            iconInput.addEventListener('input', function() {
                const value = this.value.trim();
                if (value) {
                    iconPreview.className = 'bi ' + value;
                } else {
                    iconPreview.className = 'bi bi-question-circle';
                }
            });
        });
    </script>
    @endpush
@endsection