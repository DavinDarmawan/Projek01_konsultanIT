@extends('layouts.admin')

@section('title', 'Tambah Artikel Service')
@section('page-title', 'Tambah Artikel Service')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.service-articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Service</label>
                <select name="service_id" class="form-select border-3 border-black rounded-0" required>
                    <option value="">-- Pilih Service --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                            {{ $service->title }}
                        </option>
                    @endforeach
                </select>
                @error('service_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Judul Artikel</label>
                <input type="text" name="title" class="form-control border-3 border-black rounded-0" value="{{ old('title') }}" required>
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Konten</label>
                <textarea name="content" class="form-control border-3 border-black rounded-0" rows="8" required>{{ old('content') }}</textarea>
                @error('content') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Featured Image</label>
                <input type="file" name="featured_image" class="form-control border-3 border-black rounded-0" accept="image/*">
                @error('featured_image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Meta Title (SEO)</label>
                    <input type="text" name="meta_title" class="form-control border-3 border-black rounded-0" value="{{ old('meta_title') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Status</label>
                    <select name="status" class="form-select border-3 border-black rounded-0" required>
                        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Meta Description (SEO)</label>
                <textarea name="meta_description" class="form-control border-3 border-black rounded-0" rows="2">{{ old('meta_description') }}</textarea>
            </div>
            <button type="submit" class="neo-btn">Simpan</button>
            <a href="{{ route('admin.service-articles.index') }}" class="neo-btn neo-btn-outline">Batal</a>
        </form>
    </div>
@endsection
