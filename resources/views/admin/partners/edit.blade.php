@extends('layouts.admin')

@section('title', 'Edit Partner')
@section('page-title', 'Edit Partner')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Perusahaan</label>
                <input type="text" name="company_name" class="form-control border-3 border-black rounded-0" value="{{ old('company_name', $partner->company_name) }}" required>
                @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Proyek</label>
                <input type="text" name="project_name" class="form-control border-3 border-black rounded-0" value="{{ old('project_name', $partner->project_name) }}">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Logo / Gambar</label>
                @if($partner->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$partner->image) }}" width="100" class="border-3 border-black p-1">
                        <small class="d-block text-muted mt-1">Upload baru untuk mengganti (gambar lama otomatis terhapus)</small>
                    </div>
                @endif
                <input type="file" name="image" class="form-control border-3 border-black rounded-0" accept="image/*">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Icon</label>
                @if($partner->icon)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$partner->icon) }}" width="60" class="border-2 border-black p-1">
                        <small class="d-block text-muted mt-1">Upload baru untuk mengganti (icon lama otomatis terhapus)</small>
                    </div>
                @endif
                <input type="file" name="icon" class="form-control border-3 border-black rounded-0" accept="image/*">
                @error('icon') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Website</label>
                <input type="url" name="website" class="form-control border-3 border-black rounded-0" value="{{ old('website', $partner->website) }}">
            </div>
            <button type="submit" class="neo-btn">Update</button>
            <a href="{{ route('admin.partners.index') }}" class="neo-btn neo-btn-outline">Batal</a>
        </form>
    </div>
@endsection
