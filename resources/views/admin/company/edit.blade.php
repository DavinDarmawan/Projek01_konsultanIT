@extends('layouts.admin')

@section('title', 'Edit Data Perusahaan')
@section('page-title', 'Edit Data Perusahaan')

@section('content')
<div class="neo-card">
    <form action="{{ route('admin.company.update', $company->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-bold">Alamat</label>
            <textarea name="address" class="form-control border-3 border-black rounded-0" rows="3">{{ $company->address }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control border-3 border-black rounded-0" value="{{ $company->email }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Telepon</label>
            <input type="text" name="phone" class="form-control border-3 border-black rounded-0" value="{{ $company->phone }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">WhatsApp</label>
            <input type="text" name="whatsapp" class="form-control border-3 border-black rounded-0" value="{{ $company->whatsapp }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Google Maps Embed</label>
            <textarea name="map_embed" class="form-control border-3 border-black rounded-0" rows="3">{{ $company->map_embed }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Sosial Media (JSON)</label>
            <textarea name="social_media" class="form-control border-3 border-black rounded-0" rows="5">{{ json_encode($company->social_media, JSON_PRETTY_PRINT) }}</textarea>
            <small class="text-muted">Format: [{"platform":"Instagram","url":"#","icon":"bi-instagram"}]</small>
        </div>
        <button type="submit" class="neo-btn">Update</button>
        <a href="{{ route('admin.dashboard') }}" class="neo-btn neo-btn-outline">Batal</a>
    </form>
</div>
@endsection