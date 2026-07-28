@extends('layouts.admin')

@section('title', 'Tambah Portfolio')
@section('page-title', 'Tambah Portfolio')

@section('content')
    <div class="neo-card">
        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input type="text" name="title" class="form-control border-3 border-black rounded-0" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Client</label>
                <input type="text" name="client" class="form-control border-3 border-black rounded-0">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" class="form-control border-3 border-black rounded-0" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Image</label>
                <input type="file" name="image" class="form-control border-3 border-black rounded-0">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Project URL</label>
                <input type="url" name="project_url" class="form-control border-3 border-black rounded-0">
            </div>
            <button type="submit" class="neo-btn">Simpan</button>
            <a href="{{ route('admin.portfolios.index') }}" class="neo-btn neo-btn-outline">Batal</a>
        </form>
    </div>
@endsection