@extends('layouts.admin')

@section('title', 'Tambah Anggota Tim')
@section('page-title', 'Tambah Anggota Tim')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <input type="text" name="name" class="form-control border-3 border-black rounded-0" value="{{ old('name') }}" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Posisi</label>
                <input type="text" name="position" class="form-control border-3 border-black rounded-0" value="{{ old('position') }}" required>
                @error('position') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control border-3 border-black rounded-0" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Foto</label>
                <input type="file" name="image" class="form-control border-3 border-black rounded-0" accept="image/*">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">LinkedIn</label>
                    <input type="url" name="linkedin" class="form-control border-3 border-black rounded-0" value="{{ old('linkedin') }}" placeholder="https://linkedin.com/in/...">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Instagram</label>
                    <input type="text" name="instagram" class="form-control border-3 border-black rounded-0" value="{{ old('instagram') }}" placeholder="@username">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">GitHub</label>
                    <input type="url" name="github" class="form-control border-3 border-black rounded-0" value="{{ old('github') }}" placeholder="https://github.com/...">
                </div>
            </div>
            <button type="submit" class="neo-btn">Simpan</button>
            <a href="{{ route('admin.teams.index') }}" class="neo-btn neo-btn-outline">Batal</a>
        </form>
    </div>
@endsection
