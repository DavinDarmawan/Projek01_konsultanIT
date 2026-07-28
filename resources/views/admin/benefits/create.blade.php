@extends('layouts.admin')

@section('title', 'Tambah Benefit')
@section('page-title', 'Tambah Benefit')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.benefits.store') }}" method="POST">
            @csrf

            {{-- Icon --}}
            <div class="mb-3">
                <label class="form-label fw-bold">
                    <i class="bi bi-icons me-1"></i> Icon
                </label>
                <div class="row g-2">
                    <div class="col-md-6">
                        <input type="text" name="icon" id="icon" class="form-control border-3 border-black rounded-0 @error('icon') is-invalid @enderror" 
                               placeholder="Contoh: bi-shield-check" value="{{ old('icon') }}" required>
                        <small class="text-muted">Masukkan class Bootstrap Icon (contoh: bi-shield-check, bi-handshake, bi-star, dll)</small>
                    </div>
                    <div class="col-md-3">
                        <div class="border-3 border-black p-3 text-center bg-white" style="height: 100%; display: flex; align-items: center; justify-content: center;">
                            <i class="bi {{ old('icon', 'bi-question-circle') }}" id="iconPreview" style="font-size: 2rem; color: var(--black);"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border-3 border-black p-3 text-center bg-white" style="height: 100%; display: flex; align-items: center; justify-content: center; gap: 8px; flex-wrap: wrap;">
                            <span class="badge-neo" style="font-size: 0.7rem;">bi-shield-check</span>
                            <span class="badge-neo" style="font-size: 0.7rem;">bi-handshake</span>
                            <span class="badge-neo" style="font-size: 0.7rem;">bi-star</span>
                            <span class="badge-neo" style="font-size: 0.7rem;">bi-trophy</span>
                            <span class="badge-neo" style="font-size: 0.7rem;">bi-clock-history</span>
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
                       placeholder="Masukkan judul benefit" value="{{ old('title') }}" required>
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
                          rows="4" placeholder="Masukkan deskripsi benefit" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger mt-1 fw-bold">{{ $message }}</div>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="d-flex gap-3 mt-4">
                <button type="submit" class="neo-btn">
                    <i class="bi bi-check-lg me-2"></i> Simpan
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