@extends('layouts.admin')

@section('title', 'Tambah Partner')
@section('page-title', 'Tambah Partner')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Perusahaan</label>
                <input type="text" name="company_name" class="form-control border-3 border-black rounded-0" value="{{ old('company_name') }}" required>
                @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Proyek</label>
                <input type="text" name="project_name" class="form-control border-3 border-black rounded-0" value="{{ old('project_name') }}">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Logo / Gambar</label>
                <input type="file" name="image" class="form-control border-3 border-black rounded-0" accept="image/*">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Icon (opsional)</label>
                <input type="file" name="icon" class="form-control border-3 border-black rounded-0" accept="image/*">
                @error('icon') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Website</label>
                <input type="url" name="website" class="form-control border-3 border-black rounded-0" value="{{ old('website') }}" placeholder="https://...">
            </div>
            <button type="submit" class="neo-btn">Simpan</button>
            <a href="{{ route('admin.partners.index') }}" class="neo-btn neo-btn-outline">Batal</a>
        </form>
    </div>
@endsection
